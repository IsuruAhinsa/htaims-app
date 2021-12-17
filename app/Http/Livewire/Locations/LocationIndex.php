<?php

namespace App\Http\Livewire\Locations;

use Livewire\Component;
use App\Models\Location;
use WireUi\Traits\Actions;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class LocationIndex extends Component
{
    use Actions;

    public $state = [];

    public $location;

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
            'code' => 'required|string|max:100|unique:locations,code',
            'description' => 'required|string',
        ])->validate();

        Location::create($validatedData);

        $this->emit('eventRefresh');

        $this->isOpen = false;

        $this->notification()->success(
           'Location Saved.',
           $this->state['code'] . ' was successful added.'
        );
    }

    public function show(Location $location)
    {
        $this->isOpenPanel = true;

        $this->state = $location->toArray();
    }

    public function edit(Location $location)
    {
        $this->state = $location->toArray();

        $this->location = $location;

        $this->isOpen = true;
    }

    public function update()
    {
        $validatedData = Validator::make($this->state, [
            'code' => ['required', 'string', 'max:100',
                Rule::unique('locations', 'code')->ignore($this->state['id'])
            ],
            'description' => ['required', 'string'],
        ])->validate();

        $this->location->update($validatedData);

        $this->isOpen = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Location Updated.',
            $this->state['code'] . ' was successfully updated.'
        );
    }

    public function confirmDeletion(Location $location)
    {
        $this->confirmingDeletion = $location->id;
    }

    public function delete(Location $location)
    {
        if ($this->forceDelete === true) {

            $location->forceDelete();

        } else {

            $location->delete();

        }

        $this->confirmingDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Location Deleted.',
            $this->forceDelete === true ? 'The Location was deleted successfully!' : 'The Location moved into deleted location!'
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
        return view('locations.location-index');
    }
}
