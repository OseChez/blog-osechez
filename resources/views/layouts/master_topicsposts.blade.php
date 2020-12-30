<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog osechez</title>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/linericon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/lightbox/simpleLightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        @section('topheader')
        @show
        <!--================Latest Blog Area =================-->
        <section class="blog_categorie_area p_120">
        	<div class="container">
        	   @yield('posts_topics_area')
        	</div>
        </section>
        <!--================End Latest Blog Area =================-->
        <!--================ End Blog Area =================-->
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                   
                </div>
            </div>
        </div>
        @section('Scripts')
        <!-- Js Scripts App -->
        <script src="{{  url('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{  url('js/popper.js') }}"></script>
        <script src="{{  url('js/bootstrap.min.js') }}"></script>
        <script src="{{  url('js/stellar.js') }}"></script>
        <script src="{{  url('vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{  url('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{  url('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{  url('vendors/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{  url('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{  url('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{  url('vendors/popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{  url('js/mail-script.js') }}"></script>
        <script src="{{  url('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{  url('vendors/counter-up/jquery.counterup.js') }}"></script>
        <script src="{{  url('js/theme.js') }}"></script>
        @show
    </body>
</html>
