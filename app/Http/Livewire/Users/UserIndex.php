<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class UserIndex extends Component
{
    use Actions;
    use WithFileUploads;

    public $state = [];

    public $roles;

    public $photo;

    public $user;

    public $isOpen = false;

    public $isOpenPanel = false;

    public $confirmingDeletion = false;

    public $forceDelete = false;

    public $updateMode = false;

    protected $listeners = [
        'confirmDeletion',
        'edit',
        'show'
    ];

    /**
     *  Show create user form.
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
        'state.name' => 'name',
        'state.email' => 'description',
        'state.password' => 'password',
        'state.phone' => 'phone',
    ];

    /**
     * Storing new user record.
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function store()
    {
        $this->resetValidation();

        $this->validate([
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'state.name' => ['required', 'string', 'max:100', 'min:2'],
            'state.email' => ['required', 'string', 'email', 'max:100', 'unique:users,email'],
            'state.password' => ['required', 'confirmed'],
            'state.phone' => ['nullable', 'string'],
            'roles' => ['required'],
        ]);

        // Create new user instance.
        $user = new User();

        $user->name = $this->state['name'];

        $user->email = e($this->state['email']);

        if (isset($this->state['password'])) {
           $user->password = Hash::make($this->state['password']);
        }

        $user->phone = $this->state['phone'];

        if (isset($this->photo)) {
            $user->updateProfilePhoto($this->photo);
        }

        if ($user->save()) {
            // Assign multiple roles for the user.
            if (isset($this->roles)) {
                $user->assignRole($this->roles);
            }
        }

        $this->emit('eventRefresh');

        $this->isOpen = false;

        $this->notification()->success(
            'User Added.',
            $this->state['name'] . ' was successful added.'
        );
    }

    /**
     * Show the user detail panel.
     * @param User $user
     */
    public function show(User $user)
    {
        $this->updateMode = false;

        $this->isOpenPanel = true;

        $this->state = $user;
    }

    /**
     * Show the user edit form.
     * @param User $user
     */
    public function edit(User $user)
    {
        $this->updateMode = true;

        $this->state = $user->toArray();

        $this->user = $user;

        $this->roles = $user->roles()->pluck('name');

        $this->isOpen = true;
    }

    /**
     * Resetting every input elements
     */
    private function resetInputFields()
    {
        $this->state = [];

        $this->photo = null;

        $this->roles = [];
    }

    /**
     * Updating relevant user record.
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update()
    {
        $this->resetValidation();

        $this->validate([
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'state.name' => ['required', 'string', 'max:100', 'min:2'],
            'state.email' => ['required', 'string', 'email', 'max:100',
                Rule::unique('users', 'email')->ignore($this->state['id'])
            ],
            'state.password' => ['nullable', 'confirmed'],
            'state.phone' => ['nullable', 'string'],
            'roles' => ['required'],
        ]);

        $this->user->name = $this->state['name'];

        $this->user->email = e($this->state['email']);

        if (isset($this->state['password'])) {
            $this->user->password = Hash::make($this->state['password']);
        }

        $this->user->phone = $this->state['phone'];

        if (isset($this->photo)) {
            $this->user->updateProfilePhoto($this->photo);
        }

        if ($this->user->save()) {

            $this->user->roles()->detach();

            // Assign multiple roles for the user.
            if (isset($this->roles)) {
                $this->user->assignRole($this->roles);
            }
        }

        $this->isOpen = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'User Updated.',
            $this->state['name'] . ' was successfully updated.'
        );

        $this->updateMode = false;
    }

    /**
     * Show delete confirmation modal
     * @param User $user
     */
    public function confirmDeletion(User $user)
    {
        $this->confirmingDeletion = $user->id;
    }

    /**
     * Deleting the user.
     * @param User $user
     */
    public function delete(User $user)
    {
        // First, check if we are not trying to delete ourselves
        if ($user->id === Auth::id()) {

            $this->confirmingDeletion = false;

            $this->notification()->error(
                'Cannot Delete Yourself',
                'We would feel really bad if you deleted yourself, please reconsider.'
            );

        } else {

            if ($this->forceDelete === true) {

                $user->deleteProfilePhoto();

                $user->forceDelete();

            } else {

                $user->delete();

            }

            $this->confirmingDeletion = false;

            $this->emit('eventRefresh');

            $this->notification()->success(
                'User Deleted.',
                $this->forceDelete === true ? 'The User was deleted successfully!' : 'The User moved into deleted user!'
            );

        }

        if ($this->forceDelete === true) {

            $this->forceDelete = false;

        }
    }

    public function render()
    {
        return view('users.user-index');
    }
}
