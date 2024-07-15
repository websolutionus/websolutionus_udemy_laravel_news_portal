@extends('frontend.layouts.master')

@section('content')
    <!-- login -->
    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mx-auto" style="max-width: 380px;">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ __('frontend.Register') }}</h4>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                {{-- <a href="#" class="btn btn-facebook btn-block mb-2 text-white"> <i
                                        class="fa fa-facebook"></i> &nbsp; Sign
                                    in
                                    with
                                    Facebook</a>
                                <a href="#" class="btn btn-primary btn-block mb-4"> <i class="fa fa-google"></i>
                                    &nbsp;
                                    Sign in with
                                    Google</a> --}}
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ __('frontend.Name') }}" type="text"
                                        name="name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ __('frontend.Email') }}" type="email" name="email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ __('frontend.Password') }}" type="password"
                                        name="password">
                                        @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ __('frontend.Confirm Password') }}" type="password"
                                        name="password_confirmation">
                                        @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> {{ __('frontend.Sign up') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end login -->
@endsection
