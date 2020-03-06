<!DOCTYPE HTML>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>3s investissement suarl</title>
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
                        <img style="width: 85px;border-radius: 30px"
                             src="{{ URL::to(asset('backend/img/logo.png')) }}">
                    </div>
                    <div class="col-md-9 col-sm-8 col-xs-4">
                        <div class="contact-info-blocks hidden-sm hidden-xs" style="padding-top: 10px">
                            <div>
                                <i style="color: antiquewhite !important;" class="fa fa-phone"></i>&nbsp; Appelez nous
                                <span>(+221) 33 825 82 92 | 77 390 12 63 | 77 472 39 46</span>

                            </div>
                            <div>
                                <i style="color: white !important; " class="fa fa-envelope"></i>&nbsp;
                                Notre Email
                                <span>s3investissement@gmail.com</span>
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
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_appar') }}">Appartements</a></li>
                                            <li><a style="color: #5e5e5e !important;"href="{{ route('vil_all') }}">Villas</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_bur') }}">Bureaux</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_im') }}">Immeubles</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_terre') }}">Terrains</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_entr') }}">Entrepots</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_mag') }}">Magasins</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_hect') }}">Hectares</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Louer</a>
                                        <ul class="dropdown">
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('app_louer') }}">Appartements</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('vill_louer') }}">Villas</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('bur_louer') }}">Bureaux</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('im_louer') }}">Immeubles</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('terre_louer') }}">Terrain</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('entr_louer') }}">Entrepots</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('mag_louer') }}">Magasin</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('hect_louer') }}">Hectares</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Vendre</a>
                                        <ul class="dropdown">
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('app_vendre') }}">Appartements</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('vill_vendre') }}">Villas</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('bur_vendre') }}">Bureaux</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('im_vendre') }}">Immeubles</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('terre_vendre') }}">Terrains</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('entr_vendre') }}">Entrepots</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('mag_vendre') }}">Magasin</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('hect_vendre') }}">Hectares</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Promo</a>
                                        <ul class="dropdown">
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('app_promo') }}">Appartements</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('vill_promo') }}">Villa</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('im_promo') }}">Immeuble</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('terre_promo') }}">Terrains</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('hect_promo') }}">Hectares</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">Projet en cours</a>
                                        <ul class="dropdown">
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('app_louer') }}">Appartements</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('vill_louer') }}">Villas</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('terre_louer') }}">Terrain</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('about_site') }}">A propos</a></li>
                                    <li><a href="{{ route('contact_site') }}">Contact</a></li>
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
    <!-- Button trigger modal -->

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
<script src="{{ asset('backend/assets/dist/js/app.js') }}"></script>

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