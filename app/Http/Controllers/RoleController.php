<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function roles()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create_roles()
    {
        return view('admin.roles.create-roles');
    }

    public function store_roles()
    {
        $validation = request()->validate([
            'role_name' => 'required',
        ]);

        if ($validation) {
            $role = new Role();
            $role->role_name = $validation['role_name'];
            $role->save();

            return redirect()->route('admin.roles')->with('success', "Role created successfully!");
        } else {
            return back()->withErrors('error', $validation);
        }
    }

    public function edit_roles($id)
    {
        $role = Role::findOrFail($id);

        return view('admin.roles.edit-roles', compact('role'));
    }

    public function update_roles($id)
    {
        $validation = request()->validate([
            'role_name' => 'required',
        ]);

        if ($validation) {
            $role = Role::findOrFail($id);
            $role->role_name = $validation['role_name'];
            $role->update();

            return redirect()->route('admin.roles')->with('success', "Role updated successfully!");
        } else {
            return back()->withErrors('error', $validation);
        }
    }

    public function delete_roles($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('admin.roles')->with('success', "Role deleted successfully!");
    }
}
