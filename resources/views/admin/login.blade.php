<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title> {{env('APP_NAME')}} </title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{URL::asset('asset/css/app.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{URL::asset('asset/css/style.css')}}">
  <link rel="stylesheet" href="{{URL::asset('asset/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{URL::asset('asset/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href="{{URL::asset('asset/img/favicon.ico')}}" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route('admin/doLogin') }}" class="needs-validation" novalidate="">
                @csrf
                @if(Session::get('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{URL::asset('asset/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{URL::asset('asset/bundles/apexcharts/apexcharts.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{URL::asset('asset/js/page/index.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{URL::asset('asset/js/scripts.js')}}"></script>
  <!-- Custom JS File -->
  <script src="{{URL::asset('asset/js/custom.js')}}"></script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>