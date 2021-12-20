<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use WireUi\Traits\Actions;

class TaskTrash extends Component
{
    use Actions;

    public $confirmingRestore = false;

    public $confirmingForceDeletion = false;

    protected $listeners = [
        'confirmRestore',
        'confirmForceDeletion'
    ];

    /**
     * Showing the restore confirmation modal.
     * @param null $task
     */
    public function confirmRestore($task = null)
    {
        $this->confirmingRestore = $task['key'];
    }

    /**
     * Restoring the task record.
     * @param null $id
     */
    public function restore($id = null)
    {
        Task::onlyTrashed()->find($id)->restore();

        $this->confirmingRestore = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Task Restored.',
            'Task restored successfully!'
        );
    }

    /**
     * Showing the force delete confirmation modal.
     * @param null $task
     */
    public function confirmForceDeletion($task = null)
    {
        $this->confirmingForceDeletion = $task['key'];
    }

    /**
     * Force Deleting the task record.
     * @param null $id
     */
    public function forceDelete($id = null)
    {
        Task::onlyTrashed()->find($id)->deleteFile('checklist_path');

        Task::onlyTrashed()->find($id)->forceDelete();

        $this->confirmingForceDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Task Deleted.',
            'The Task was permanently deleted successfully!'
        );
    }

    public function render()
    {
        return view('tasks.task-trash');
    }
}
