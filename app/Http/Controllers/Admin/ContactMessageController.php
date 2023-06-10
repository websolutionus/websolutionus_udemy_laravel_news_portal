<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\RecivedMail;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index()
    {
        $messages = RecivedMail::all();
        return view('admin.contact-message.index', compact('messages'));
    }
}
