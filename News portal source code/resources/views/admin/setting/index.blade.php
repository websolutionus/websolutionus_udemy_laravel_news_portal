@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Settings') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Setting') }}</h4>

            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2">
                      <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab" aria-controls="home" aria-selected="true">{{ __('admin.General Settings') }}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab" aria-controls="profile" aria-selected="false">{{ __('admin.SEO Settings') }}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">{{ __('admin.Appearance Settings') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact5" role="tab" aria-controls="contact" aria-selected="false">{{ __('admin.Microsoft Api Settings') }}</a>
                          </li>
                      </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                      <div class="tab-content no-padding" id="myTab2Content">
                        <div class="tab-pane fade show active" id="home4" role="tabpanel" aria-labelledby="home-tab4">
                            @include('admin.setting.cards.general-setting')
                        </div>
                        <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                            @include('admin.setting.cards.seo-setting')
                        </div>
                        <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                            @include('admin.setting.cards.appearance-setting')
                        </div>
                        <div class="tab-pane fade" id="contact5" role="tabpanel" aria-labelledby="contact-tab4">
                            @include('admin.setting.cards.microsoft-api-setting')
                        </div>
                      </div>
                    </div>
                  </div>
            </div>


        </div>
    </section>
@endsection


