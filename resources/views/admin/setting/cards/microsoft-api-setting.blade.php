<div class="card border border-primary">
    <div class="card-body">
        <form action="{{ route('admin.microsoft-api-setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>{{ __('admin.Microsoft Api Host') }}</label>
                <div class="input-group">
                    <input value="{{ $settings['site_microsoft_api_host'] }}" name="site_microsoft_api_host" type="text" class="form-control">

                    @error('site_microsoft_api_host')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label>{{ __('admin.Microsoft Api Key') }}</label>
                <div class="input-group">
                    <input value="{{ $settings['site_microsoft_api_key'] }}" name="site_microsoft_api_key" type="text" class="form-control">

                    @error('site_microsoft_api_key')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
        </form>
    </div>
</div>


