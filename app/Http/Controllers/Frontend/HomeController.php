<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::where(['is_breaking_news' => 1,])
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(10)->get();

        return view('frontend.home', compact('breakingNews'));
    }

    public function ShowNews(string $slug)
    {
        $news = News::with(['auther', 'tags'])->where('slug', $slug)
            ->activeEntries()->withLocalize()
            ->first();

        $recentNews = News::with(['category', 'auther'])->where('slug','!=', $news->slug)
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(4)->get();

        $this->countView($news);

       return view('frontend.news-details', compact('news', 'recentNews'));
    }

    public function countView($news)
    {
        if(session()->has('viewed_posts')){
            $postIds = session('viewed_posts');

            if(!in_array($news->id, $postIds)){
                $postIds[] = $news->id;
                $news->increment('views');
            }
            session(['viewed_posts' => $postIds]);

        }else {
            session(['viewed_posts' => [$news->id]]);

            $news->increment('views');

        }
    }
}
