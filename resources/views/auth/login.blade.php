
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Login</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('frontend/light/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('frontend/light/css/feather.css')}}">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{asset('frontend/light/css/daterangepicker.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('frontend/light/css/app-light.css')}}" id="lightTheme">
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="light ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action="{{route('login.post')}}" method="POST">
            {{csrf_field()}}
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            {{-- <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
              <g>
                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
              </g>
            </svg> --}}
          </a>
          <h1 class="h5 mb-4">SILAHKAN LOGIN </h1>
          <h1 class="h5 mb-4">ABSENSI MTSN GANTING DAMAI</h1>
          <div class="form-group">
            <label for="email" class="sr-only">Email address</label>
            <input type="email" id="email" class="form-control form-control-lg" name="email" placeholder="Email address" autofocus="">
          </div>
          <div class="form-group">
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" class="form-control form-control-lg" placeholder="Password" name="password">
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Stay logged in </label>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
          <p class="mt-5 mb-3 text-muted">© {{date('Y', time())}}</p>
        </form>
      </div>
    </div>
    <script src="{{asset('frontend/light/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/light/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/light/js/moment.min.js')}}"></script>
    <script src="{{asset('frontend/light/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/light/js/simplebar.min.js')}}"></script>
    <script src='{{asset('frontend/light/js/daterangepicker.js')}}'></script>
    <script src='{{asset('frontend/light/js/jquery.stickOnScroll.js')}}'></script>
    <script src="{{asset('frontend/light/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('frontend/light/js/config.js')}}"></script>
    <script src="{{asset('frontend/light/js/apps.js')}}"></script>
  </body>
</html>
</body>
</html>