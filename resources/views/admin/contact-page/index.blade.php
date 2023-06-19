@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Contact Page') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Contact Page') }}</h4>

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
                            $contact = \App\Models\Contact::where('language', $language->lang)->first();
                        @endphp
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                            id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="card-body">
                                <form action="{{ route('admin.contact.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Address') }}</label>
                                       <input type="text" class="form-control" name="address" value="{{ @$contact->address }}">
                                       <input type="hidden" class="form-control" name="language" value="{{ $language->lang }}">


                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Phone') }}</label>
                                       <input type="text" class="form-control" name="phone" value="{{ @$contact->phone }}">

                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Email') }}</label>
                                       <input type="text" class="form-control" name="email" value="{{ @$contact->email }}">

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
