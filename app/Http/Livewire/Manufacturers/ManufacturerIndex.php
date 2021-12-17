<?php

namespace App\Http\Livewire\Manufacturers;

use App\Models\Manufacturer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class ManufacturerIndex extends Component
{
    use Actions;

    public $state = [];

    public $manufacturer;

    public $isOpen = false;

    public $isOpenPanel = false;

    public $confirmingDeletion = false;

    public $forceDelete = false;

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
            'code' => ['required', 'max:100', 'unique:manufacturers,code'],
            'name' => ['required', 'string', 'max:200'],
            'contact_person' => ['required', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:100'],
            'state' => ['nullable', 'string', 'max:150'],
            'zip' => ['nullable', 'string', 'max:50'],
            'country' => ['nullable', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:50', 'unique:manufacturers,phone'],
            'fax' => ['nullable', 'string', 'max:50', 'unique:manufacturers,fax'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:manufacturers,email']
        ])->validate();

        Manufacturer::create($validatedData);

        $this->emit('eventRefresh');

        $this->isOpen = false;

        $this->notification()->success(
            'Manufacturer Saved.',
            $this->state['code'] . ' was successful added.'
        );
    }

    public function show(Manufacturer $manufacturer)
    {
        $this->isOpenPanel = true;

        $this->state = $manufacturer->toArray();
    }

    public function edit(Manufacturer $manufacturer)
    {
        $this->state = $manufacturer->toArray();

        $this->manufacturer = $manufacturer;

        $this->isOpen = true;
    }

    public function update()
    {
        $validatedData = Validator::make($this->state, [
            'code' => ['required', 'max:100',
                Rule::unique('manufacturers', 'code')->ignore($this->state['id'])
            ],
            'name' => ['required', 'string', 'max:200'],
            'contact_person' => ['required', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:100'],
            'city' => ['nullable', 'string', 'max:25'],
            'state' => ['nullable', 'string', 'max:25'],
            'zip' => ['nullable', 'string', 'max:15'],
            'country' => ['nullable', 'string', 'max:30'],
            'phone' => ['required', 'string', 'max:20',
                Rule::unique('manufacturers', 'phone')->ignore($this->state['id'])
            ],
            'fax' => ['nullable', 'string', 'max:20',
                Rule::unique('manufacturers', 'fax')->ignore($this->state['id'])
            ],
            'email' => ['required', 'string', 'email', 'max:30',
                Rule::unique('manufacturers', 'email')->ignore($this->state['id'])
            ],
        ])->validate();

        $this->manufacturer->update($validatedData);

        $this->isOpen = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Manufacturer Updated.',
            $this->state['code'] . ' was successfully updated.'
        );
    }

    public function confirmDeletion(Manufacturer $manufacturer)
    {
        $this->confirmingDeletion = $manufacturer->id;
    }

    public function delete(Manufacturer $manufacturer)
    {
        if ($this->forceDelete === true) {

            $manufacturer->forceDelete();

        } else {

            $manufacturer->delete();

        }

        $this->confirmingDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Manufacturer Deleted.',
            $this->forceDelete === true ? 'The Manufacturer was deleted successfully!' : 'The Manufacturer moved into deleted manufacturer!'
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
        return view('manufacturers.manufacturer-index');
    }
}
