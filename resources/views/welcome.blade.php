<!DOCTYPE HTML>
<html class="no-js" lang="{{ app()->getLocale() }}">
<head>
    <!-- Basic Page Needs
      ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>3s investissement</title>
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
<p class="chromeframe">You are using an outdated browser. <a href="https://browsehappy.com/">Upgrade your browser
    today</a> or <a href="https://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better
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
                        <a href="#" style="color: white !important;" class="visible-sm visible-xs menu-toggle"><i
                                    class="fa fa-bars"></i></a>
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
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_appar') }}">Appartements</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('vil_all') }}">Villas</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_bur') }}">Bureaux</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_im') }}">Immeubles</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_terre') }}">Terrains</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_entr') }}">Entrepots</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_mag') }}">Magasins</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('all_hect') }}">Hectares</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Louer</a>
                                        <ul class="dropdown">
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('app_louer') }}">Appartements</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('vill_louer') }}">Villas</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('bur_louer') }}">Bureaux</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('im_louer') }}">Immeubles</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('terre_louer') }}">Terrain</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('entr_louer') }}">Entrepots</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('mag_louer') }}">Magasin</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('hect_louer') }}">Hectares</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Vendre</a>
                                        <ul class="dropdown">
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('app_vendre') }}">Appartements</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('vill_vendre') }}">Villas</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('bur_vendre') }}">Bureaux</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('im_vendre') }}">Immeubles</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;"
                                                   href="{{ route('terre_vendre') }}">Terrains</a></li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('entr_vendre') }}">Entrepots</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('mag_vendre') }}">Magasin</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('hect_vendre') }}">Hectares</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:;">Promo</a>
                                        <ul class="dropdown">
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('app_promo') }}">Appartements</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('vill_promo') }}">Villa</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('im_promo') }}">Immeuble</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('terre_promo') }}">Terrains</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('hect_promo') }}">Hectares</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="">Projet en cours</a>
                                        <ul class="dropdown">
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('app_louer') }}">Appartements</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('vill_louer') }}">Villas</a>
                                            </li>
                                            <li><a style="color: #5e5e5e !important;" href="{{ route('terre_louer') }}">Terrain</a>
                                            </li>
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
        <div class="hero-slider flexslider clearfix" style="height:650px" data-autoplay="yes" ondurationchange="5000"
             data-pagination="no"
             data-arrows="yes" data-style="fade" data-pause="yes">
            <ul class="slides">
                <li class="slider-banner1" style="background-image:url({{ asset('site/image/03.jpg')}}); height: 680px">
                    <div class="row">
                        <div class="containerss">
                            <h5 class="reveal text3  span1">Bienvenue dans <span class="shadow" style="
                            color: tomato; font-weight: bold; text-shadow: 2px 0px 3px rgba(8,79,104,0.67)">
                                    3s investissement SUARL
                                </span></h5>&nbsp;
                            <h5 class="reveal-4 text1 span1">Nous faisons de votre confort, notre priorité.</h5>&nbsp;
                        </div>
                    </div>

                </li>
                <li class="parallax" style="background-image:url({{ asset('site/image/05.jpg')}}); height: 680px">
                    <div class="row">
                        <div class="containerss">
                            <h5 class="reveal text1  span1">Nous faisons de votre confort, notre priorité.</h5>&nbsp;
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
                        <div class="reveal-2">
                            <div data-toggle="modal" data-target="#exampleModal3" class="col-md-4 col-sm-4 carde"><img
                                        style="width: 1000px" alt="Friendly Agents"
                                        src="{{ URL::to(asset('site/image/L.jpg')) }}"
                                        class="img-thumbnail">

                                <p style="padding-top: 10px; text-align: justify"> Entrez dans notre catalogue avec
                                    autant de propriétés à louer et partez à
                                    la recherche de ce qui conviendra à votre style à des prix très abordables.</p>
                            </div>
                        </div>
                        <div class="reveal-3">
                            <div data-toggle="modal" data-target="#exampleModal2" class="col-md-4 col-sm-4 carde"><img
                                        style="width: 1000px" alt="Friendly Agents"
                                        src="{{ URL::to(asset('site/image/V.jpg')) }}"
                                        class="img-thumbnail">

                                <p style="padding-top: 10px; text-align: justify">Nous faisons de votre confort notre
                                    priorités, c'est dans cette optique que
                                    nous vous proposons des propriétés à vendre à des prix très abordables
                                </p>
                            </div>
                        </div>
                        <div data-toggle="modal" data-target="#exampleModal" class="col-md-4 col-sm-4 carde"><img
                                    style="width: 1000px" alt="Friendly Agents"
                                    src="{{ URL::to(asset('site/image/P.jpg')) }}"
                                    class="img-thumbnail">

                            <p style="padding-top: 10px; text-align: justify">
                                Nous vous proposons aussi une large game de nos propriétées que nous mettons en
                                promotion,
                                entrez dans notre catalogue et trouver ce que vous recherchez
                            </p>
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
                                <h4><span class="heading-icon"><i class="fa fa-home"></i></span>Nouveautés</h4>
                            </div>
                        </div>
                        <ul>
                            @foreach($apparts as $appart)
                            <li class="col-md-4 col-sm-6 type-rent reveal">
                                <div class="property-block">
                                    <a href="{{ route('property-detail', array('select' => $appart->id)) }}"
                                       class="property-featured-image">
                                        <img style="height: 230px !important;"
                                             src="{{  URL::to(asset($appart->image)) }}" alt="">
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
                                        <h4><a href="{{ route('property-detail', array('select' => $appart->id)) }}">{{
                                                $appart->name }}</a></h4>
                                        <span class="location">{{ $appart->adresse }}</span>
                                        @if($appart->devise == 1)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $appart->prix }}</span><strong>CFA</strong>
                                        </div>
                                        @elseif($appart->devise == 2)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $appart->prix }}</span><strong>EURO</strong>
                                        </div>
                                        @else
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $appart->prix }}</span><strong>$</strong>
                                        </div>
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
                                    <a href="{{ route('villa_detail', array('select' => $villa->id)) }}"
                                       class="property-featured-image">
                                        <img style="height: 230px !important;"
                                             src="{{  URL::to(asset($villa->image)) }}" alt="">
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
                                        <h4><a href="{{ route('villa_detail', array('select' => $villa->id)) }}">{{
                                                $villa->name }}</a></h4>
                                        <span class="location">{{ $villa->adresse }}</span>
                                        @if($villa->devise == 1)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $villa->prix }}</span><strong>CFA</strong>
                                        </div>
                                        @elseif($villa->devise == 2)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $villa->prix }}</span><strong>EURO</strong>
                                        </div>
                                        @else
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $villa->prix }}</span><strong>$</strong>
                                        </div>
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
                                    <a href="{{ route('detail_im', array('select' => $immeub->id)) }}"
                                       class="property-featured-image">
                                        <img style="height: 230px !important;" src="{{URL::to(asset($immeub->image)) }}"
                                             alt="">
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
                                        <h4><a href="{{ route('detail_im', array('select' => $immeub->id)) }}">{{
                                                $immeub->name }}</a></h4>
                                        <span class="location">{{ $immeub->adresse }}</span>
                                        @if($immeub->devise == 1)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $immeub->prix }}</span><strong>CFA</strong>
                                        </div>
                                        @elseif($immeub->devise == 2)
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $immeub->prix }}</span><strong>EURO</strong>
                                        </div>
                                        @else
                                        <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $immeub->prix }}</span><strong>$</strong>
                                        </div>
                                        @endif
                                        <br/>
                                        <span>{{ $immeub->short_description }}</span>
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
                    <span style="padding-left: 40%; color: red" align="center" class="text-center">Aucune information trouvée</span>
                    @endif
                </div>
                <br/>
            </div>
            <div id="featured-properties">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block-heading">
                                <h4><span class="heading-icon"><i class="fa fa-star"></i></span>Autres propriétés</h4>
                                <a href="{{ route('all_terre') }}" class="btn btn-primary btn-sm pull-right">Voir
                                    d'autres propriétés</i></a>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="yes"
                            data-pagination="no" data-arrows="yes" data-single-item="no">
                            @foreach($terrains as $terrain)
                            <li class="item property-block">
                                <a href="{{ route('detail_terre', array('select' => $terrain->id)) }}"
                                   class="property-featured-image">
                                    <img style="height: 150px; !important;" src="{{ URL::to(asset($terrain->image)) }}"
                                         alt="">
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
                                    <h4><a href="{{ route('detail_terre', array('select' => $terrain->id)) }}">{{
                                            $terrain->name }}</a></h4>
                                    <span class="location">{{$terrain->adresse }}</span>
                                    @if($terrain->devise == 1)
                                    <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $terrain->prix }}</span><strong>CFA</strong>
                                    </div>
                                    @elseif($immeub->devise == 2)
                                    <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $terrain->prix }}</span><strong>EURO</strong>
                                    </div>
                                    @else
                                    <div style="background-color: rgba(255,9,9,0.76)" class="price"><span>{{ $terrain->prix }}</span><strong>$</strong>
                                    </div>
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
                <div class="padding-tb45 bottom-blocks">
                    <div class="container">
                        <div class="row">
                            <h3 class="text-center">Notre équipe</h3>
                            <div style="padding-bottom: 10px" class="col-md-4 col-sm-4 latest-testimonials column carde">
                                <ul class="testimonials">
                                    <li style="padding-top: 15px">
                                        <img style="width: 190px !important; height: 180px; border-color: tomato"
                                             src="{{ asset('site/image/dg.jpg') }}" alt="Happy Client"
                                             class="testimonial-sender">
                                        <cite>Monsieur - <strong>Pape DIOP</strong>

                                            <br><a style="color: tomato">Directeur Général</a>
                                        </cite>
                                    </li>
                                </ul>
                            </div>
                            <div style="padding-bottom: 10px" class="col-md-4 col-sm-4 latest-testimonials column carde">
                                <ul class="testimonials">
                                    <li style="padding-top: 15px">
                                        <img style="width: 190px !important; height: 180px;  border-color: tomato"
                                             src="{{ asset('site/image/sc.jpg') }}" alt="Happy Client"
                                             class="testimonial-sender">
                                        <cite>Madame - <strong>Ndiaye</strong>
                                            <br><a style="color: tomato; padding-top: 15px">Assistante de Direction</a>
                                        </cite>
                                    </li>
                                </ul>
                            </div>
                            <div style="padding-bottom: 10px" class="col-md-4 col-sm-4 latest-testimonials column carde">
                                <ul class="testimonials">
                                    <li style="padding-top: 15px">
                                        <img style="width: 190px !important; height: 180px;  border-color: tomato"
                                             src="{{ asset('site/image/au.jpg') }}" alt="Happy Client"
                                             class="testimonial-sender">
                                        <cite>Monsieur - <strong>SAMBA</strong>
                                            <br><a style="color: tomato; padding-top: 15px">Agent Commercial</a>
                                        </cite>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- Start Site Footer -->
    @include('site.footer')


    <!-- Modal Promo -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Veuillez choisir une catégorie</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <a href="{{ route('app_promo') }}" class="btn btn-success">Appartements</a>
                        <a href="{{ route('im_promo') }}" class="btn btn-warning">Immeubles</a>
                        <a href="{{ route('vill_promo') }}" class="btn btn-danger">Villas</a>
                        <a href="{{ route('terre_promo') }}" class="btn btn-info">Terrains</a>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <a href="{{ route('hect_promo') }}" class="btn btn-primary">Hectares</a>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal vendre -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Veuillez choisir une catégorie</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <a href="{{ route('app_vendre') }}" class="btn btn-success col-md-3">Appartements</a>
                        <a href="{{ route('im_vendre') }}" class="btn btn-warning col-md-3">Immeubles</a>
                        <a href="{{ route('vill_vendre') }}" class="btn btn-danger col-md-3">Villas</a>
                        <a href="{{ route('bur_vendre') }}" class="btn btn-success col-md-3">Bureaux</a>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <a href="{{ route('terre_vendre') }}" class="btn btn-info col-md-3">Terrains</a>
                        <a href="{{ route('entr_vendre') }}" class="btn btn-success col-md-3">Entrepots</a>
                        <a href="{{ route('mag_vendre') }}" class="btn btn-warning col-md-3">Magasins</a>
                        <a href="{{ route('hect_vendre') }}" class="btn btn-danger col-md-3">Hectares</a>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Annuler</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal louer -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Veuillez choisir une catégorie</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <a href="{{ route('app_louer') }}" class="btn btn-success col-md-3">Appartements</a>
                        <a href="{{ route('im_louer') }}" class="btn btn-warning col-md-3">Immeubles</a>
                        <a href="{{ route('vill_louer') }}" class="btn btn-danger col-md-3">Villas</a>
                        <a href="{{ route('bur_louer') }}" class="btn btn-success col-md-3">Bureaux</a>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <a href="{{ route('terre_louer') }}" class="btn btn-info col-md-3">Terrains</a>
                        <a href="{{ route('entr_louer') }}" class="btn btn-primary col-md-3">Entrepots</a>
                        <a href="{{ route('mag_louer') }}" class="btn btn-warning col-md-3">Magasins</a>
                        <a href="{{ route('hect_louer') }}" class="btn btn-success col-md-3">Hectares</a>
                    </div>

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
                }, 100);
            },
            function () {
                $(this).animate({
                    marginTop: "0%",
                }, 100);
            }
        )
    });
</script>


</body>
</html>