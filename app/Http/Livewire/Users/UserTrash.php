<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class UserTrash extends Component
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
     * @param null $user
     */
    public function confirmRestore($user = null)
    {
        $this->confirmingRestore = $user['key'];
    }

    /**
     * Restoring the user record.
     * @param null $id
     */
    public function restore($id = null)
    {
        User::onlyTrashed()->find($id)->restore();

        $this->confirmingRestore = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'User Restored.',
            'User restored successfully!'
        );
    }

    /**
     * Showing the force delete confirmation modal.
     * @param null $user
     */
    public function confirmForceDeletion($user = null)
    {
        $this->confirmingForceDeletion = $user['key'];
    }

    /**
     * Force Deleting the user record.
     * @param null $id
     */
    public function forceDelete($id = null)
    {
        User::onlyTrashed()->find($id)->deleteProfilePhoto();

        User::onlyTrashed()->find($id)->forceDelete();

        $this->confirmingForceDeletion = false;

        $this->emit('eventRefresh');

        $this->notification()->success(
            'User Deleted.',
            'The User was permanently deleted successfully!'
        );
    }

    public function render()
    {
        return view('users.user-trash');
    }
}
