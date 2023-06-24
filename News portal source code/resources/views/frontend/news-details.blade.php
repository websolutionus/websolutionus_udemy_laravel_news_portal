@extends('frontend.layouts.master')

<!-- Setting metas -->
@section('title', $news->title)
@section('meta_description', $news->meta_description)
@section('meta_og_title', $news->meta_title)
@section('meta_og_description', $news->meta_description)
@section('meta_og_image', asset($news->image))
@section('meta_tw_title', $news->meta_title)
@section('meta_tw_description', $news->meta_description)
@section('meta_tw_image', asset($news->image))
<!-- End Setting metas -->
@section('content')
<section class="pb-80">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- breaddcrumb -->
                <!-- Breadcrumb -->
                <ul class="breadcrumbs bg-light mb-4">
                    <li class="breadcrumbs__item">
                        <a href="{{ url('/') }}" class="breadcrumbs__url">
                            <i class="fa fa-home"></i> {{ __('frontend.Home') }}</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <a href="javascript:;" class="breadcrumbs__url">{{ __('frontend.News') }}</a>
                    </li>
                </ul>
                <!-- end breadcrumb -->
            </div>
            <div class="col-md-8">
                <!-- content article detail -->
                <!-- Article Detail -->
                <div class="wrap__article-detail">
                    <div class="wrap__article-detail-title">
                        <h1>
                            {!! $news->title !!}
                        </h1>

                    </div>
                    <hr>
                    <div class="wrap__article-detail-info">
                        <ul class="list-inline d-flex flex-wrap justify-content-start">
                            <li class="list-inline-item">
                                {{ __('frontend.By') }}
                                <a href="#">
                                    {{ $news->auther->name }}
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <span class="text-dark text-capitalize ml-1">

                                    {{ date('M D, Y', strtotime($news->created_at)) }}
                                </span>
                            </li>
                            <li class="list-inline-item">
                                <span class="text-dark text-capitalize">
                                    {{ __('frontend.in') }}
                                </span>
                                <a href="#">
                                    {{ $news->category->name }}
                                </a>


                            </li>
                        </ul>
                    </div>

                    <div class="wrap__article-detail-image mt-4">
                        <figure>
                            <img src="{{ asset($news->image) }}" alt="" class="img-fluid">
                        </figure>
                    </div>
                    <div class="wrap__article-detail-content">
                        <div class="total-views">
                            <div class="total-views-read">
                                {{ convertToKFormat($news->views) }}
                                <span>
                                    {{ __('frontend.views') }}
                                </span>
                            </div>

                            <ul class="list-inline">
                                <span class="share">{{ __('frontend.share on:') }}</span>
                                <li class="list-inline-item">
                                    <a class="btn btn-social-o facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank">
                                        <i class="fa fa-facebook-f"></i>
                                        <span>{{ __('frontend.facebook') }}</span>
                                    </a>

                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-social-o twitter" href="https://twitter.com/intent/tweet?text={{ $news->title }}&url={{ url()->current() }}" target="_blank">
                                        <i class="fa fa-twitter"></i>
                                        <span>{{ __('frontend.twitter') }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-social-o whatsapp" href="https://wa.me/?text={{ $news->title }}%20{{ url()->current() }}" target="_blank">
                                        <i class="fa fa-whatsapp"></i>
                                        <span>{{ __('frontend.whatsapp') }}</span>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-social-o telegram" href="https://t.me/share/url?url={{ url()->current() }}&text={{ $news->title }}" target="_blank">
                                        <i class="fa fa-telegram"></i>
                                        <span>{{ __('frontend.telegram') }}</span>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a class="btn btn-linkedin-o linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $news->title }}" target="_blank">
                                        <i class="fa fa-linkedin"></i>
                                        <span>{{ __('frontend.linkedin') }}</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <p class="has-drop-cap-fluid">
                            {!! $news->content !!}
                        </p>
                    </div>


                </div>
                <!-- end content article detail -->

                <!-- tags -->
                <!-- News Tags -->
                <div class="blog-tags">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <i class="fa fa-tags">
                            </i>
                        </li>
                        @foreach ($news->tags as $tag)
                        <li class="list-inline-item">
                            <a href="#">
                                #{{ $tag->name }}
                            </a>
                        </li>
                        @endforeach

                    </ul>
                </div>
                <!-- end tags-->

                <!-- authors-->
                <!-- Profile author -->
                <div class="wrap__profile">
                    <div class="wrap__profile-author">
                        <figure>
                            <img style="width: 200px;height: 200px;object-fit: cover;" src="{{ asset($news->auther->image) }}" alt="" class="img-fluid rounded-circle">
                        </figure>
                        <div class="wrap__profile-author-detail">
                            <div class="author-wrapper">
                                <div class="wrap__profile-author-detail-name">{{ $news->auther->getRoleNames()->first() }}</div>
                            <h4>{{ $news->auther->name }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end author-->

                <!-- Comment  -->
                @auth
                <div id="comments" class="comments-area">
                    <h3 class="comments-title">{{ $news->comments()->count() }} {{ __('frontend.Comments:') }}</h3>

                    <ol class="comment-list">
                        @foreach ($news->comments()->whereNull('parent_id')->get() as $comment)

                        <li class="comment">
                            <aside class="comment-body">
                                <div class="comment-meta">
                                    <div class="comment-author vcard">
                                        <img src="{{ asset('frontend/assets/images/avatar.png') }}" class="avatar" alt="image">
                                        <b class="fn">{{ $comment->user->name }}</b>
                                        <span class="says">{{ __('frontend.says') }}:</span>
                                    </div>

                                    <div class="comment-metadata">
                                        <a href="javascript:;">
                                            <span>{{ date('M, d, Y H:i', strtotime($comment->created_at)) }}</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="comment-content">
                                    <p>
                                        {{ $comment->comment }}
                                    </p>
                                </div>

                                <div class="reply">
                                    <a href="#" class="comment-reply-link" data-toggle="modal"
                                        data-target="#exampleModal-{{ $comment->id }}">{{ __('frontend.Reply') }}</a>
                                    <span class="delete-msg" data-id="{{ $comment->id }}">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                </div>
                            </aside>

                            @if ($comment->reply()->count() > 0)
                            @foreach ($comment->reply as $reply)

                            <ol class="children">
                                <li class="comment">
                                    <aside class="comment-body">
                                        <div class="comment-meta">
                                            <div class="comment-author vcard">
                                                <img src="{{ asset('frontend/assets/images/avatar.png') }}" class="avatar" alt="image">
                                                <b class="fn">{{ $reply->user->name }}</b>
                                                <span class="says">{{ __('frontend.says:') }}</span>
                                            </div>

                                            <div class="comment-metadata">
                                                <a href="javascript:;">
                                                    <span>{{ date('M, d, Y H:i', strtotime($reply->created_at)) }}</span>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="comment-content">
                                            <p>{{ $reply->comment }}</p>
                                        </div>

                                        <div class="reply">
                                            @if ($loop->last)
                                            <a href="#" class="comment-reply-link" data-toggle="modal"
                                                data-target="#exampleModal-{{ $comment->id }}">{{ __('frontend.Reply') }}</a>
                                            @endif

                                            <span class="delete-msg" style="margin-left: auto;" data-id="{{ $reply->id }}">
                                                <i class="fa fa-trash"></i>
                                            </span>
                                        </div>
                                    </aside>
                                </li>
                            </ol>
                            @endforeach
                            @endif

                        </li>

                        <!-- Modal -->
                        <div class="comment_modal">
                            <div class="modal fade" id="exampleModal-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">{{ __('frontend.Write Your Comment') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('news-comment-replay') }}" method="POST">
                                                @csrf
                                                <textarea name="replay" cols="30" rows="7" placeholder="Type. . ."></textarea>
                                                <input type="hidden" name="news_id" value="{{ $news->id }}">
                                                <input type="hidden" name="parent_id" value="{{ $comment->id }}">

                                                <button type="submit">{{ __('frontend.submit') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach

                    </ol>

                    <div class="comment-respond">
                        <h3 class="comment-reply-title">{{ __('frontend.Leave a Reply') }}</h3>

                        <form action="{{ route('news-comment') }}" method="POST" class="comment-form">
                            @csrf
                            <p class="comment-notes">

                            </p>
                            <p class="comment-form-comment">
                                <label for="comment">{{ __('frontend.Comment') }}</label>
                                <textarea name="comment" id="comment" cols="45" rows="5" maxlength="65525"
                                    required="required"></textarea>
                                <input type="hidden" name="news_id" value="{{ $news->id }}">
                                <input type="hidden" name="parent_id" value="">

                                @error('comment')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </p>

                            <p class="form-submit mb-0">
                                <input type="submit" name="submit" id="submit" class="submit" value="Post Comment">
                            </p>
                        </form>
                    </div>
                </div>
                @else
                <div class="card my-5">
                    <div class="card-body">
                        <h5 class="p-0">{{ __('frontend.Please') }} <a href="{{ route('login') }}">{{ __('frontend.Login') }}</a> {{ __('frontend.to comment in the post!') }}</h5>
                    </div>
                </div>
                @endauth



                <!-- end comment -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="single_navigation-prev">
                            @if ($previousPost)
                            <a href="{{ route('news-details', $previousPost->slug) }}">
                                <span>{{ __('frontend.previous post') }}</span>
                                {!! truncate($previousPost->title) !!}
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="single_navigation-next text-left text-md-right">
                            @if ($nextPost)
                            <a href="{{ route('news-details', $nextPost->slug) }}">
                                <span>{{ __('frontend.next post') }}</span>
                                {!! truncate($nextPost->title) !!}
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($ad->view_page_ad_status == 1)
                <div class="small_add_banner mb-5 pb-4">
                    <div class="small_add_banner_img">
                        <a href="{{ $ad->view_page_ad_url }}">
                            <img src="{{ asset($ad->view_page_ad) }}" alt="adds">
                        </a>
                    </div>
                </div>
                @endif


                <div class="clearfix"></div>

                @if (count($relatedPosts) > 0)
                <div class="related-article">
                    <h4>
                        {{ __('frontend.you may also like') }}
                    </h4>
                    <div class="article__entry-carousel-three">
                        @foreach ($relatedPosts as $post)
                        <div class="item">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="{{ route('news-details', $post->slug) }}">
                                        <img src="{{ asset($post->image) }}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                {{ __('frontend.by') }} {{ $post->auther->name }}
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                {{ date('M d, Y', strtotime($post->created_at)) }}
                                            </span>
                                        </li>

                                    </ul>
                                    <h5>
                                        <a href="{{ route('news-details', $post->slug) }}">
                                            {!! truncate($post->title) !!}
                                        </a>
                                    </h5>

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
            <div class="col-md-4">
                <div class="sticky-top">
                    <aside class="wrapper__list__article ">
                        <!-- <h4 class="border_section">Sidebar</h4> -->

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

                            @if ($loop->index === 3)

                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="{{ route('news-details', $news->slug) }}">
                                        <img  src="{{ asset($news->image) }}" alt="" class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <div class="article__category">
                                        {{ $news->category->name }}
                                    </div>
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
                                    <h5>
                                        <a href="{{ route('news-details', $news->slug) }}">
                                            {!! truncate($news->title) !!}
                                        </a>
                                    </h5>
                                    <p>
                                       {!! truncate($news->content, 160) !!}
                                    </p>
                                    <a href="{{ route('news-details', $news->slug) }}" class="btn btn-outline-primary mb-4 text-capitalize"> {{ __('frontend.read more') }}</a>
                                </div>
                            </div>
                            @endif
                            @endforeach


                        </div>
                    </aside>

                    <!-- social media -->
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
                    <!-- End social media -->

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

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('content')
<script>
    $(document).ready(function(){
        $('.delete-msg').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: '{{ __("frontend.Are you sure?") }}',
                    text: "{{ __("frontend.You won'\t be able to revert this!") }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __("frontend.Yes, delete it!") }}'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'DELETE',
                            url: "{{ route('news-comment-destroy') }}",
                            data:{id:id},
                            success: function(data) {
                                if (data.status === 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                } else if (data.status === 'error') {
                                    Swal.fire(
                                        'Error!',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });


                    }
                })
            })

    })
</script>
@endpush
