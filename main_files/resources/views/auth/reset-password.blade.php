{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('frontend.Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('frontend.Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('frontend.Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('frontend.Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('frontend.layouts.master')

@section('content')
    <!-- login -->
    <section class="wrap__section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mx-auto" style="max-width: 380px;">
                        <div class="card-body">
                            <h4 class="card-title mb-4">{{ __('frontend.Reset Password') }}</h4>
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf

                                        <!-- Password Reset Token -->
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ __('frontend.Email') }}" type="text" name="email" value="{{ old('email', $request->email) }}">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ __('frontend.Password') }}" type="password" name="password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{ __('frontend.Password') }}" type="password" name="password_confirmation">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> {{ __('frontend.Reset Password') }} </button>
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
