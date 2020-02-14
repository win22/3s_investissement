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
            <div class="featured-blocks">
                <div class="container">
                    <div class="row">
                        <h3 class="text-center">Choisir un catalogue</h3>
                        <div class="col-md-4 col-sm-4 carde"><img style="width: 1000px" alt="Friendly Agents"
                                    src="{{ URL::to(asset('site/image/03.jpg')) }}"
                                    class="img-thumbnail">
                            <h3 class="text-center">Nos propriétés</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                        </div>
                        <div class="col-md-4 col-sm-4 carde"><img style="width: 1000px" alt="Friendly Agents"
                                                                  src="{{ URL::to(asset('site/image/02.jpg')) }}"
                                                                  class="img-thumbnail">
                            <h3 class="text-center">Louer</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                        </div>
                        <div class="col-md-4 col-sm-4 carde"><img style="width: 1000px" alt="Friendly Agents"
                                                                  src="{{ URL::to(asset('site/image/06.jpg')) }}"
                                                                  class="img-thumbnail">
                            <h3 class="text-center">Avendre</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="spacer-40"></div>
            <div class="container">
                <div class="row">
                    <div class="property-columns" id="latest-properties">
                        <div class="col-md-12">
                            <div class="block-heading">
                                <h4><span class="heading-icon"><i class="fa fa-leaf"></i></span>Nouvautés</h4>
                            </div>
                        </div>
                        <ul>
                            @foreach($apparts as $appart)
                            <li class="col-md-4 col-sm-6 type-rent">
                                <div class="property-block">
                                    <a  href="{{ route('property-detail', array('select' => $appart->id)) }}" class="property-featured-image">
                                        <img style="height: 230px !important;"  src="{{$appart->image }}" alt="">
                                        <span class="images-count"><i class="fa fa-picture-o"></i>1</span>
                                        @if($appart->option == 1)
                                        <span style="background-color: #00b2bd !important; color: white" class="badges">louer</span>
                                        @elseif($appart->option == 2)
                                        <span style="background-color: #00bd49 !important; color: white" class="badges">vendre</span>
                                        @else
                                        <span class="badges">Promo</span>
                                        @endif
                                    </a>
                                    <div class="property-info">
                                        <h4><a href="{{ route('property-detail', array('select' => $appart->id)) }}">{{ $appart->name }}</a></h4>
                                        <span class="location">{{ $appart->adresse }}</span>
                                        @if($appart->devise == 1)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $appart->prix }}</span><strong>CFA</strong></div>
                                        @elseif($appart->devise == 2)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $appart->prix }}</span><strong>EURO</strong></div>
                                        @else
                                        <div  style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $appart->prix }}</span><strong>$</strong></div>
                                        @endif
                                        <br/>
                                        <span>{{ $appart->short_description }}</span>
                                    </div>
                                    <div class="property-amenities clearfix">
                                        <span class="area"><strong>{{ $appart->chambre }}</strong>Chambre</span>
                                        <span class="baths"><strong>{{ $appart->salon }}</strong>Salon</span>
                                        <span class="beds"><strong>{{ $appart->cuisine }}</strong>Cuisine</span>
                                        <span class="parking"><strong>{{ $appart->garage }}</strong>Garage</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @foreach($villas as $appart)
                            <li class="col-md-4 col-sm-6 type-rent">
                                <div class="property-block">
                                    <a  href="property-detail.html" class="property-featured-image">
                                        <img style="height: 230px !important;"  src="{{$appart->image }}" alt="">
                                        <span class="images-count"><i class="fa fa-picture-o"></i>1</span>
                                        @if($appart->option == 1)
                                        <span style="background-color: #00b2bd !important; color: white" class="badges">louer</span>
                                        @elseif($appart->option == 2)
                                        <span style="background-color: #00bd49 !important; color: white" class="badges">vendre</span>
                                        @else
                                        <span class="badges">Promo</span>
                                        @endif
                                    </a>
                                    <div class="property-info">
                                        <h4><a href="property-detail.html">{{ $appart->name }}</a></h4>
                                        <span class="location">{{ $appart->adresse }}</span>
                                        @if($appart->devise == 1)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $appart->prix }}</span><strong>CFA</strong></div>
                                        @elseif($appart->devise == 2)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $appart->prix }}</span><strong>EURO</strong></div>
                                        @else
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $appart->prix }}</span><strong>$</strong></div>
                                        @endif
                                        <br/>
                                        <span>{{ $appart->short_description }}</span>
                                    </div>
                                    <div class="property-amenities clearfix">
                                        <span class="area"><strong>{{ $appart->chambre }}</strong>Chambre</span>
                                        <span class="baths"><strong>{{ $appart->salon }}</strong>Salon</span>
                                        <span class="beds"><strong>{{ $appart->cuisine }}</strong>Cuisine</span>
                                        <span class="parking"><strong>{{ $appart->garage }}</strong>Garage</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <a href="simple-listing-fw.html" class="btn btn-primary btn-sm pull-right">Voir d'autres proprétés<i class="fa fa-long-arrow-right"></i></a>
                <br/>
            </div>
            <div id="featured-properties">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-heading">
                                <h4><span class="heading-icon"><i class="fa fa-star"></i></span>Featured Properties</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="yes"
                            data-pagination="no" data-arrows="yes" data-single-item="no">
                            <li class="item property-block">
                                <a href="property-detail.html" class="property-featured-image">
                                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                    <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                                    <span class="badges">Rent</span>
                                </a>
                                <div class="property-info">
                                    <h4><a href="property-detail.html">116 Waverly Place</a></h4>
                                    <span class="location">NYC</span>
                                    <div class="price"><strong>$</strong><span>2800 Monthly</span></div>
                                </div>
                            </li>
                            <li class="item property-block">
                                <a href="property-detail.html" class="property-featured-image">
                                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                    <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                                    <span class="badges">Buy</span>
                                </a>
                                <div class="property-info">
                                    <h4><a href="property-detail.html">232 East 63rd Street</a></h4>
                                    <span class="location">NYC</span>
                                    <div class="price"><strong>$</strong><span>250000</span></div>
                                </div>
                            </li>
                            <li class="item property-block">
                                <a href="property-detail.html" class="property-featured-image">
                                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                    <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                                    <span class="badges">Buy</span>
                                </a>
                                <div class="property-info">
                                    <h4><a href="property-detail.html">55 Warren Street</a></h4>
                                    <span class="location">NYC</span>
                                    <div class="price"><strong>$</strong><span>300000</span></div>
                                </div>
                            </li>
                            <li class="item property-block">
                                <a href="property-detail.html" class="property-featured-image">
                                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                    <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                                    <span class="badges">Rent</span>
                                </a>
                                <div class="property-info">
                                    <h4><a href="property-detail.html">459 West Broadway</a></h4>
                                    <span class="location">NYC</span>
                                    <div class="price"><strong>$</strong><span>3100 Monthly</span></div>
                                </div>
                            </li>
                            <li class="item property-block">
                                <a href="property-detail.html" class="property-featured-image">
                                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                    <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                                    <span class="badges">Buy</span>
                                </a>
                                <div class="property-info">
                                    <h4><a href="property-detail.html">70 Greene Street</a></h4>
                                    <span class="location">NYC</span>
                                    <div class="price"><strong>$</strong><span>500000</span></div>
                                </div>
                            </li>
                            <li class="item property-block">
                                <a href="property-detail.html" class="property-featured-image">
                                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">
                                    <span class="images-count"><i class="fa fa-picture-o"></i> 2</span>
                                    <span class="badges">Rent</span>
                                </a>
                                <div class="property-info">
                                    <h4><a href="property-detail.html">115 Allen Street</a></h4>
                                    <span class="location">NYC</span>
                                    <div class="price"><strong>$</strong><span>5000 Monthly</span></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="padding-tb45 bottom-blocks">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 features-list column">
                            <h3>Theme features</h3>
                            <ul>
                                <li>
                                    <div class="icon"><i class="fa fa-umbrella"></i></div>
                                    <div class="text">
                                        <h4>Lots of possibilities</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-list"></i></div>
                                    <div class="text">
                                        <h4>Property list view</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-search"></i></div>
                                    <div class="text">
                                        <h4>Advance Search Options</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon"><i class="fa fa-users"></i></div>
                                    <div class="text">
                                        <h4>Agents Profile</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 popular-agent column">
                            <h3>Popular Agent</h3>
                            <a href="agent-detail.html"><img
                                        src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""
                                        class="img-thumbnail"></a>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h4><a href="agent-detail.html">Brooklyn Coyle</a></h4>
                                    <a href="agent-detail.html" class="btn btn-sm btn-primary">more details</a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <ul class="contact-info">
                                        <li><i class="fa fa-phone"></i> +87 6543 210</li>
                                        <li><i class="fa fa-envelope"></i> brook@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4 latest-testimonials column">
                            <h3>Client Testimonials</h3>
                            <ul class="testimonials">
                                <li>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas
                                        rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum
                                        dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit
                                        amet, consectetur adipiscing.</p>
                                    <img src="http://placehold.it/80x80&amp;text=IMAGE+PLACEHOLDER" alt="Happy Client"
                                         class="testimonial-sender">
                                    <cite>Mellisa - <strong>My company</strong>
                                        <br><a href="#">www.companyurl.com</a>
                                    </cite>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="block-heading">
                    <h4><span class="heading-icon"><i class="fa fa-users"></i></span>Our Partners</h4>
                    <a href="about.html" class="btn btn-primary btn-sm pull-right">All partners <i
                                class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="row">
                    <ul class="owl-carousel" id="clients-slider" data-columns="6" data-autoplay="yes"
                        data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="6"
                        data-items-desktop-small="4" data-items-mobile="2" data-items-tablet="4">
                        <li class="item"><a href="#"><img src="images/partner-1.png" alt=""></a></li>
                        <li class="item"><a href="#"><img src="images/partner-2.png" alt=""></a></li>
                        <li class="item"><a href="#"><img src="images/partner-3.png" alt=""></a></li>
                        <li class="item"><a href="#"><img src="images/partner-4.png" alt=""></a></li>
                        <li class="item"><a href="#"><img src="images/partner-5.png" alt=""></a></li>
                        <li class="item"><a href="#"><img src="images/partner-1.png" alt=""></a></li>
                        <li class="item"><a href="#"><img src="images/partner-2.png" alt=""></a></li>
                        <li class="item"><a href="#"><img src="images/partner-3.png" alt=""></a></li>
                        <li class="item"><a href="#"><img src="images/partner-4.png" alt=""></a></li>
                        <li class="item"><a href="#"><img src="images/partner-5.png" alt=""></a></li>
                    </ul>
                </div>
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