<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }



    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.show_role',compact('user','roles','permissions'));
    }

    public function assignRole(Request $request, User $user)
    {

        // dd($permission);
        if ($user->hasRole($request->role)) {
            return back()->with('message', 'Role is exist');
        }
        $user->assignRole($request->role);
        return back()->with('message', 'Role assigned');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('message', 'Role removed');
        }
        return back()->with('message', 'Role not removed');
    }

    public function givePermission(Request $request, User $user)
    {
        if($user->hasPermissionTo($request->permission))
        {
            return back()->with('message','Permission exist ');
        }
            $user->givePermissionTo($request->permission);
            return back()->with('message','Permission assigned ');   
    }

    public function revokePermission(User $user,Permission $permission)
    {
        if($user->hasPermissionTo($permission))
        {
            $user->revokePermissionTo($permission);
            return back()->with('message','Permission revoked');
        }
        return back()->with('message','Permission not revoked');
    }

    public function destroy(User $user)
    {
        if($user->hasRole('admin'))
        {
            return back()->with('message','User is admin');
        }
        $user->delete();
        return back()->with('message','User deleted');
    }
}
