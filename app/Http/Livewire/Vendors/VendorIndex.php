<?php

namespace App\Http\Livewire\Vendors;

use App\Models\Vendor;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class VendorIndex extends Component
{
    use Actions;
    use AuthorizesRequests;

    public $state = [];

    public $vendor;

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
            'code' => ['required', 'max:100', 'unique:vendors,code'],
            'name' => ['required', 'string', 'max:200'],
            'contact_person' => ['required', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:150'],
            'zip' => ['nullable', 'string', 'max:50'],
            'country' => ['nullable', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:50', 'unique:vendors,phone'],
            'fax' => ['nullable', 'string', 'max:50', 'unique:vendors,fax'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:vendors,email']
        ])->validate();

        Vendor::create($validatedData);

        $this->emit('eventRefresh');

        $this->isOpen = false;

        $this->notification()->success(
            'Vendor Saved.',
            $this->state['code'] . ' was successful added.'
        );
    }

    public function show(Vendor $vendor)
    {
        $this->authorize('vendors.view');

        $this->updateMode = false;

        $this->isOpenPanel = true;

        $this->state = $vendor->toArray();
    }

    public function edit(Vendor $vendor)
    {
        $this->authorize('vendors.edit');

        $this->updateMode = true;

        $this->state = $vendor->toArray();

        $this->vendor = $vendor;

        $this->isOpen = true;
    }

    public function update()
    {
        $validatedData = Validator::make($this->state, [
            'code' => ['required', 'max:100',
                Rule::unique('vendors', 'code')->ignore($this->state['id'])
            ],
            'name' => ['required', 'string', 'max:200'],
            'contact_person' => ['required', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:25'],
            'state' => ['nullable', 'string', 'max:25'],
            'zip' => ['nullable', 'string', 'max:15'],
            'country' => ['nullable', 'string', 'max:30'],
            'phone' => ['required', 'string', 'max:20',
                Rule::unique('vendors', 'phone')->ignore($this->state['id'])
            ],
            'fax' => ['nullable', 'string', 'max:20',
                Rule::unique('vendors', 'fax')->ignore($this->state['id'])
            ],
            'email' => ['required', 'string', 'email', 'max:30',
                Rule::unique('vendors', 'email')->ignore($this->state['id'])
            ],
        ])->validate();

        $this->vendor->update($validatedData);

        $this->isOpen = false;

        $this->updateMode = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Vendor Updated.',
            $this->state['code'] . ' was successfully updated.'
        );
    }

    public function confirmDeletion(Vendor $vendor)
    {
        $this->authorize('vendors.delete');

        $this->confirmingDeletion = $vendor->id;
    }

    public function delete(Vendor $vendor)
    {
        if ($this->forceDelete === true) {

            $vendor->forceDelete();

        } else {

            $vendor->delete();

        }

        $this->confirmingDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Vendor Deleted.',
            $this->forceDelete === true ? 'The Vendor was deleted successfully!' : 'The Vendor moved into deleted vendor!'
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
        return view('vendors.vendor-index');
    }
}
