<div class="card border border-primary">
    <div class="card-body">
        <form action="{{ route('admin.seo-setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="">{{ __('Site Seo Title') }}</label>
                <input type="text" name="site_seo_title" class="form-control" value="">
            </div>
            <div class="form-group">

                <label for="">{{ __('Site Seo Description') }}</label>
                <textarea name="site_seo_description" class="form-control" style="height: 300px" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">

                <label for="">{{ __('Site Seo Keywords') }}</label>
                <input name="site_seo_keywords" type="text" class="form-control inputtags">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        </form>
    </div>
</div>
