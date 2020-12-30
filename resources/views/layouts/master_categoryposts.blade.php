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
           <!--================Blog Categorie Area =================-->
        <section class="blog_categorie_area">
            <div class="container">
                <div class="row">
                    @yield('blog_categorie_area')
                </div>
            </div>
        </section>
        <!--================ End Blog Categorie Area =================-->
        <!--================Blog Area =================-->
        <section class="blog_area">
            <div class="container">
              <div class="row">
                  <div class="col-lg-8 col-md-10 col-sm-12">
                      <div class="blog_left_sidebar">
                          @yield('postlist_area')
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="blog_right_sidebar">
                         @yield('blog_right_sidebar')
                      </div>
                  </div>
              </div>
            </div>
        </section>
        <!--================ End Blog Area- =================-->
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                   
                </div>
            </div>
        </div>
        @section('Scripts')
        <!-- Js Scripts App -->
        <script src="{{  asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{  asset('js/popper.js') }}"></script>
        <script src="{{  asset('js/bootstrap.min.js') }}"></script>
        <script src="{{  asset('js/stellar.js') }}"></script>
        <script src="{{  asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{  asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{  asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{  asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{  asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{  asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{  asset('vendors/popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{  asset('js/mail-script.js') }}"></script>
        <script src="{{  asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{  asset('vendors/counter-up/jquery.counterup.js') }}"></script>
        <script src="{{  asset('js/theme.js') }}"></script>
        @show
    </body>
</html>
