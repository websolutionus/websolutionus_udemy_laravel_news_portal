<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    function index() : View {
        $languages = Language::all();
        return view('admin.localization.index', compact('languages'));
    }
}
