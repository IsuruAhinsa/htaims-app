<?php

namespace App\Http\Livewire\Assets;

use App\Models\Asset;
use Livewire\Component;
use WireUi\Traits\Actions;

class AssetTrash extends Component
{
    use Actions;

    public $confirmingRestore = false;

    public $confirmingForceDeletion = false;

    protected $listeners = [
        'confirmRestore',
        'confirmForceDeletion'
    ];

    public function confirmRestore($asset = null)
    {
        $this->confirmingRestore = $asset['key'];
    }

    public function restore($id = null)
    {
        Asset::onlyTrashed()->find($id)->restore();

        $this->confirmingRestore = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Asset Restored.',
            'Asset restored successfully!'
        );
    }

    public function confirmForceDeletion($asset = null)
    {
        $this->confirmingForceDeletion = $asset['key'];
    }

    public function forceDelete($id = null)
    {
        Asset::onlyTrashed()->find($id)->forceDelete();

        $this->confirmingForceDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Asset Deleted.',
            'The Asset was permanently deleted successfully!'
        );
    }

    public function render()
    {
        return view('assets.asset-trash');
    }
}
