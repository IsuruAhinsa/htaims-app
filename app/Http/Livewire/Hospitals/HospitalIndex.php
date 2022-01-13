<?php

namespace App\Http\Livewire\Hospitals;

use App\Models\Hospital;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class HospitalIndex extends Component
{
    use Actions;
    use AuthorizesRequests;

    public $state = [];

    public $hospital;

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

    public function create()
    {
        $this->resetInputFields();

        $this->isOpen = true;
    }

    public function store()
    {
        $validatedData = Validator::make($this->state, [
            'code' => ['required', 'string', 'unique:hospitals,code'],
            'hospital_code_prefix' => ['nullable', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:50'],
            'region' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:25', 'unique:hospitals,phone'],
            'fax' => ['nullable', 'string', 'max:25', 'unique:hospitals,fax'],
            'email' => ['nullable', 'string', 'max:50', 'unique:hospitals,email'],
            'wo_prefix' => ['nullable', 'string', 'max:50'],
            'wocm_slno' => ['nullable', 'string', 'max:100'],
            'wopm_slno' => ['nullable', 'string', 'max:100'],
        ])->validate();

        Hospital::create($validatedData);

        $this->emit('eventRefresh');

        $this->isOpen = false;

        $this->notification()->success(
            'Hospital Saved.',
            $this->state['code'] . ' was successful added.'
        );
    }

    public function show(Hospital $hospital)
    {
        $this->authorize('hospitals.view');

        $this->updateMode = false;

        $this->isOpenPanel = true;

        $this->state = $hospital->toArray();
    }

    public function edit(Hospital $hospital)
    {
        $this->authorize('hospitals.edit');

        $this->updateMode = true;

        $this->state = $hospital->toArray();

        $this->hospital = $hospital;

        $this->isOpen = true;
    }

    public function update()
    {
        $validatedData = Validator::make($this->state, [
            'code' => ['required', 'string',
                Rule::unique('hospitals', 'code')->ignore($this->state['id'])
            ],
            'hospital_code_prefix' => ['nullable', 'string', 'max:100'],
            'name' => ['required', 'string', 'max:50'],
            'region' => ['nullable', 'string'],
            'address' => ['nullable', 'string', 'max:100'],
            'phone' => ['nullable', 'string', 'max:25',
                Rule::unique('hospitals', 'phone')->ignore($this->state['id'])
            ],
            'fax' => ['nullable', 'string', 'max:25',
                Rule::unique('hospitals', 'fax')->ignore($this->state['id'])
            ],
            'email' => ['nullable', 'string', 'max:50',
                Rule::unique('hospitals', 'email')->ignore($this->state['id'])
            ],
            'wo_prefix' => ['nullable', 'string', 'max:50'],
            'wocm_slno' => ['nullable', 'string', 'max:100'],
            'wopm_slno' => ['nullable', 'string', 'max:100'],
        ])->validate();

        $this->hospital->update($validatedData);

        $this->isOpen = false;

        $this->updateMode = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Hospital Updated.',
            $this->state['code'] . ' was successfully updated.'
        );
    }

    public function confirmDeletion(Hospital $hospital)
    {
        $this->authorize('hospitals.delete');

        $this->confirmingDeletion = $hospital->id;
    }

    public function delete(Hospital $hospital)
    {
        if ($this->forceDelete === true) {

            $hospital->forceDelete();

        } else {

            $hospital->delete();

        }

        $this->confirmingDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Hospital Deleted.',
            $this->forceDelete === true ? 'The Hospital was deleted successfully!' : 'The Hospital moved into deleted hospital!'
        );

        if ($this->forceDelete === true) {

            $this->forceDelete = false;

        }
    }

    private function resetInputFields()
    {
        $this->state = [];
    }

    public function render()
    {
        return view('hospitals.hospital-index');
    }
}
