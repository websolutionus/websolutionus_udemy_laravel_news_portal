<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRoleUserStoreRequest;
use App\Mail\RoleUserCreateMail;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('admin.role-user.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $roles = Role::all();
        return view('admin.role-user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminRoleUserStoreRequest $request) : RedirectResponse
    {

        try {
            $user = new Admin();
            $user->image = '';
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->status = 1;
            $user->save();

            /** assign the role to user */
            $user->assignRole($request->role);

            /** send mail to the user */
            Mail::to($request->email)->send(new RoleUserCreateMail($request->email, $request->password));

            toast(__('Created Successfully!'), 'success');

            return redirect()->route('admin.role-users.index');

        } catch (\Throwable $th) {
            throw $th;
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
