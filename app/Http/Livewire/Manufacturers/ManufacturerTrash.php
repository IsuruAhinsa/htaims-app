<?php

namespace App\Http\Livewire\Manufacturers;

use App\Models\Manufacturer;
use Livewire\Component;
use WireUi\Traits\Actions;

class ManufacturerTrash extends Component
{
    use Actions;

    public $confirmingRestore = false;

    public $confirmingForceDeletion = false;

    protected $listeners = [
        'confirmRestore',
        'confirmForceDeletion'
    ];

    public function confirmRestore($manufacturer = null)
    {
        $this->confirmingRestore = $manufacturer['key'];
    }

    public function restore($id = null)
    {
        Manufacturer::onlyTrashed()->find($id)->restore();

        $this->confirmingRestore = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Manufacturer Restored.',
            'Manufacturer restored successfully!'
        );
    }

    public function confirmForceDeletion($manufacturer = null)
    {
        $this->confirmingForceDeletion = $manufacturer['key'];
    }

    public function forceDelete($id = null)
    {
        Manufacturer::onlyTrashed()->find($id)->forceDelete();

        $this->confirmingForceDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Manufacturer Deleted.',
            'The Manufacturer was permanently deleted successfully!'
        );
    }

    public function render()
    {
        return view('manufacturers.manufacturer-trash');
    }
}
