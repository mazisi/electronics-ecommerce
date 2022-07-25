<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords" content="MediaCenter, Template, eCommerce">
<meta name="robots" content="all">
<title>Electronics </title>

@livewireStyles
<script src="//unpkg.com/alpinejs" defer></script>
<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

<!-- Customizable CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/blue.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/animate.min.html') }}">
<link rel="stylesheet" href="{{ asset('assets/css/rateit.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">

<!-- Icons/Glyphs -->
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Barlow:200,300,300i,400,400i,500,500i,600,700,800" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

{{-- notification css --}}
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/notifications/notification.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
@include('layouts.header')

<!-- ============================================== HEADER : END ============================================== --> 
<div class="outer-top-ts top-banner">
<div class="container">
<img class="img-responsive" src="{{ asset('assets/images/banners/top-banner.png') }}" alt=""></div>
</div>


@yield('content')
<!-- /#top-banner-and-menu --> 

@livewireScripts

<!-- JavaScripts placed at the end of the document so the pages load faster --> 
<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script> 
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('assets/js/bootstrap-hover-dropdown.min.js') }}"></script> 
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script> 
<script src="{{ asset('assets/js/echo.min.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.easing-1.3.min.js') }}"></script> 
<script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script> 
<script src="{{ asset('assets/js/jquery.rateit.min.js') }}"></script> 
<script src="{{ asset('assets/js/lightbox.min.js') }}"></script> 
<script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script> 
<script src="{{ asset('assets/js/wow.min.js') }}"></script> 
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/countdown.js') }}"></script> 

<!-- notification js added by: Mazisi Msebele-->
<script type="text/javascript" src="{{ asset('assets/js/notifications/bootstrap-growl.min.js') }}"></script>

{{-- <script type="text/javascript" src="{{ asset('assets/js/notifications/notification.js') }}"></script> --}}

<script>
      var dthen1 = new Date("12/25/17 11:59:00 PM");
      start = "08/04/15 03:02:11 AM";
      start_date = Date.parse(start);
      var dnow1 = new Date(start_date);
      if (CountStepper > 0)
      ddiff = new Date((dnow1) - (dthen1));
      else
      ddiff = new Date((dthen1) - (dnow1));
      gsecs1 = Math.floor(ddiff.valueOf() / 1000);
      
      var iid1 = "countbox_1";
      CountBack_slider(gsecs1, "countbox_1", 1);
      
    </script>
</body>

</html>