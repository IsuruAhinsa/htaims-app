<?php

namespace App\Http\Livewire\Departments;

use App\Models\Department;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\Actions;

class DepartmentIndex extends Component
{
    use Actions;
    use AuthorizesRequests;

    public $state = [];

    public $department;

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
     * Show department create form modal.
     */
    public function create()
    {
        $this->resetInputFields();

        $this->isOpen = true;
    }

    public function store()
    {
        $validatedData = Validator::make($this->state, [
            'code' => 'required|string|max:100|unique:departments,code',
            'description' => 'required|string',
        ])->validate();

        Department::create($validatedData);

        $this->emit('eventRefresh');

        $this->isOpen = false;

        $this->notification()->success(
            'Department Saved.',
            $this->state['code'] . ' was successful added.'
        );
    }

    public function show(Department $department)
    {
        $this->authorize('departments.show');

        $this->updateMode = false;

        $this->isOpenPanel = true;

        $this->state = $department->toArray();
    }

    public function edit(Department $department)
    {
        $this->authorize('departments.edit');

        $this->updateMode = true;

        $this->state = $department->toArray();

        $this->department = $department;

        $this->isOpen = true;
    }

    public function update()
    {
        $validatedData = Validator::make($this->state, [
            'code' => ['required', 'string', 'max:100',
                Rule::unique('departments', 'code')->ignore($this->state['id'])
            ],
            'description' => ['required', 'string'],
        ])->validate();

        $this->department->update($validatedData);

        $this->isOpen = false;

        $this->updateMode = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Department Updated.',
            $this->state['code'] . ' was successfully updated.'
        );
    }

    public function confirmDeletion(Department $department)
    {
        $this->authorize('departments.delete');

        $this->confirmingDeletion = $department->id;
    }

    public function delete(Department $department)
    {
        if ($this->forceDelete === true) {

            $department->forceDelete();

        } else {

            $department->delete();

        }

        $this->confirmingDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'Department Deleted.',
            $this->forceDelete === true ? 'The Department was deleted successfully!' : 'The Department moved into deleted department!'
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
        return view('departments.department-index');
    }
}
