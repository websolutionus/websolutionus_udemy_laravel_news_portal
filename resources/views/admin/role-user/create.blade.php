@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Role And Permissions') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create Role') }}</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.role.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">{{__('User Name')}}</label>
                        <input type="text" class="form-control" name="name">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{__('Passowrd')}}</label>
                        <input type="password" class="form-control" name="passowrd">
                        @error('passowrd')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{__(' Confirm Password')}}</label>
                        <input type="password" class="form-control" name="password_confirmation">
                        @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{__(' Confirm Password')}}</label>

                        <select name="role" id="" class="select2 form-control">
                            <option value="">{{ __('--Select--') }}</option>

                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>

                        @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>



                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
