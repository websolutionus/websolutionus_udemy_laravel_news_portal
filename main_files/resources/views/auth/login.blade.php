@extends('frontend.layouts.master')

@section('content')
    <!-- login -->
    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mx-auto" style="max-width: 380px;">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ __('frontend.Sign in') }}</h4>
                            <form method="POST" action="{{ route('login') }}">
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
                                    <input class="form-control" placeholder="{{ __('frontend.Email') }}" type="text" name="email">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ __('frontend.Password') }}" type="password" name="password">
                                </div>

                                <div class="form-group">
                                    <a href="{{ route('password.request') }}" class="float-right">{{ __('frontend.Forgot password?') }}</a>
                                    <label class="float-left custom-control custom-checkbox">
                                        <input type="checkbox" name="remember"
                                            class="custom-control-input">
                                        <span class="custom-control-label"> {{ __('frontend.Remember') }} </span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> {{ __('frontend.Login') }} </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <p class="text-center mt-4 mb-0">{{ __('frontend.Dont have account?') }} <a href="{{ route('register') }}">{{ __('frontend.Sign up') }}</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- end login -->
@endsection
