<!doctype html>

<html lang="en" class="layout-wide customizer-hide" dir="ltr" data-skin="default" data-template="horizontal-menu-template" data-bs-theme="light">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>{{ config('app.name') }}</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('images/'.config('app.favicon'))}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="stylesheet" href="{{asset('assets/vendor/fonts/iconify-icons.css')}}" />

    <!-- Core CSS -->
    <!-- build:css assets/vendor/css/theme.css  -->

    <link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/pickr/pickr-themes.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/vendor/css/core.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- endbuild -->

    <!-- Vendor -->
    <link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}" />

    <!-- Helpers -->
    <script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
    
    <script src="{{asset('assets/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-6">
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center mb-6">
                <a href="{{url('/')}}" class="app-brand-link">
                  <span class="app-brand-logo demo">
                    <span class="text-primary">
                      <img src="{{asset('images/'.config('app.logo'))}}" width="60">
                    </span>
                  </span>
                  <span class="app-brand-text demo fw-bold text-primary">{{ config('app.name') }}</span>
                </a>
              </div>
              @yield('content')
              <div class="divider my-6">
                <div class="divider-text">or</div>
              </div>

              <div class="d-flex justify-content-center">
                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-facebook me-1_5">
                  <i class="icon-base ti tabler-brand-facebook-filled icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-twitter me-1_5">
                  <i class="icon-base ti tabler-brand-twitter-filled icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-github me-1_5">
                  <i class="icon-base ti tabler-brand-github-filled icon-20px"></i>
                </a>

                <a href="javascript:;" class="btn btn-icon rounded-circle btn-text-google-plus">
                  <i class="icon-base ti tabler-brand-google-filled icon-20px"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/theme.js -->

    <script src="{{asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@algolia/autocomplete-js.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/pickr/pickr.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<!--     <script src="{{asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{asset('assets/vendor/js/menu.js')}}"></script> -->
    <!-- endbuild -->

    <!-- Vendors JS -->
<!--     <script src="{{asset('assets/vendor/libs/@form-validation/popular.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/bootstrap5.js')}}"></script>
    <script src="{{asset('assets/vendor/libs/@form-validation/auto-focus.js')}}"></script> -->
    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!-- Page JS -->
    <script src="{{asset('assets/js/pages-auth.js')}}"></script>
  </body>
</html>