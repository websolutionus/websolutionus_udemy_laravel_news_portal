<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePermisionController extends Controller
{
    function index() {
        return view('admin.role.index');
    }
}
