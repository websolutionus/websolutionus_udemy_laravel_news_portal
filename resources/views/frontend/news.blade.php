@extends('frontend.layouts.master')

@section('content')
<section class="blog_pages">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- Breadcrumb -->
                <ul class="breadcrumbs bg-light mb-4">
                    <li class="breadcrumbs__item">
                        <a href="{{ url('/') }}" class="breadcrumbs__url">
                            <i class="fa fa-home"></i> {{ __('Home') }}</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="javascirt:;" class="breadcrumbs__url">News</a>
                    </li>

                </ul>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="blog_page_search">
                    <form action="{{ route('news') }}" method="GET">
                        <div class="row">
                            <div class="col-lg-5">
                                <input type="text" placeholder="Type here" value="{{ request()->search }}" name="search">
                            </div>
                            <div class="col-lg-4">
                                <select name="category">
                                    <option value="">{{ __('All') }}</option>
                                    @foreach ($categories as $category)
                                    <option {{ $category->slug === request()->category ? 'selected' : '' }} value="{{ $category->slug }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-lg-3">
                                <button type="submit">{{ __('search') }}</button>
                            </div>
                        </div>
                    </form>
                </div>

                <aside class="wrapper__list__article ">
                    @if (request()->has('category'))

                    <h4 class="border_section">{{ __('Category') }}: {{ request()->category }}</h4>
                    @endif

                    <div class="row">
                        @foreach ($news as $post)
                        <div class="col-lg-6">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="{{ route('news-details', $post->slug) }}">
                                        <img src="{{ asset($post->image) }}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <div class="article__category">
                                        {{ $post->category->name }}
                                    </div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                {{ __('by') }} {{ $post->auther->name }}
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="text-dark text-capitalize">
                                                {{ date('M d, Y', strtotime($post->created_at)) }}
                                            </span>
                                        </li>

                                    </ul>
                                    <h5>
                                        <a href="{{ route('news-details', $post->slug) }}">
                                            {!! truncate($post->title) !!}
                                        </a>
                                    </h5>
                                    <p>
                                        {!! truncate($post->content, 100) !!}
                                    </p>
                                    <a href="{{ route('news-details', $post->slug) }}" class="btn btn-outline-primary mb-4 text-capitalize"> {{ __('read more') }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @if (count($news) === 0)
                            <div class="text-center w-100" >
                                <h4 >{{ __('No News Found') }} :(</h4>
                            </div>
                        @endif
                    </div>

                </aside>
                <div class="text-center" style="display: flex;
                justify-content: center;">
                    <!-- Pagination -->
                    {{ $news->appends(request()->query())->links() }}
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar-sticky">
                    <aside class="wrapper__list__article ">
                        <h4 class="border_section">Sidebar</h4>
                        <div class="wrapper__list__article-small">
                            @foreach ($recentNews as $news)
                            @if ($loop->index <= 2)
                            <div class="mb-3">
                                <!-- Post Article -->
                                <div class="card__post card__post-list">
                                    <div class="image-sm">
                                        <a href="{{ route('news-details', $news->slug) }}">
                                            <img src="{{ asset($news->image) }}" class="img-fluid" alt="">
                                        </a>
                                    </div>


                                    <div class="card__post__body ">
                                        <div class="card__post__content">

                                            <div class="card__post__author-info mb-2">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            {{ __('by') }} {{ $news->auther->name }}
                                                        </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span class="text-dark text-capitalize">
                                                            {{ date('M d, Y', strtotime($news->created_at)) }}
                                                        </span>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="card__post__title">
                                                <h6>
                                                    <a href="{{ route('news-details', $news->slug) }}">
                                                        {!! truncate($news->title) !!}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            @foreach ($recentNews as $news)
                            @if ($loop->index > 2)
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="{{ route('news-details', $news->slug) }}">
                                        <img src="{{ asset($news->image) }}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <div class="article__category">
                                        {{ $news->category->name }}
                                    </div>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                {{ __('by') }} {{ $news->auther->name }}
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span class="text-dark text-capitalize">
                                                {{ date('M d, Y', strtotime($news->created_at)) }}
                                            </span>
                                        </li>

                                    </ul>
                                    <h5>
                                        <a href="{{ route('news-details', $news->slug) }}">
                                            {!! truncate($news->title) !!}
                                        </a>
                                    </h5>
                                    <p>
                                        {!! truncate($news->content, 100) !!}
                                    </p>
                                    <a href="{{ route('news-details', $news->slug) }}" class="btn btn-outline-primary mb-4 text-capitalize"> {{ __('read more') }}</a>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </aside>

                    <aside class="wrapper__list__article">
                        <h4 class="border_section">{{ __('tags') }}</h4>
                        <div class="blog-tags p-0">
                            <ul class="list-inline">
                                @foreach ($mostCommonTags as $tag)
                                <li class="list-inline-item">
                                    <a href="{{ route('news', ['tag' => $tag->name]) }}">
                                        #{{ $tag->name }} ({{ $tag->count }})
                                    </a>
                                </li>
                                @endforeach


                            </ul>
                        </div>
                    </aside>

                    <aside class="wrapper__list__article">
                        <h4 class="border_section">{{ __('newsletter') }}</h4>
                        <!-- Form Subscribe -->
                        <div class="widget__form-subscribe bg__card-shadow">
                            <h6>
                                {{ __('The most important world news and events of the day') }}.
                            </h6>
                            <p><small>{{ __('Get magzrenvi daily newsletter on your inbox') }}.</small></p>
                            <div class="input-group ">
                                <input type="text" class="form-control" placeholder="Your email address">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">{{ __('sign up') }}</button>
                                </div>
                            </div>
                        </div>
                    </aside>

                    <aside class="wrapper__list__article">
                        <h4 class="border_section">{{ __('Advertise') }}</h4>
                        <a href="#">
                            <figure>
                                <img src="images/newsimage1.png" alt="" class="img-fluid">
                            </figure>
                        </a>
                    </aside>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>


    </div>
    <div class="large_add_banner mb-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="large_add_banner_img">
                        <img src="images/placeholder_large.jpg" alt="adds">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
