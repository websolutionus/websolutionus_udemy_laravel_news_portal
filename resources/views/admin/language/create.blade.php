@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Language</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Language</h4>

            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Language</label>
                        <select name="" id="" class="form-control">
                            <option value="">--Select--</option>
                            <option value=""></option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input readonly type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Is it default? </label>
                        <select name="" id="" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
