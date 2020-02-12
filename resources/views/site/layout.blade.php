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
                                            <li><a href="agents.html">Appartements</a></li>
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
    <div class="site-showcase">
        <div class="slider-mask overlay-transparent"></div>
        <!-- Start Hero Slider -->
        <div class="hero-slider flexslider clearfix" style="height:680px" data-autoplay="yes" data-pagination="no"
             data-arrows="yes" data-style="fade" data-pause="yes">
            <ul class="slides">
                <li class="slider-banner1" style="background-image:url({{ asset('site/image/06.jpg')}}); height: 680px">
                    <div class="flex-caption">
                        <strong class="title">1671 Grand Avenue, <em>NYC</em></strong>
                        <div class="price"><strong>$</strong><span>100000</span></div>
                        <a href="property-detail.html" class="btn btn-primary btn-block">Details</a>
                        <div class="hero-agent">
                            <img src="http://placehold.it/365x365&amp;text=IMAGE+PLACEHOLDER" alt=""
                                 class="hero-agent-pic">
                            <a href="agent-detail.html" class="hero-agent-contact" data-placement="left"
                               data-toggle="tooltip" title="" data-original-title="Contact Agent"><i
                                    class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </li>
                <li class="parallax" style="background-image:url({{ asset('site/image/05.jpg')}}); height: 680px">
                    <div class="flex-caption">
                        <strong class="title">1671 Grand Avenue, <em>NYC</em></strong>
                        <div class="price"><strong>$</strong><span>100000</span></div>
                        <a href="property-detail.html" class="btn btn-primary btn-block">Details</a>
                        <div class="hero-agent">
                            <img src="http://placehold.it/365x365&amp;text=IMAGE+PLACEHOLDER" alt=""
                                 class="hero-agent-pic">
                            <a href="agent-detail.html" class="hero-agent-contact" data-placement="left"
                               data-toggle="tooltip" title="" data-original-title="Contact Agent"><i
                                    class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Hero Slider -->
        <!-- Site Search Module -->
        <div class="site-search-module">
            <div class="container">
                <div class="site-search-module-inside">
                    <form action="#">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <select name="propery type" class="form-control input-lg selectpicker">
                                        <option selected>Type</option>
                                        <option>Villa</option>
                                        <option>Family House</option>
                                        <option>Single Home</option>
                                        <option>Cottage</option>
                                        <option>Apartment</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="propery contract type" class="form-control input-lg selectpicker">
                                        <option selected>Contract</option>
                                        <option>Rent</option>
                                        <option>Buy</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select name="propery location" class="form-control input-lg selectpicker">
                                        <option selected>Location</option>
                                        <option>New York</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-block btn-lg"><i
                                            class="fa fa-search"></i> Search
                                    </button>
                                </div>
                                <div class="col-md-2"><a href="#" id="ads-trigger" class="btn btn-default btn-block"><i
                                            class="fa fa-plus"></i> <span>Advanced</span></a></div>
                            </div>
                            <div class="row hidden-xs hidden-sm">
                                <div class="col-md-2">
                                    <label>Min Beds</label>
                                    <select name="beds" class="form-control input-lg selectpicker">
                                        <option>Any</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Min Baths</label>
                                    <select name="beds" class="form-control input-lg selectpicker">
                                        <option>Any</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                        <option>7</option>
                                        <option>8</option>
                                        <option>9</option>
                                        <option>10</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Min Price</label>
                                    <select name="beds" class="form-control input-lg selectpicker">
                                        <option>Any</option>
                                        <option>$1000</option>
                                        <option>$5000</option>
                                        <option>$10000</option>
                                        <option>$50000</option>
                                        <option>$100000</option>
                                        <option>$500000</option>
                                        <option>$1000000</option>
                                        <option>$3000000</option>
                                        <option>$5000000</option>
                                        <option>$10000000</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Max Price</label>
                                    <select name="beds" class="form-control input-lg selectpicker">
                                        <option>Any</option>
                                        <option>$1000</option>
                                        <option>$5000</option>
                                        <option>$10000</option>
                                        <option>$50000</option>
                                        <option>$100000</option>
                                        <option>$500000</option>
                                        <option>$1000000</option>
                                        <option>$3000000</option>
                                        <option>$5000000</option>
                                        <option>$10000000</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Min Area (Sq Ft)</label>
                                    <input type="text" class="form-control input-lg" placeholder="Any">
                                </div>
                                <div class="col-md-2">
                                    <label>Max Area (Sq Ft)</label>
                                    <input type="text" class="form-control input-lg" placeholder="Any">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
           @yield('content')
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
        $('.carde').hover(
            function () {
                $(this).animate({
                    marginTop: "-1%",
                },100);
            },
            function () {
                $(this).animate({
                    marginTop: "0%",
                },100);
            }
        )
    });
</script>
</body>
</html>