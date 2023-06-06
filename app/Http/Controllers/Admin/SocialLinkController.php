<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSocialLinkStoreRequest;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = SocialLink::all();
        return view('admin.social-link.index', compact('socialLinks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.social-link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminSocialLinkStoreRequest $request)
    {
        $social = new SocialLink();
        $social->icon = $request->icon;
        $social->url = $request->url;
        $social->status = $request->status;
        $social->save();

        toast(__('Created Successfully!'), 'success');

        return redirect()->route('admin.social-link.index');
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
