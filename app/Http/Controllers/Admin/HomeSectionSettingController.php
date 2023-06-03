<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;

class HomeSectionSettingController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('admin.home-section-setting.index', compact('languages'));
    }
}
