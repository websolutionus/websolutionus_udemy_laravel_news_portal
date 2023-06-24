<section class="pt-0 mt-5">
    <div class="popular__section-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="wrapper__list__article">
                        <h4 class="border_section">{{ __('frontend.recent post') }}</h4>
                    </div>
                    <div class="row ">
                        @foreach ($recentNews as $news)
                        @if ($loop->index <= 1)
                        <div class="col-sm-12 col-md-6 mb-4">
                            <!-- Post Article -->
                            <div class="card__post ">
                                <div class="card__post__body card__post__transition">
                                    <a href="{{ route('news-details', $news->slug) }}">
                                        <img src="{{ asset($news->image) }}" class="img-fluid" alt="">
                                    </a>
                                    <div class="card__post__content bg__post-cover">
                                        <div class="card__post__category">
                                            {{ $news->category->name }}
                                        </div>
                                        <div class="card__post__title">
                                            <h5>
                                                <a href="{{ route('news-details', $news->slug) }}">
                                                    {!! truncate($news->title) !!}
                                                </a>
                                            </h5>
                                        </div>
                                        <div class="card__post__author-info">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="blog_details.html">
                                                        {{ __('frontend.by') }} {{ $news->auther->name }}
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span>

                                                        {{ date('M d, Y', strtotime($news->create_at)) }}
                                                    </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                    <div class="row ">
                        <div class="col-sm-12 col-md-6">
                            <div class="wrapp__list__article-responsive">
                                @foreach ($recentNews as $news)
                                @if ($loop->index > 1 && $loop->index <= 3)
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
                                                                {{ __('frontend.by') }} {{ $news->auther->name }}
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
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="wrapp__list__article-responsive">
                                @foreach ($recentNews as $news)
                                @if ($loop->index > 3 && $loop->index <= 5)
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
                                                                {{ __('frontend.by') }} {{ $news->auther->name }}
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
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-lg-4">
                    <aside class="wrapper__list__article">
                        <h4 class="border_section">{{ __('frontend.popular post') }}</h4>
                        <div class="wrapper__list-number">

                            <!-- List Article -->
                            @foreach ($popularNews  as $popularNews)
                                <div class="card__post__list">
                                    <div class="list-number">
                                        <span>
                                            {{ ++$loop->index }}
                                        </span>
                                    </div>
                                    <a href="#" class="category">
                                        {{ $popularNews->category->name }}
                                    </a>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h5>
                                                <a href="{{ route('news-details', $popularNews->slug) }}">
                                                    {!! truncate($popularNews->title) !!}

                                                </a>
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <!-- Post news carousel -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <aside class="wrapper__list__article">
                    <h4 class="border_section">{{ @$categorySectionOne->first()->category->name }}</h4>
                </aside>
            </div>
            <div class="col-md-12">

                <div class="article__entry-carousel">
                    @foreach ($categorySectionOne as $sectionOneNews)
                    <div class="item">
                        <!-- Post Article -->
                        <div class="article__entry">
                            <div class="article__image">
                                <a href="{{ route('news-details', $sectionOneNews->slug) }}">
                                    <img src="{{ asset($sectionOneNews->image) }}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="article__content">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <span class="text-primary">
                                            {{ __('frontend.by') }} {{ $sectionOneNews->auther->name }}
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>
                                            {{ date('M d, Y', strtotime($sectionOneNews->created_at)) }}
                                        </span>
                                    </li>

                                </ul>
                                <h5>
                                    <a href="{{ route('news-details', $sectionOneNews->slug) }}">
                                        {!! truncate($sectionOneNews->title, 40) !!}
                                    </a>
                                </h5>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    <!-- End Popular news category -->

    <!-- Post news carousel -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <aside class="wrapper__list__article">
                    <h4 class="border_section">{{ @$categorySectionTwo->first()->category->name }}</h4>
                </aside>
            </div>
            <div class="col-md-12">

                <div class="article__entry-carousel">
                    @foreach ($categorySectionTwo as $sectionTwoNews)
                    <div class="item">
                        <!-- Post Article -->
                        <div class="article__entry">
                            <div class="article__image">
                                <a href="{{ route('news-details', $sectionTwoNews->slug) }}">
                                    <img src="{{ asset($sectionTwoNews->image) }}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="article__content">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <span class="text-primary">
                                            {{ __('frontend.by') }} {{ $sectionTwoNews->auther->name }}
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>
                                            {{ date('M d, Y', strtotime($sectionTwoNews->created_at)) }}
                                        </span>
                                    </li>

                                </ul>
                                <h5>
                                    <a href="{{ route('news-details', $sectionTwoNews->slug) }}">
                                        {!! truncate($sectionTwoNews->title, 40) !!}
                                    </a>
                                </h5>

                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    <!-- End Popular news category -->


    <!-- Popular news category -->
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <aside class="wrapper__list__article mb-0">
                        <h4 class="border_section">{{ @$categorySectionThree->first()->category->name }}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ($categorySectionThree as $sectionThreeNews)
                                @if($loop->index <= 2)
                                <div class="mb-4">
                                    <!-- Post Article -->
                                    <div class="article__entry">
                                        <div class="article__image">
                                            <a href="{{ route('news-details', $sectionThreeNews->slug) }}">
                                                <img src="{{ asset($sectionThreeNews->image) }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="article__content">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <span class="text-primary">
                                                        {{ __('frontend.by') }} {{ $sectionThreeNews->auther->name }}
                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span>

                                                        {{ date('M d, Y', strtotime($sectionThreeNews->created_at)) }}
                                                    </span>
                                                </li>

                                            </ul>
                                            <h5>
                                                <a href="{{ route('news-details', $sectionThreeNews->slug) }}">
                                                    {!! truncate($sectionThreeNews->title) !!}
                                                </a>
                                            </h5>

                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach

                            </div>
                            <div class="col-md-6">
                                @foreach ($categorySectionThree as $sectionThreeNews)
                                @if($loop->index > 2 && $loop->index <= 5)
                                <div class="mb-4">
                                    <!-- Post Article -->
                                    <div class="article__entry">
                                        <div class="article__image">
                                            <a href="{{ route('news-details', $sectionThreeNews->slug) }}">
                                                <img src="{{ asset($sectionThreeNews->image) }}" alt="" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="article__content">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <span class="text-primary">
                                                        {{ __('frontend.by') }} {{ $sectionThreeNews->auther->name }}
                                                    </span>
                                                </li>
                                                <li class="list-inline-item">
                                                    <span>

                                                        {{ date('M d, Y', strtotime($sectionThreeNews->created_at)) }}
                                                    </span>
                                                </li>

                                            </ul>
                                            <h5>
                                                <a href="{{ route('news-details', $sectionThreeNews->slug) }}">
                                                    {!! truncate($sectionThreeNews->title) !!}
                                                </a>
                                            </h5>

                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </aside>

                    @if ($ad->home_middle_ad_status == 1)

                    <div class="small_add_banner">
                        <div class="small_add_banner_img">
                           <a href="{{ $ad->home_middle_ad_url }}">
                            <img src="{{ asset($ad->home_middle_ad) }}" alt="adds">
                           </a>
                        </div>
                    </div>
                    @endif

                    <aside class="wrapper__list__article mt-5">
                        <h4 class="border_section">{{ @$categorySectionFour->first()->category->name }}</h4>

                        <div class="wrapp__list__article-responsive">
                            @foreach ($categorySectionFour as $sectionFourNews)

                            <!-- Post Article List -->
                            <div class="card__post card__post-list card__post__transition mt-30">
                                <div class="row ">
                                    <div class="col-md-5">
                                        <div class="card__post__transition">
                                            <a href="{{ route('news-details', $sectionFourNews->slug) }}">
                                                <img src="{{ asset($sectionFourNews->image) }}" class="img-fluid w-100" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 my-auto pl-0">
                                        <div class="card__post__body ">
                                            <div class="card__post__content  ">
                                                <div class="card__post__category ">
                                                    {{ $sectionFourNews->category->name }}
                                                </div>
                                                <div class="card__post__author-info mb-2">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <span class="text-primary">
                                                                {{ __('frontend.by') }} {{ $sectionFourNews->auther->name }}
                                                            </span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <span class="text-dark text-capitalize">

                                                                {{ date('M d, Y', strtotime($sectionFourNews->created_at)) }}
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="card__post__title">
                                                    <h5>
                                                        <a href="{{ route('news-details', $sectionFourNews->slug) }}">
                                                            {!! truncate($sectionFourNews->title) !!}
                                                        </a>
                                                    </h5>
                                                    <p class="d-none d-lg-block d-xl-block mb-0">
                                                        {!! truncate($sectionFourNews->content, 100) !!}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @endforeach

                        </div>
                    </aside>
                </div>

                <div class="col-md-4">
                    <div class="sticky-top">
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.Most Viewed') }}</h4>
                            <div class="wrapper__list__article-small">

                                @foreach ($mostViewedPosts as $mostViewedNews)

                                <!-- Post Article -->
                                @if ($loop->index === 0)
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="{{ route('news-details', $mostViewedNews->slug) }}">
                                            <img src="{{ asset($mostViewedNews->image) }}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <div class="article__category">
                                            {{ $mostViewedNews->category->name }}
                                        </div>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span class="text-primary">
                                                    {{ __('frontend.by') }} {{ $mostViewedNews->auther->name }}
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span class="text-dark text-capitalize">
                                                    {{ date('M d, Y', strtotime($mostViewedNews->created_at)) }}
                                                </span>
                                            </li>

                                        </ul>
                                        <h5>
                                            <a href="{{ route('news-details', $mostViewedNews->slug) }}">
                                                {{ truncate($mostViewedNews->title) }}
                                            </a>
                                        </h5>
                                        <p>
                                            {!! truncate($mostViewedNews->content,100) !!}
                                        </p>
                                        <a href="{{ route('news-details', $mostViewedNews->slug) }}" class="btn btn-outline-primary mb-4 text-capitalize"> {{__('frontend.read more')}}</a>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @foreach ($mostViewedPosts as $mostViewedNews)
                                @if ($loop->index > 0)
                                    <div class="mb-3">
                                        <!-- Post Article -->
                                        <div class="card__post card__post-list">
                                            <div class="image-sm">
                                                <a href="{{ route('news-details', $mostViewedNews->slug) }}">
                                                    <img src="{{ asset($mostViewedNews->image) }}" class="img-fluid" alt="">
                                                </a>
                                            </div>

                                            <div class="card__post__body ">
                                                <div class="card__post__content">
                                                    <div class="card__post__author-info mb-2">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                    {{ __('frontend.by') }} {{ $mostViewedNews->auther->name }}
                                                                </span>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <span class="text-dark text-capitalize">
                                                                    {{ date('M d, Y', strtotime($mostViewedNews->created_at)) }}
                                                                </span>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                    <div class="card__post__title">
                                                        <h6>
                                                            <a href="{{ route('news-details', $mostViewedNews->slug) }}">
                                                                {!! truncate($mostViewedNews->title) !!}
                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @endforeach

                            </div>
                        </aside>

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.stay conected') }}</h4>
                            <!-- widget Social media -->
                            <div class="wrap__social__media">
                                @foreach ($socialCounts as $socialCount)
                                <a href="{{ $socialCount->url }}" target="_blank">
                                    <div class="social__media__widget mt-2" style="background-color:{{ $socialCount->color }}">
                                        <span class="social__media__widget-icon">
                                            <i class="{{ $socialCount->icon }}"></i>
                                        </span>
                                        <span class="social__media__widget-counter">
                                            {{ $socialCount->fan_count }} {{ $socialCount->fan_type }}
                                        </span>
                                        <span class="social__media__widget-name">
                                            {{ $socialCount->button_text }}
                                        </span>
                                    </div>
                                </a>
                                @endforeach

                            </div>
                        </aside>

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.tags') }}</h4>
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

                        @if ($ad->side_bar_ad_status == 1)
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.Advertise') }}</h4>
                            <a href="{{ $ad->side_bar_ad_url }}">
                                <figure>
                                    <img src="{{ asset($ad->side_bar_ad) }}" alt="" class="img-fluid">
                                </figure>
                            </a>
                        </aside>
                        @endif

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.newsletter') }}</h4>
                            <!-- Form Subscribe -->
                            <div class="widget__form-subscribe bg__card-shadow">
                                <h6>
                                    {{ __('frontend.The most important world news and events of the day') }}.
                                </h6>
                                <p><small>{{ __('frontend.Get magzrenvi daily newsletter on your inbox') }}.</small></p>
                                <form action="" class="newsletter-form">
                                    <div class="input-group ">
                                        <input type="text" class="form-control" name="email" placeholder="Your email address">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary newsletter-button" type="submit">{{ __('frontend.sign up') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>


                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>

