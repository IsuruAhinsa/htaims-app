<?php

namespace App\Http\Livewire\Contractors;

use App\Models\Contractor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class ContractorIndex extends Component
{
    use Actions;
    use AuthorizesRequests;

    public $state = [];

    public $type;

    public $start_date;

    public $end_date;

    public $contractor;

    public $isOpen = false;

    public $isOpenPanel = false;

    public $confirmingDeletion = false;

    public $forceDelete = false;

    public $updateMode = false;

    protected $listeners = [
        'confirmDeletion',
        'edit',
        'show',
    ];

    /**
     * Show contractor create form modal.
     */
    public function create()
    {
        $this->resetInputFields();

        $this->isOpen = true;
    }

    public function store()
    {
        $input = array_merge($this->state, ['start_date' => $this->start_date, 'end_date' => $this->end_date, 'type' => $this->type]);

        $validatedData = Validator::make($input, [
            'reference_code' => ['required', 'string', 'unique:contractors,reference_code'],
            'contractor_no' => ['required', 'max:100', 'unique:contractors,contractor_no'],
            'name' => ['required', 'string', 'max:100'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'type' => ['nullable', 'max:30'],
            'value' => ['nullable', 'numeric'],
        ])->validate();

        Contractor::create($validatedData);

        $this->emit('eventRefresh');

        $this->isOpen = false;

        $this->notification()->success(
            'Contractor Saved.',
            $this->state['contractor_no'] . ' was successful added.'
        );
    }

    public function show(Contractor $contractor)
    {
        $this->authorize('contractors.show');

        $this->updateMode = false;

        $this->isOpenPanel = true;

        $this->state = $contractor->toArray();
    }

    public function edit(Contractor $contractor)
    {
        $this->authorize('contractors.edit');

        $this->updateMode = true;

        $this->state = $contractor->toArray();

        $this->start_date = $contractor->start_date;

        $this->end_date = $contractor->end_date;

        $this->type = $contractor->type;

        $this->contractor = $contractor;

        $this->isOpen = true;
    }

    public function update()
    {
        $input = array_merge($this->state, ['start_date' => $this->start_date, 'end_date' => $this->end_date, 'type' => $this->type]);

        $validatedData = Validator::make($input, [
            'reference_code' => ['required', 'string',
                Rule::unique('contractors', 'reference_code')->ignore($this->state['id'])
            ],
            'contractor_no' => ['required', 'max:100',
                Rule::unique('contractors', 'contractor_no')->ignore($this->state['id'])
            ],
            'name' => ['required', 'string', 'max:100'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'type' => ['nullable', 'max:100'],
            'value' => ['nullable', 'numeric'],
        ])->validate();

        $this->contractor->update($validatedData);

        $this->isOpen = false;

        $this->updateMode = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Contractor Updated.',
            $this->state['contractor_no'] . ' was successfully updated.'
        );
    }

    public function confirmDeletion(Contractor $contractor)
    {
        $this->authorize('contractors.delete');

        $this->confirmingDeletion = $contractor->id;
    }

    public function delete(Contractor $contractor)
    {
        if ($this->forceDelete === true) {

            $contractor->forceDelete();

        } else {

            $contractor->delete();

        }

        $this->confirmingDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Contractor Deleted.',
            $this->forceDelete === true ? 'The Contractor was deleted successfully!' : 'The Contractor moved into deleted contractor!'
        );

        if ($this->forceDelete === true) {

            $this->forceDelete = false;

        }
    }

    private function resetInputFields()
    {
        $this->state = [];
        $this->start_date = null;
        $this->end_date = null;
        $this->type = null;
    }

    public function render()
    {
        return view('contractors.contractor-index');
    }
}
