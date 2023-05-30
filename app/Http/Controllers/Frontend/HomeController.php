<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::where([
            'status' => 1,
            'is_approved' => 1,
            'is_breaking_news' => 1
        ])->get();

        return view('frontend.home', compact('breakingNews'));
    }
}
