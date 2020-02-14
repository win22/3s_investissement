<!DOCTYPE HTML>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Real Spaces - Responsive Real Estate Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <!-- Mobile Specific Metas
      ================================================== -->
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <!-- CSS
      ================================================== -->
    <link href="{{ asset('site/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('site/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('site/plugins/prettyphoto/css/prettyPhoto.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('site/plugins/owl-carousel/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('site/plugins/owl-carousel/css/owl.theme.css') }}" rel="stylesheet" type="text/css">
    <!--[if lte IE 9]>
    <link rel="stylesheet" type="text/css" href="{{ asset('site/css/ie.css') }}" media="screen"/><![endif]-->
    <!-- Color Style -->
    <link href="{{ asset('site/colors/color1.css') }}" rel="stylesheet" type="text/css">
    <!-- SCRIPTS
      ================================================== -->
    <script src="{{ asset('site/js/modernizr.js') }}"></script><!-- Modernizr -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body class="home">
<!--[if lt IE 7]>
<p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser
    today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
    experience this site.</p>
<![endif]-->
<div class="body">
    <!-- Start Site Header -->
    <header class="site-header">
        <div class="middle-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-8 col-xs-8">
                        <img style="width: 65px;border-radius: 30px"
                             src="{{ URL::to(asset('backend/img/logo2.jpg')) }}">
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-4">
                        <div class="contact-info-blocks hidden-sm hidden-xs">
                            <div>
                                <i style="color: antiquewhite" class="fa fa-phone"></i> Free Line For You
                                <span>080 378678 90</span>
                            </div>
                            <div>
                                <i style="color: antiquewhite" class="fa fa-envelope"></i> Email Us
                                <span>sales@realspaces.com</span>
                            </div>
                        </div>
                        <a href="#" style="color: white !important;" class="visible-sm visible-xs menu-toggle"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
            <div class="main-menu-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <nav class="navigation">
                                <ul class="sf-menu">
                                    <li class="active2"><a href="/">Acceuil</a></li>
                                    <li><a href="javascript:;">Propriétés</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('all_appar') }}">Appartements</a></li>
                                            <li><a href="agent-detail.html">Villa</a></li>
                                            <li><a href="my-properties.html">Bureau</a></li>
                                            <li><a href="submit.html">Immeuble</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Louer</a>
                                        <ul class="dropdown">
                                            <li><a href="agents.html">Appartements</a></li>
                                            <li><a href="agent-detail.html">Villa</a></li>
                                            <li><a href="my-properties.html">Bureau</a></li>
                                            <li><a href="submit.html">Immeuble</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Vendre</a>
                                        <ul class="dropdown">
                                            <li><a href="agents.html">Appartements</a></li>
                                            <li><a href="agent-detail.html">Villa</a></li>
                                            <li><a href="my-properties.html">Bureau</a></li>
                                            <li><a href="submit.html">Immeuble</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Promo</a>
                                        <ul class="dropdown">
                                            <li><a href="agents.html">Appartements</a></li>
                                            <li><a href="agent-detail.html">Villa</a></li>
                                            <li><a href="my-properties.html">Bureau</a></li>
                                            <li><a href="submit.html">Immeuble</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">A propos</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    </header>
    <!-- End Site Header -->
    <!-- Site Showcase -->
    @include('site.slider')
    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- Start Site Footer -->
    @include('site.footer')
</div>
<script src="{{ asset('site/js/jquery-2.0.0.min.js') }}"></script> <!-- Jquery Library Call -->
<script src="{{ asset('site/plugins/prettyphoto/js/prettyphoto.js') }}"></script> <!-- PrettyPhoto Plugin -->
<script src="{{ asset('site/plugins/owl-carousel/js/owl.carousel.min.js') }}"></script> <!-- Owl Carousel -->
<script src="{{ asset('site/plugins/flexslider/js/jquery.flexslider.js') }}"></script> <!-- FlexSlider -->
<script src="{{ asset('site/js/helper-plugins.js') }}"></script> <!-- Plugins -->
<script src="{{ asset('site/js/bootstrap.js') }}"></script> <!-- UI -->
<script src="{{ asset('site/js/waypoints.js') }}"></script> <!-- Waypoints -->
<script src="{{ asset('site/js/init.js') }}"></script> <!-- All Scripts -->
<!--[if lte IE 9]>
<script src="{{ asset('site/js/script_ie.js') }}"></script><![endif]-->


<script>
    $(document).ready(function () {

        $('.dynamic2').change(function () {

            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();

                if (value == 1) {
                    $(".forma").hide().slideDown("slow");
                };
                if (value ==2) {
                    $(".forma").hide().slideUp("slow");

                };
            }
        });
    });
</script>
</body>
</html>