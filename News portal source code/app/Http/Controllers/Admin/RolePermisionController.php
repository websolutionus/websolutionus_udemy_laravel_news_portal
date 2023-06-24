<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermisionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:access management index,admin'])->only(['index']);
        $this->middleware(['permission:access management create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:access management update,admin'])->only(['edit', 'update', 'handleTitle']);
        $this->middleware(['permission:access management destroy,admin'])->only(['destroy']);
    }

    function index() : View
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    function create() : View
    {
        $premissions = Permission::all()->groupBy('group_name');

        return view('admin.role.create', compact('premissions'));
    }

    function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'role' => ['required', 'max:50', 'unique:permissions,name']
        ]);

        /** create the role */
        $role = Role::create(['guard_name' => 'admin', 'name' => $request->role]);

        /** assgin permissions to the role */
        $role->syncPermissions($request->permissions);

        toast(__('admin.Created Successfully'), 'success');

        return redirect()->route('admin.role.index');

    }

    function edit(string $id) : View
    {
        $premissions = Permission::all()->groupBy('group_name');
        $role = Role::findOrFail($id);
        $rolesPermissions = $role->permissions;
        $rolesPermissions = $rolesPermissions->pluck('name')->toArray();
        return view('admin.role.edit', compact('premissions', 'role', 'rolesPermissions'));
    }

    function update(Request $request, string $id) : RedirectResponse {
        $request->validate([
            'role' => ['required', 'max:50', 'unique:permissions,name']
        ]);

        /** create the role */
        $role = Role::findOrFail($id);
        $role->update(['guard_name' => 'admin', 'name' => $request->role]);

        /** assgin permissions to the role */
        $role->syncPermissions($request->permissions);

        toast(__('admin.Update Successfully'), 'success');

        return redirect()->route('admin.role.index');
    }

    function destory(string $id) : Response {
        $role = Role::findOrFail($id);
        if($role->name === 'Super Admin'){
            return response(['status' => 'error', 'message' => __('admin.Can\'t Delete the Super Admin')]);
        }

        $role->delete();

        return response(['status' => 'success', 'message' => __('admin.Deleted Successfully')]);
    }

}
