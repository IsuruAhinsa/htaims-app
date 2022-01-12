<?php

namespace App\Http\Livewire\Contractors;

use App\Models\Contractor;
use Livewire\Component;
use WireUi\Traits\Actions;

class ContractorTrash extends Component
{
    use Actions;

    public $confirmingRestore = false;

    public $confirmingForceDeletion = false;

    protected $listeners = [
        'confirmRestore',
        'confirmForceDeletion'
    ];

    public function confirmRestore($contractor = null)
    {
        $this->confirmingRestore = $contractor['key'];
    }

    public function restore($id = null)
    {
        Contractor::onlyTrashed()->find($id)->restore();

        $this->confirmingRestore = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Contractor Restored.',
            'Contractor restored successfully!'
        );
    }

    public function confirmForceDeletion($contractor = null)
    {
        $this->confirmingForceDeletion = $contractor['key'];
    }

    public function forceDelete($id = null)
    {
        Contractor::onlyTrashed()->find($id)->forceDelete();

        $this->confirmingForceDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Contractor Deleted.',
            'The Contractor was permanently deleted successfully!'
        );
    }

    public function render()
    {
        return view('contractors.contractor-trash');
    }
}
