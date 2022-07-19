<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;



class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name'=> ['required','min:3']]);
        Role::create($validated);
        return redirect()->route('admin.roles.index')->with('message','Created success');
    }

    public function edit(Role $role, Request $request)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit',compact('role','permissions'));
    }

    public function update(Role $role, Request $request)
    {
        $validated = $request->validate(['name'=> ['required','min:3']]);
        $role->update($validated);
        return redirect()->route('admin.roles.index')->with('message','Updated success');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('message','Deleted success');
    }

    public function givePermission(Request $request, Role $role)
    {
        if($role->hasPermissionTo($request->permission))
        {
            return back()->with('message','Permission exist ');
        }
            $role->givePermissionTo($request->permission);
            return back()->with('message','Permission assigned ');   
    }

    public function revokePermission(Role $role,Permission $permission)
    {
        if($role->hasPermissionTo($permission))
        {
            $role->revokePermissionTo($permission);
            return back()->with('message','Permission revoked');
        }
        return back()->with('message','Permission not revoked');
        
    }
}
