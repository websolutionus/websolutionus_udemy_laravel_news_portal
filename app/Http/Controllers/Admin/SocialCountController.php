<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSocialCountStoreRequest;
use App\Models\Language;
use App\Models\SocialCount;
use Illuminate\Http\Request;

class SocialCountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.social-count.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.social-count.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminSocialCountStoreRequest $request)
    {
        $socialCount = new SocialCount();
        $socialCount->language = $request->language;
        $socialCount->icon = $request->icon;
        $socialCount->url = $request->url;
        $socialCount->fan_count = $request->fan_count;
        $socialCount->fan_type = $request->fan_type;
        $socialCount->button_text = $request->button_text;
        $socialCount->color = $request->color;
        $socialCount->status = $request->status;
        $socialCount->save();

        toast(__('Created Successfully!'), 'success');

        return redirect()->route('admin.social-count.index');

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
