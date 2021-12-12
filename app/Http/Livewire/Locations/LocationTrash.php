<?php

namespace App\Http\Livewire\Locations;

use App\Models\Location;
use Livewire\Component;
use WireUi\Traits\Actions;

class LocationTrash extends Component
{
    use Actions;

    public $confirmingRestore = false;

    public $confirmingForceDeletion = false;

    protected $listeners = [
        'confirmRestore',
        'confirmForceDeletion'
    ];

    public function confirmRestore($location = null)
    {
        $this->confirmingRestore = $location['key'];
    }

    public function restore($id = null)
    {
        Location::onlyTrashed()->find($id)->restore();

        $this->confirmingRestore = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Location Restored.',
            'Location restored successfully!'
        );
    }

    public function confirmForceDeletion($location = null)
    {
        $this->confirmingForceDeletion = $location['key'];
    }

    public function forceDelete($id = null)
    {
        Location::onlyTrashed()->find($id)->forceDelete();

        $this->confirmingForceDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Location Deleted.',
            'The Location was permanently deleted successfully!'
        );
    }

    public function render()
    {
        return view('locations.location-trash');
    }
}
