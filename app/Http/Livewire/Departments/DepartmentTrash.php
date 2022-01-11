<?php

namespace App\Http\Livewire\Departments;

use App\Models\Department;
use Livewire\Component;
use WireUi\Traits\Actions;

class DepartmentTrash extends Component
{
    use Actions;

    public $confirmingRestore = false;

    public $confirmingForceDeletion = false;

    protected $listeners = [
        'confirmRestore',
        'confirmForceDeletion'
    ];

    public function confirmRestore($department = null)
    {
        $this->confirmingRestore = $department['key'];
    }

    public function restore($id = null)
    {
        Department::onlyTrashed()->find($id)->restore();

        $this->confirmingRestore = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Department Restored.',
            'Department restored successfully!'
        );
    }

    public function confirmForceDeletion($department = null)
    {
        $this->confirmingForceDeletion = $department['key'];
    }

    public function forceDelete($id = null)
    {
        Department::onlyTrashed()->find($id)->forceDelete();

        $this->confirmingForceDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Department Deleted.',
            'The Department was permanently deleted successfully!'
        );
    }

    public function render()
    {
        return view('departments.department-trash');
    }
}
