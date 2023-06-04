<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\HomeSectionSetting;
use App\Models\News;
use App\Models\SocialCount;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::where(['is_breaking_news' => 1,])
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(10)->get();
        $heroSlider = News::with(['category', 'auther'])
            ->where('show_at_slider', 1)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'DESC')->take(7)
            ->get();

        $recentNews = News::with(['category', 'auther'])->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')->take(6)->get();
        $popularNews = News::with(['category'])->where('show_at_popular', 1)
            ->activeEntries()->withLocalize()
            ->orderBy('updated_at', 'DESC')->take(4)->get();

        $HomeSectionSetting = HomeSectionSetting::where('language', getLangauge())->first();

        $categorySectionOne = News::where('category_id', $HomeSectionSetting->category_section_one)
            ->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(8)
            ->get();

        $categorySectionTwo = News::where('category_id', $HomeSectionSetting->category_section_two)
            ->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(8)
            ->get();

        $categorySectionThree = News::where('category_id', $HomeSectionSetting->category_section_three)
            ->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(6)
            ->get();

        $categorySectionFour = News::where('category_id', $HomeSectionSetting->category_section_four)
            ->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();

        $mostViewedPosts = News::activeEntries()->withLocalize()
            ->orderBy('views', 'DESC')
            ->take(3)
            ->get();

        $socialCounts = SocialCount::where(['status' => 1, 'language' => getLangauge()])->get();

        $mostCommonTags = $this->mostCommonTags();

        return view('frontend.home', compact(
            'breakingNews',
            'heroSlider',
            'recentNews',
            'popularNews',
            'categorySectionOne',
            'categorySectionTwo',
            'categorySectionThree',
            'categorySectionFour',
            'mostViewedPosts',
            'socialCounts',
            'mostCommonTags'
        ));
    }

    public function ShowNews(string $slug)
    {


        $news = News::with(['auther', 'tags', 'comments'])->where('slug', $slug)
        ->activeEntries()->withLocalize()
        ->first();

        $this->countView($news);

        $recentNews = News::with(['category', 'auther'])->where('slug','!=', $news->slug)
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(4)->get();

        $mostCommonTags = $this->mostCommonTags();

        $nextPost = News::where('id', '>', $news->id)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'asc')->first();

        $previousPost = News::where('id', '<', $news->id)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'desc')->first();

        $relatedPosts = News::where('slug', '!=', $news->slug)
            ->where('category_id', $news->category_id)
            ->activeEntries()
            ->withLocalize()
            ->take(5)
            ->get();

       return view('frontend.news-details', compact('news', 'recentNews', 'mostCommonTags', 'nextPost', 'previousPost', 'relatedPosts'));
    }

    public function news(Request $request)
    {

        if($request->has('search')){
            $news = News::where(function($query) use ($request){
                $query->where('title', 'like','%'.$request->search.'%')
                    ->orWhere('content', 'like','%'.$request->search.'%');
            })->orWhereHas('category', function($query) use ($request){
                $query->where('name', 'like','%'.$request->search.'%');
            })->activeEntries()->withLocalize()->paginate(20);
        }

        return view('frontend.news', compact('news'));
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

    public function mostCommonTags()
    {
        return Tag::select('name', \DB::raw('COUNT(*) as count'))
            ->where('language', getLangauge())
            ->groupBy('name')
            ->orderByDesc('count')
            ->take(15)
            ->get();
    }

    public function handleComment(Request $request)
    {

        $request->validate([
            'comment' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->comment;
        $comment->save();
        toast(__('Comment added successfully!'), 'success');
        return redirect()->back();
    }

    public function handleReplay(Request $request)
    {

        $request->validate([
            'replay' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->replay;
        $comment->save();
        toast(__('Comment added successfully!'), 'success');

        return redirect()->back();
    }

    public function commentDestory(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        if(Auth::user()->id === $comment->user_id){
            $comment->delete();
            return response(['status' => 'success', 'message' => __('Deleted Successfully!')]);
        }

        return response(['status' => 'error', 'message' => __('Someting went wrong!')]);
    }
}
