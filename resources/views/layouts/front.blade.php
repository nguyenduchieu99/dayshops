<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" />

    {{-- Owl Carousel --}}
    <link href="{{ asset('frontend/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/css/owl.theme.default.min.css') }}" rel="stylesheet" />

    {{-- Google awesome --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    
    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <style>
        a{
            text-decoration: none !important;
            /* color: #000 !important; */
        }
    </style>

</head>
<body>
    @include('layouts.inc.frontnavbar')
        <div class="content">
           @yield('content')
        </div>
    {{-- Script --}}
     <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
     <script src="{{ asset('frontend/js/custom.js') }}" defer></script>
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script type="text/javascript">
       $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            // dots:false;
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        })
    </script>

     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     @if (session('status'))
        <script>
            swal("{{session('status')}}");
        </script> 
     @endif
     @yield('scripts')
</body>
</html>
