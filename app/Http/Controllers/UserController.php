<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function manage_users()
    {
        $users = User::all();

        return view('admin.manage-users.index', compact('users'));
    }

    public function create_users()
    {
        $roles = Role::all();

        return view('admin.manage-users.create-users', compact('roles'));
    }

    public function store_users()
    {
        $validation = request()->validate([
            'username' => 'required',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required',
            'role' => 'required',
            'image' => 'required',
        ]);

        if ($validation) {
            $image = request('image');
            $image_name = uniqid() . "_" . $image->getClientOriginalName();
            $image->move(public_path('assets/images/profiles'), $image_name);

            $user = new User();
            $user->name = $validation['username'];
            $user->email = $validation['email'];
            $user->password = Hash::make($validation['password']);
            $user->role_id = $validation['role'];
            $user->image_name = $image_name;
            $user->save();

            if (Auth::attempt(['email' => $validation['email'], 'password' => $validation['password']])) {
                return redirect()->route('admin.manage-users');
            }
        } else {
            return back()->withErrors('error', $validation);
        }
    }

    public function edit_users($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.manage-users.edit-users', compact('user', 'roles'));
    }

    public function update_users($id)
    {
        $validation = request()->validate([
            'username' => 'required',
            'email' => 'required|email:rfc,dns',
            'role' => 'required',
        ]);

        if ($validation) {
            $user = User::findOrFail($id);
            $user->name = $validation['username'];
            $user->email = $validation['email'];
            $user->role_id = $validation['role'];

            if (request('image')) {
                $image = request('image');
                $image_name = uniqid() . "_" . $image->getClientOriginalName();
                $image->move(public_path('assets/images/profiles'), $image_name);
                $user->image_name = $image_name;
            }

            $user->update();

            return redirect()->route('admin.manage-users')->with('success', "User updated successfully!");
        } else {
            return back()->withErrors('error', $validation);
        }
    }

    public function delete_users($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manage-users')->with('success', "User removed successfully!");
    }
}
