<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserRoleController extends Controller
{

    public function index()
    {
        $users = \App\Models\User::with('roles')->get(); // eager load roles
        return view('admin.users.list', compact('users'));
    }


   // Show form to assign role
    public function create(User $user)
    {   
        $users = \App\Models\User::all(); // get all users
        $roles = \Spatie\Permission\Models\Role::all(); // get all roles
        return view('admin.users.add-role', compact('users', 'roles'));
    }

    // Save role to user
    public function store(Request $request, User $user)
    {
          $request->validate([
                'user_id' => 'required|exists:users,id',
                'roles' => 'required|array',
                'roles.*' => 'exists:roles,name',
            ]);

            $user = \App\Models\User::findOrFail($request->user_id);

            // Replace roles (clean & safe)
            $user->syncRoles($request->roles);

            return redirect()->back()->with('success', 'Roles assigned successfully.');
    }
}
