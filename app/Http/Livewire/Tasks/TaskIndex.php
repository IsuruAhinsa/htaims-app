<?php

namespace App\Http\Livewire\Tasks;

use App\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class TaskIndex extends Component
{
    use Actions;
    use WithFileUploads;
    use AuthorizesRequests;

    public $state = [];

    public $task;

    public $isOpen = false;

    public $isOpenPanel = false;

    public $confirmingDeletion = false;

    public $forceDelete = false;

    public $checklist;

    public $updateMode = false;

    protected $listeners = [
        'confirmDeletion',
        'edit',
        'show',
        'download' => 'downloadAttachment'
    ];

    /**
     *  Show create task form.
     */
    public function create()
    {
        $this->resetValidation();

        $this->resetInputFields();

        $this->isOpen = true;
    }

    /**
     * Custom validation attributes
     * @var string[]
     */
    protected $validationAttributes = [
        'state.type_code' => 'type code',
        'state.description' => 'description',
        'state.service_life' => 'service life',
    ];

    /**
     * Storing new task record including checklist attachment.
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function store()
    {
        $this->resetValidation();

        $this->validate([
            'state.type_code' => ['required', 'max:100', 'unique:tasks,type_code'],
            'state.description' => ['required', 'string'],
            'checklist' => ['required', 'mimetypes:application/pdf'],
            'state.service_life' => ['required', 'string'],
        ]);

        $task = new Task();
        $task->type_code = $this->state['type_code'];
        $task->description = $this->state['description'];
        $task->service_life = $this->state['service_life'];

        if (isset($this->checklist)) {
            $task->updateFile($this->checklist, 'checklist_path', 'uploads/tasks/checklists');
        }

        $task->save();

        if (isset($this->checklist)) {
            return redirect()->route('tasks.index');
        }

        $this->emit('eventRefresh');

        $this->isOpen = false;

        $this->notification()->success(
            'Task Saved.',
            $this->state['type_code'] . ' was successful added.'
        );
    }

    /**
     * Show the task detail panel.
     * @param Task $task
     */
    public function show(Task $task)
    {
        $this->authorize('tasks.view');

        $this->updateMode = false;

        $this->isOpenPanel = true;

        $this->state = $task->toArray();
    }

    /**
     * Show the task edit form.
     * @param Task $task
     */
    public function edit(Task $task)
    {
        $this->authorize('tasks.edit');

        $this->updateMode = true;

        $this->state = $task->toArray();

        $this->task = $task;

        $this->isOpen = true;
    }

    /**
     * Updating relevant task record including checklist attachment.
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update()
    {
        $this->resetValidation();

        $this->validate([
            'state.type_code' => ['required', 'max:100',
                Rule::unique('tasks', 'type_code')->ignore($this->state['id'])
            ],
            'state.description' => ['required', 'string'],
            'checklist' => ['nullable', 'mimetypes:application/pdf'],
            'state.service_life' => ['required', 'string'],
        ]);

        $this->task->type_code = $this->state['type_code'];
        $this->task->description = $this->state['description'];
        $this->task->service_life = $this->state['service_life'];

        if (isset($this->checklist)) {
            $this->task->updateFile($this->checklist, 'checklist_path', 'uploads/tasks/checklists');
        }

        $this->task->save();

        if (isset($this->checklist)) {
            return redirect()->route('tasks.index');
        }

        $this->isOpen = false;

        $this->updateMode = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Task Updated.',
            $this->state['type_code'] . ' was successfully updated.'
        );
    }

    /**
     * Show delete confirmation modal
     * @param Task $task
     */
    public function confirmDeletion(Task $task)
    {
        $this->authorize('tasks.delete');

        $this->confirmingDeletion = $task->id;
    }

    /**
     * Deleting the task including the attachments.
     * @param Task $task
     */
    public function delete(Task $task)
    {
        if ($this->forceDelete === true) {

            $task->deleteFile('checklist_path');

            $task->forceDelete();

        } else {

            $task->delete();

        }

        $this->confirmingDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Task Deleted.',
            $this->forceDelete === true ? 'The Task was deleted successfully!' : 'The Task moved into deleted task!'
        );

        if ($this->forceDelete === true) {

            $this->forceDelete = false;

        }
    }

    /**
     * Resetting every input elements
     */
    private function resetInputFields()
    {
        $this->state = [];
        $this->checklist = null;
    }

    /**
     * Deleting the current checklist attachment and set column as a NULL
     *
     */
    public function deleteAttachment()
    {
        $this->task->deleteFile('checklist_path');

        $this->isOpen = false;

        $this->emit('eventRefresh');
    }

    /**
     * Downloading checklist attachment.
     * @param Task $task
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function downloadAttachment(Task $task)
    {
        $this->authorize('tasks.download');

        return Storage::disk('public')->download($task->checklist_path);
    }

    public function render()
    {
        return view('tasks.task-index');
    }
}
