<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>{{ __('admin.Reset Password') }}</h4></div>

              <div class="card-body">
                <form method="POST" action="{{ route('admin.reset-password.send') }}" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group">
                    <label for="email">{{ __('admin.Email') }}</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus value="{{ @request()->email }}">
                    <input id="email" type="hidden" class="form-control" name="token" tabindex="1" required autofocus value="{{ $token }}">
                    @error('email')
                        <code>{{ $message }}</code>
                    @enderror
                    <div class="invalid-feedback">
                      {{ __('admin.Please fill in your email') }}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password">{{ __('admin.Password') }}</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="1" required autofocus>
                    @error('password')
                        <code>{{ $message }}</code>
                    @enderror
                    <div class="invalid-feedback">
                      {{ __('admin.Please fill in your password') }}
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password">{{ __('admin.Confirmation Password') }}</label>
                    <input id="password" type="password" class="form-control" name="password_confirmation" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      {{ __('admin.Please fill in your confirmation password') }}
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      {{ __('admin.Save') }}
                    </button>
                  </div>
                </form>


              </div>
            </div>

            <div class="simple-footer">
              {{ __('admin.Copyright') }} &copy; {{ __('admin.WebSolutionUs 2023') }}
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
</body>
</html>
