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
                <form action="{{ route('admin.social-link.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="">{{__('Role Name')}}</label>
                        <input type="text" class="form-control" name="role">
                    </div>

                    <hr>

                    <div class="form-group">
                        <h6>Category Permissions</h6>


                        <div class="row">
                            <div class="col-md-2">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Category Index</span>
                                  </label>
                            </div>
                            <div class="col-md-2">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Category Create</span>
                                  </label>
                            </div>
                            <div class="col-md-2">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Category Update</span>
                                  </label>
                            </div>
                            <div class="col-md-2">
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                    <span class="custom-switch-description">Category Delete</span>
                                  </label>
                            </div>
                        </div>



                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
