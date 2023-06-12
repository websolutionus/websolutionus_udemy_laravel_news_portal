<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermisionController extends Controller
{
    function index() {
        return view('admin.role.index');
    }

    function create() {


        return view('admin.role.create');
    }
}
