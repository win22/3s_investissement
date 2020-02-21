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
                                    </ul>
                                </li>
                                <li><a href="javascript:;">Louer</a>
                                    <ul class="dropdown">
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('app_louer') }}">Appartements</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('vill_louer') }}">Villas</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('bur_louer') }}">Bureaux</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('im_louer') }}">Immeubles</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('terre_louer') }}">Terrain</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:;">Vendre</a>
                                    <ul class="dropdown">
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('app_vendre') }}">Appartements</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('vill_vendre') }}">Villas</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('bur_vendre') }}">Bureaux</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('im_vendre') }}">Immeubles</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('terre_vendre') }}">Terrains</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:;">Promo</a>
                                    <ul class="dropdown">
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('app_promo') }}">Appartements</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('vill_promo') }}">Villa</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('bur_promo') }}">Bureau</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('im_promo') }}">Immeuble</a></li>
                                        <li><a style="color: #5e5e5e !important;" href="{{ route('terre_promo') }}">Terrains</a></li>
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
    <div class="site-showcase">
        <div class="slider-mask overlay-transparent"></div>
        <!-- Start Hero Slider -->
        <div class="hero-slider flexslider clearfix" style="height:650px" data-autoplay="yes" ondurationchange="5000" data-pagination="no"
             data-arrows="yes" data-style="fade" data-pause="yes">
            <ul class="slides">
                <li class="slider-banner1" style="background-image:url({{ asset('site/image/03.jpg')}}); height: 680px">
                    <div class="row">
                        <div class="containerss">
                            <h5  class="reveal text3  span1">Bienvenue dans  <span style="color: tomato">3s investissement SUARL</span></h5>&nbsp;
                            <h5  class="reveal-4 text1 span1">Nous faisons de votre confort notre priotité.</h5>&nbsp;
                        </div>
                    </div>

                </li>
                <li class="parallax" style="background-image:url({{ asset('site/image/05.jpg')}}); height: 680px">
                    <div class="row">
                        <div class="containerss">
                            <h5  class="reveal text1  span1">Nous faisons de votre confort notre priotité.</h5>&nbsp;
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- End Hero Slider -->
        <!-- Site Search Module -->
    </div>
    <!-- Start Content -->
    <div class="main" role="main">
        <div id="content" class="content full">
            <div class="featured-blocks">
                <div class="container">
                    <div class="row reveal-2">
                        <h3 class="text-center">Choisir un catalogue</h3>
                        <div data-toggle="modal" data-target="#exampleModal" class="col-md-4 col-sm-4 carde"><img style="width: 1000px" alt="Friendly Agents"
                                    src="{{ URL::to(asset('site/image/03.jpg')) }}"
                                    class="img-thumbnail">
                            <h3 class="text-center">Promo</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                        </div>
                        <div class="reveal-2">
                            <div data-toggle="modal" data-target="#exampleModal3" class="col-md-4 col-sm-4 carde"><img style="width: 1000px" alt="Friendly Agents"
                                                                      src="{{ URL::to(asset('site/image/02.jpg')) }}"
                                                                      class="img-thumbnail">
                                <h3 class="text-center">A louer</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                    Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                            </div>
                        </div>
                        <div class="reveal-3">
                            <div data-toggle="modal" data-target="#exampleModal2" class="col-md-4 col-sm-4 carde"><img style="width: 1000px" alt="Friendly Agents"
                                                                      src="{{ URL::to(asset('site/image/06.jpg')) }}"
                                                                      class="img-thumbnail">
                                <h3 class="text-center">A vendre</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                    Donec facilisis fermentum sem, ac viverra ante luctus vel.</p>
                            </div>
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
                                <h4><span class="heading-icon"><i class="fa fa-home"></i></span>Nouvautés</h4>
                            </div>
                        </div>
                        <ul>
                            @foreach($apparts as $appart)
                            <li class="col-md-4 col-sm-6 type-rent reveal">
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
                            @foreach($villas as $villa)
                            <li class="col-md-4 col-sm-6 type-rent reveal">
                                <div class="property-block">
                                    <a  href="{{ route('villa_detail', array('select' => $villa->id)) }}" class="property-featured-image">
                                        <img style="height: 230px !important;"  src="{{$villa->image }}" alt="">
                                        <span class="images-count"><i class="fa fa-picture-o"></i>1</span>
                                        @if($villa->option == 1)
                                        <span style="background-color: #00b2bd !important; color: white" class="badges">louer</span>
                                        @elseif($villa->option == 2)
                                        <span style="background-color: #00bd49 !important; color: white" class="badges">vendre</span>
                                        @else
                                        <span class="badges">Promo</span>
                                        @endif
                                    </a>
                                    <div class="property-info">
                                        <h4><a href="{{ route('villa_detail', array('select' => $villa->id)) }}">{{ $villa->name }}</a></h4>
                                        <span class="location">{{ $villa->adresse }}</span>
                                        @if($villa->devise == 1)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $villa->prix }}</span><strong>CFA</strong></div>
                                        @elseif($villa->devise == 2)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $villa->prix }}</span><strong>EURO</strong></div>
                                        @else
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $villa->prix }}</span><strong>$</strong></div>
                                        @endif
                                        <br/>
                                        <span>{{ $villa->short_description }}</span>
                                    </div>
                                    <div class="property-amenities clearfix">
                                        <span class="area"><strong>{{ $villa->chambre }}</strong>Chambre</span>
                                        <span class="baths"><strong>{{ $villa->salon }}</strong>Salon</span>
                                        <span class="beds"><strong>{{ $villa->cuisine }}</strong>Cuisine</span>
                                        <span class="parking"><strong>{{ $villa->garage }}</strong>Garage</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            @foreach($immeubs as $immeub)
                            <li class="col-md-4 col-sm-6 type-rent reveal">
                                <div class="property-block">
                                    <a  href="{{ route('detail_im', array('select' => $immeub->id)) }}" class="property-featured-image">
                                        <img style="height: 230px !important;"  src="{{$villa->image }}" alt="">
                                        <span class="images-count"><i class="fa fa-picture-o"></i>1</span>
                                        @if($immeub->option == 1)
                                        <span style="background-color: #00b2bd !important; color: white" class="badges">louer</span>
                                        @elseif($immeub->option == 2)
                                        <span style="background-color: #00bd49 !important; color: white" class="badges">vendre</span>
                                        @else
                                        <span class="badges">Promo</span>
                                        @endif
                                    </a>
                                    <div class="property-info">
                                        <h4><a href="{{ route('detail_im', array('select' => $immeub->id)) }}">{{ $immeub->name }}</a></h4>
                                        <span class="location">{{ $immeub->adresse }}</span>
                                        @if($immeub->devise == 1)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $immeub->prix }}</span><strong>CFA</strong></div>
                                        @elseif($immeub->devise == 2)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $immeub->prix }}</span><strong>EURO</strong></div>
                                        @else
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $immeub->prix }}</span><strong>$</strong></div>
                                        @endif
                                        <br/>
                                        <span>{{ $villa->short_description }}</span>
                                    </div>
                                    <div class="property-amenities clearfix">
                                        <span class="area"><strong>{{ $immeub->appartement }}</strong>Appart</span>
                                        <span class="baths"><strong>{{ $immeub->etage }}</strong>Étage</span>
                                        <span class="beds"><strong>{{ $immeub->piscine }}</strong>Piscine</span>
                                        <span class="parking"><strong>{{ $immeub->dimension }}</strong>Dimension</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @if( ($nb_app<=0) && ($nb_vill<=0) && ($nb_im<=0) )
                    <span style="padding-left: 40%" align="center" class="text-center">Aucune information trouvée</span>
                    @endif
                </div>
                <a href="simple-listing-fw.html" class="btn btn-primary btn-sm pull-right">Voir d'autres proprétés<i class="fa fa-long-arrow-right"></i></a>
                <br/>
            </div>
            <div id="featured-properties">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-heading">
                                <h4><span class="heading-icon"><i class="fa fa-star"></i></span>Autres proprétés</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="yes"
                            data-pagination="no" data-arrows="yes" data-single-item="no">
                            @foreach($terrains as $terrain)
                            <li class="item property-block">
                                <a href="{{ route('detail_terre', array('select' => $terrain->id)) }}" class="property-featured-image">
                                    <img style="height: 150px; !important;" src="{{ asset($terrain->image) }}" alt="">
                                    <span class="images-count"><i class="fa fa-picture-o"></i>1</span>
                                    @if($terrain->option == 1)
                                    <span style="background-color: #00b2bd !important; color: white" class="badges">louer</span>
                                    @elseif($terrain->option == 2)
                                    <span style="background-color: #00bd49 !important; color: white" class="badges">vendre</span>
                                    @else
                                    <span class="badges">{{ $terrain->pourcentage }}</span>
                                    @endif
                                </a>
                                <div class="property-info">
                                    <h4><a href="{{ route('detail_terre', array('select' => $terrain->id)) }}">{{ $terrain->name }}</a></h4>
                                    <span class="location">{{$terrain->adresse }}</span>
                                    @if($terrain->devise == 1)
                                    <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $terrain->prix }}</span><strong>CFA</strong></div>
                                    @elseif($immeub->devise == 2)
                                    <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $terrain->prix }}</span><strong>EURO</strong></div>
                                    @else
                                    <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $terrain->prix }}</span><strong>$</strong></div>
                                    @endif
                                    <br/>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <p class="m-3">
                        @if($nb_terre<=0)
                        <span style="color: red ;padding-left: 40%">Aucune information trouvée</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="container">
                <div class="block-heading">
                    <h4><span class="heading-icon"><i class="fa fa-users"></i></span>Nos partenaires</h4>
                    <a href="about.html" class="btn btn-primary btn-sm pull-right">Tous les partenaires <i
                                class="fa fa-long-arrow-right"></i></a>
                </div>
                <div class="row">
                    <ul class="owl-carousel" id="clients-slider" data-columns="4" data-autoplay="yes"
                        data-pagination="no" data-arrows="no" data-single-item="no" data-items-desktop="4"
                        data-items-desktop-small="4" data-items-mobile="2" data-items-tablet="4">
                        <li class="item"><a href="#"><img src="{{ asset('site/image/logo-na.png') }}" alt=""></a></li>
                        <li class="item"><a href="#"><img src="{{ asset('site/image/logo-na.png') }}" alt=""></a></li>
                        <li class="item"><a href="#"><img src="{{ asset('site/image/logo-na.png') }}" alt=""></a></li>
                        <li class="item"><a href="#"><img src="{{ asset('site/image/logo-na.png') }}" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
            <div class="padding-tb45 bottom-blocks">
                <div class="container">
                    <div class="row">
                        <h3 class="text-center">Ils nous ont fait confiance</h3>
                        <div class="col-md-4 col-sm-4 latest-testimonials column carde">

                            <ul class="testimonials">
                                <li>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas
                                        rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum
                                        dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit
                                        amet, consectetur adipiscing.</p>
                                    <img src="http://placehold.it/80x80&amp;text=IMAGE+PLACEHOLDER" alt="Happy Client"
                                         class="testimonial-sender">
                                    <cite>Ibrahima DIALLO - <strong>Nataal Agency</strong>
                                        <br><a href="#">www.nataalagency.com</a>
                                    </cite>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 latest-testimonials column carde ">
                            <ul class="testimonials">
                                <li>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas
                                        rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum
                                        dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit
                                        amet, consectetur adipiscing.</p>
                                    <img src="http://placehold.it/80x80&amp;text=IMAGE+PLACEHOLDER" alt="Happy Client"
                                         class="testimonial-sender">
                                    <cite>Sagesse DIHAMBOU - <strong>LyMarket</strong>
                                        <br><a href="#">www.lymarket.sb</a>
                                    </cite>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-sm-4 latest-testimonials column carde">
                            <ul class="testimonials">
                                <li>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas
                                        rhoncus. Donec facilisis fermentum sem, ac viverra ante luctus vel. Lorem ipsum
                                        dolor sit amet, consectetur adipiscing elit. Nulla convallis egestas rhoncus.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit
                                        amet, consectetur adipiscing.</p>
                                    <img src="http://placehold.it/80x80&amp;text=IMAGE+PLACEHOLDER" alt="Happy Client"
                                         class="testimonial-sender">
                                    <cite>Malick DIALLO - <strong>Margo Business</strong>
                                        <br><a href="#">www.companyurl.com</a>
                                    </cite>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    <!-- Start Site Footer -->
   @include('site.footer')


    <!-- Modal Promo -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Veuillez choisir une catégorie</h5>
                </div>
                <div class="modal-body">
                    <a href="{{ route('app_promo') }}" class="btn btn-success">Appartements</a>
                    <a href="{{ route('im_promo') }}" class="btn btn-warning">Immeubles</a>
                    <a href="{{ route('vill_promo') }}" class="btn btn-danger">Villas</a>
                    <a href="{{ route('bur_promo') }}" class="btn btn-success">Bureaux</a>
                    <a href="{{ route('terre_promo') }}" class="btn btn-info">Terrains</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal vendre -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Veuillez choisir une catégorie</h5>
                </div>
                <div class="modal-body">
                    <a href="{{ route('app_vendre') }}" class="btn btn-success">Appartements</a>
                    <a href="{{ route('im_vendre') }}" class="btn btn-warning">Immeubles</a>
                    <a href="{{ route('vill_vendre') }}" class="btn btn-danger">Villas</a>
                    <a href="{{ route('bur_vendre') }}" class="btn btn-success">Bureaux</a>
                    <a href="{{ route('terre_vendre') }}" class="btn btn-info">Terrains</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal louer -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Veuillez choisir une catégorie</h5>
                </div>
                <div class="modal-body">
                    <a href="{{ route('app_louer') }}" class="btn btn-success">Appartements</a>
                    <a href="{{ route('im_louer') }}" class="btn btn-warning">Immeubles</a>
                    <a href="{{ route('vill_louer') }}" class="btn btn-danger">Villas</a>
                    <a href="{{ route('bur_louer') }}" class="btn btn-success">Bureaux</a>
                    <a href="{{ route('terre_louer') }}" class="btn btn-info">Terrains</a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('site/js/jquery-2.0.0.min.js') }}"></script> <!-- Jquery Library Call -->
<script src="{{ asset('site/plugins/prettyphoto/js/prettyphoto.js') }}"></script> <!-- PrettyPhoto Plugin -->
<script src="{{ asset('site/plugins/owl-carousel/js/owl.carousel.min.js') }}"></script> <!-- Owl Carousel -->
<script src="{{ asset('site/plugins/flexslider/js/jquery.flexslider.js') }}"></script> <!-- FlexSlider -->
<script src="{{ asset('site/js/helper-plugins.js') }}"></script> <!-- Plugins -->
<script src="{{ asset('site/js/bootstrap.js') }}"></script> <!-- UI -->
<script src="{{ asset('site/js/waypoints.js') }}"></script> <!-- Waypoints -->
<script src="{{ asset('site/js/init.js') }}"></script> <!-- All Scripts -->
<script src="{{ asset('backend/assets/dist/js/app.js') }}"></script>
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