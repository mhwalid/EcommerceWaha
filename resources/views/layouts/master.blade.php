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
   <!-- Styles -->
   <script src="{{ asset('js/app.js') }}" defer></script>
 
  <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">

  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  @yield('extra-js')
  @yield('extra-css')

</head>
<style>
  #pagination >nav > ul> li>span , #pagination >nav > ul> li>a{
    padding-top: 0px !important;
   
  }
</style>

<body>
  
  <div id="app" class="site-wrap">


    @include('includes.navbar')
        <div class="container">
          @if (session('success'))
            <div class="alert alert-success"> {{session('success')}}</div>
          @endif
          @if (session('error'))
            <div class="alert alert-danger"> {{session('error')}}</div>
          @endif
          @if (request()->input('q'))
            <div class="alert alert-default" style="background-color: #51eaea"> <strong> {{$products->total()}}  Résultat(s) pour la recherche " {{request()->q}} "  </strong></div>
          @endif
          @if (count($errors)>0)
              <div class="alert alert-default">
                <ul class="mb-0 mt-0">
                  @foreach ($errors->all() as $error)
                      <li> {{$error}}</li>
                  @endforeach

                </ul>
              </div>
          @endif

        </div>
       

    @yield('content')

    @include('includes.footer')
  </div>
  {{-- make a yiled --}}
  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery-ui.js')}}"></script>
  <script src="{{asset('assets/js/popper.min.js')}}"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
  <script src="{{asset('assets/js/aos.js')}}"></script>
  <script src="{{asset('assets/js/main.js')}}"></script>
  @yield('js-extra-stripe')
  <script src="{{ asset('js/app.js') }}" ></script>

</body>

</html>