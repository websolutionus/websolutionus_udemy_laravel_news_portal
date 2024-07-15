@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Language') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Edit Language') }}</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.language.update', $language->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('admin.Language') }}</label>
                        <select name="lang" id="language-select" class="form-control select2">
                            <option value="">--{{ __('admin.Select') }}--</option>
                            @foreach (config('language') as $key => $lang)
                                <option
                                @if ($language->lang === $key)
                                    selected
                                @endif
                                value="{{ $key }}">{{ $lang['name'] }}</option>
                            @endforeach
                        </select>
                        @error('lang')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Name') }}</label>
                        <input readonly name="name" value="{{ $language->name }}" type="text" class="form-control" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Slug') }}</label>
                        <input readonly name="slug" value="{{ $language->slug }}" type="text" class="form-control" id="slug">
                        @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Is it default?') }} </label>
                        <select name="default" id="" class="form-control">
                            <option {{ $language->default === 0 ? 'selected' : '' }} value="0">{{ __('admin.No') }}</option>
                            <option {{ $language->default === 1 ? 'selected' : '' }} value="1">{{ __('admin.Yes') }}</option>
                        </select>
                        @error('defalut')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option {{ $language->status === 1 ? 'selected' : '' }} value="1">{{ __('admin.Active') }}</option>
                            <option {{ $language->status === 0 ? 'selected' : '' }} value="0">{{ __('admin.Inactive') }}</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#language-select').on('change', function() {
                let value = $(this).val();
                let name = $(this).children(':selected').text();
                $('#slug').val(value);
                $('#name').val(name);

            })
        })
    </script>
@endpush
