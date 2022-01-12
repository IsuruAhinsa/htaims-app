<?php

namespace App\Http\Livewire\Vendors;

use App\Models\Vendor;
use Livewire\Component;
use WireUi\Traits\Actions;

class VendorTrash extends Component
{
    use Actions;

    public $confirmingRestore = false;

    public $confirmingForceDeletion = false;

    protected $listeners = [
        'confirmRestore',
        'confirmForceDeletion'
    ];

    public function confirmRestore($vendor = null)
    {
        $this->confirmingRestore = $vendor['key'];
    }

    public function restore($id = null)
    {
        Vendor::onlyTrashed()->find($id)->restore();

        $this->confirmingRestore = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Vendor Restored.',
            'Vendor restored successfully!'
        );
    }

    public function confirmForceDeletion($vendor = null)
    {
        $this->confirmingForceDeletion = $vendor['key'];
    }

    public function forceDelete($id = null)
    {
        Vendor::onlyTrashed()->find($id)->forceDelete();

        $this->confirmingForceDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Vendor Deleted.',
            'The Vendor was permanently deleted successfully!'
        );
    }

    public function render()
    {
        return view('vendors.vendor-trash');
    }
}
