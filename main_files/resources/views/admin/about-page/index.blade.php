@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.About Page') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.About Page') }}</h4>

            </div>

            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-tab2" data-toggle="tab"
                                href="#home-{{ $language->lang }}" role="tab" aria-controls="home"
                                aria-selected="true">{{ $language->name }}</a>
                        </li>
                    @endforeach

                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                    @foreach ($languages as $language)
                        @php
                            $about = \App\Models\About::where('language', $language->lang)->first();
                        @endphp
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                            id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="card-body">
                                <form action="{{ route('admin.about.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')


                                    <div class="form-group">
                                        <label for="">{{ __('admin.About Content') }}</label>
                                        <textarea name="content" class="summernote-{{ $language->lang }}" id="" cols="30" rows="10">{!! @$about->content !!}</textarea>
                                        <input type="hidden" name="language" value="{{ $language->lang }}">

                                    </div>


                                    <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


        </div>
    </section>
@endsection

@push('scripts')
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Toast.fire({
                    icon: 'error',
                    title: "{{ $error }}"
                });
            @endforeach
        @endif

        if (jQuery().summernote) {
            @foreach ($languages as $language)
            $(".summernote-{{ $language->lang }}").summernote({
                dialogsInBody: true,
                minHeight: 250,
            });
            @endforeach

        }
    </script>
@endpush
