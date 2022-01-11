<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the roles.
     *
     */
    public function index()
    {
        $this->authorize('roles.view');

        return view('roles.index');
    }

    /**
     * Show the form for creating a new role.
     *
     */
    public function create()
    {
        $this->authorize('roles.create');

        $allPermissions = Permission::all();
        $permissionGroups = User::getPermissionGroups();
        return view('roles.create', [
            'allPermissions' => $allPermissions,
            'permissionGroups' => $permissionGroups,
        ]);
    }

    /**
     * Store a newly created role in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:roles',
        ],[
            'name.required' => 'Please give a role name for creating new role.',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->guard_name = 'web';
        $role->save();

        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions([$permissions]);
        }

        return redirect()
            ->route('roles.index')
            ->with('success', $request->input('name') . ' added as a new role.');
    }

    /**
     * Show the form for editing the specified role.
     *
     */
    public function edit(Role $role)
    {
        $this->authorize('roles.edit');

        if ($role->name == 'Super Administrator') {
            return back()
                ->with('danger', 'Sorry! Can\'t modify super administrator permissions.');
        }

        $allPermissions = Permission::all();
        $permissionGroups = User::getPermissionGroups();

        return view('roles.edit',[
            'allPermissions' => $allPermissions,
            'permissionGroups' => $permissionGroups,
            'role' => $role,
        ]);
    }

    /**
     * Update the specified role in storage.
     *
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => [
                'required',
                'max:50',
                Rule::unique('roles', 'name')->ignore($role->id),
            ],
        ],[
            'name.required' => 'Please give a Role name',
        ]);

        $permissions = $request->input('permissions');

        $role->name = $request->input('name');
        $role->save();
        $role->syncPermissions($permissions);

        return redirect()
            ->route('roles.index')
            ->with('success', $role->name . ' role updated successfully!');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(Role $role)
    {
        $this->authorize('roles.delete');

        if ($role->name == 'Super Administrator') {
            return back()
                ->with('danger', 'Sorry! Can\'t delete super administrator permissions.');
        }

        $role->delete();
        return back()->with('success', 'Role has been deleted!');
    }
}
