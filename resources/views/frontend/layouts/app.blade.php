<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css" />


    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

    <title>MagDesign</title>
</head>

<body>

    <!-- header-area start -->
    @include('frontend.layouts.header')
    <!-- header-area end -->

    @yield('content')

    <!-- footer start -->
    @include('frontend.layouts.footer')
    <!-- footer end -->


    <!--  Bootstrap Bundle with Popper -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>
    <script src="{{asset('js/script.js')}}"></script>

    <script type="module">
        // import {tns} from './src/tiny-slider.js';
        var slider = tns({
            "container": ".my-slider",
            "items": 2,
            "center": true,
            "loop": false,
            "swipeAngle": false,
            "controls": false,
            // "arrowKeys":true,
            // "controlsPosition": "bottom",
            "nav": true,
            "autoplayButton": true,
            "speed": 400
        });
    </script>

<script>
    $( document ).ready(function() {
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    speed:200,
    autoplay:true,
    // "autoHeight": true,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
  })
});

</script>

</body>

</html>
