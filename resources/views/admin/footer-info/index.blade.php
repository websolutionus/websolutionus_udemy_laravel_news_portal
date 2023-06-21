@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Footer Info') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Footer Info') }}</h4>

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

                            $footerInfo = \App\Models\FooterInfo::where('language', $language->lang)->first();

                        @endphp
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                            id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="card-body">
                                <form action="{{ route('admin.footer-info.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <img src="{{ asset(@$footerInfo->logo) }}" width="100px" alt=""><br>
                                        <label for="">{{ __('admin.Logo') }}</label>
                                        <input type="file" name="logo" class="form-control">
                                        <input type="hidden" name="language" value="{{ $language->lang }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.Short Description') }}</label>
                                        <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ @$footerInfo->description }}</textarea>

                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.Copyright text') }}</label>
                                        <input type="text" name="copyright" class="form-control" value="{{ @$footerInfo->copyright }}">

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
</script>
@endpush
