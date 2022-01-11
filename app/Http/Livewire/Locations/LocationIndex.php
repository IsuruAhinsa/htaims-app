<?php

namespace App\Http\Livewire\Locations;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use App\Models\Location;
use WireUi\Traits\Actions;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class LocationIndex extends Component
{
    use Actions;
    use AuthorizesRequests;

    public $state = [];

    public $location;

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
     * Show location create form modal.
     */
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
        $this->authorize('locations.show');

        $this->updateMode = false;

        $this->isOpenPanel = true;

        $this->state = $location->toArray();
    }

    public function edit(Location $location)
    {
        $this->authorize('locations.edit');

        $this->updateMode = true;

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

        $this->updateMode = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Location Updated.',
            $this->state['code'] . ' was successfully updated.'
        );
    }

    public function confirmDeletion(Location $location)
    {
        $this->authorize('locations.delete');

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
