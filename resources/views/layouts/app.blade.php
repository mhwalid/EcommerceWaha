<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pharma &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  @yield('extra-meta')
  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('assets/fonts/icomoon/style.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/owl.themedefault.min.css')}}">

  @yield('extra-js')
  <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>
<style>
 
</style>

<body>

  <div class="site-wrap">

    
    @include('includes.navbar')
    @include('includes.errors')
    @yield('content')
    @include('includes.footer')
  </div>

  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/js/aos.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  @yield('js-extra-stripe')
</body>

</html>