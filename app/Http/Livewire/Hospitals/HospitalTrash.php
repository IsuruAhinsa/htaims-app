<?php

namespace App\Http\Livewire\Hospitals;

use App\Models\Hospital;
use Livewire\Component;
use WireUi\Traits\Actions;

class HospitalTrash extends Component
{
    use Actions;

    public $confirmingRestore = false;

    public $confirmingForceDeletion = false;

    protected $listeners = [
        'confirmRestore',
        'confirmForceDeletion'
    ];

    public function confirmRestore($hospital = null)
    {
        $this->confirmingRestore = $hospital['key'];
    }

    public function restore($id = null)
    {
        Hospital::onlyTrashed()->find($id)->restore();

        $this->confirmingRestore = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Hospital Restored.',
            'Hospital restored successfully!'
        );
    }

    public function confirmForceDeletion($hospital = null)
    {
        $this->confirmingForceDeletion = $hospital['key'];
    }

    public function forceDelete($id = null)
    {
        Hospital::onlyTrashed()->find($id)->forceDelete();

        $this->confirmingForceDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Hospital Deleted.',
            'The Hospital was permanently deleted successfully!'
        );
    }

    public function render()
    {
        return view('hospitals.hospital-trash');
    }
}
