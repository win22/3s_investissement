@extends('site.layout')
@section('content')
<div class="row">
    <div class="col-md-8 reveal">
        <div class="single-property">
            <div class="widget">
                <h2 style="font-family: 'Manjari Regular'" class="widgettitle">Details d'un terrain </h2>
            </div>
            <h3 class="page-title">{{ $terrain->name }}</h3>
            <div class="property-slider">
                <div id="property-images" class="flexslider">
                    <ul class="slides">
                        @foreach($terrain->images as $image)
                        <li class="item @if($loop->first) elevation-3 active @endif"> <img  src="{{ URL::to($image['image']) }}" alt="">
                        </li>
                        @endforeach
                        <li class="item"> <img src="{{URL::to($terrain['image'])}}" alt=""> </li>
                    </ul>
                </div>
                <div id="property-thumbs" class="flexslider">
                    <ul class="slides">
                        @foreach($terrain->images as $image)
                        <li class="item"> <img  src="{{ URL::to($image['image']) }}" alt=""> </li>
                        @endforeach
                        <li class="item"> <img src="{{URL::to($terrain['image'])}}" alt=""> </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="sidebar right-sidebar col-md-4 reveal-2">
        <div class="widget">
            <div class="agent">
                <h4><i style="color: red" class="fa fa-map-marker"></i> {{ $terrain->adresse }}</h4>
                <p>{{ $terrain->short_description }}</p>
                <div class="agent-contacts clearfix">
                    @if($terrain->devise == 1)
                    <div style="background-color: red;" class="price"><span>{{ $terrain->prix }}</span><strong>CFA</strong></div>
                    @elseif($terrain->devise == 2)
                    <div class="price"><span>{{ $terrain->prix }}</span><strong>EURO</strong></div>
                    @else
                    <div class="price"><span>{{ $terrain->prix }}</span><strong>$</strong></div>
                    @endif
                </div>
            </div>
        </div>

        <div class="widget">
            <h3 class="widgettitle">Details <br/>
                @if( ($terrain['sold']) == 1 )
                <span style="color: limegreen; font-family: 'Manjari Regular'">{{ $terrain['pourcentage'] }} de réduction</span>
                @endif
            </h3>
            <div style="font-family: 'Manjari Bold'" class="row">
                <div class="col-md-4">
                    <span style="color: red">Adresse:</span><br/>
                    <span>{{ $terrain['adresse'] }}</span>
                </div>
                <div class="col-md-4">
                    <span style="color: red">Ville:</span><br/>
                    <span>{{ $terrain['ville'] }}</span>
                </div>
                <div class="col-md-4">
                    <span style="color: red">Pays:</span><br/>
                    <span>{{ $terrain['pays'] }}</span>
                </div>
            </div>
            <div style="font-family: 'Manjari Bold'" class="row">
                <div class="col-md-4">
                    <span style="color: red">Type:</span><br/>
                    <span>{{ $terrain['type'] }}</span>
                </div>
                <div class="col-md-4">
                    <span style="color: red">Option:</span><br/>
                    @if($terrain['option'] == 1)
                    <span>A louer</span>
                    @elseif($terrain['devise'] == 2)
                    EURO
                    <span>A vendre</span>
                    $
                    @endif
                </div>
            </div>
            <div style="font-family: 'Manjari Bold'" class="row">
                <div class="col-md-4">
                    <span style="color: red">Dimension:</span><br/>
                    <span>{{ $terrain['dimension'] }}</span>
                </div>

            </div>
            <br/>
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active"> <a data-toggle="tab" href="#description">Large description </a> </li>
                </ul>
                <div class="tab-content">
                    <div id="description" class="tab-pane active">
                        {{ $terrain->large_description }}
                    </div>
                </div>
            </div>
            <div class="form-group col-md-12">
                <label>Choisir une ption</label>
                <select class="form-control dynamic2">
                    <option value="1">Réserver</option>
                    <option value="2">Annuler</option>
                </select>
            </div>
        </div>
    </div>
</div>
<form class="forma reveal-3" method="post" action="{{ route('save_mess', array('test' => $terrain->name)) }}">
    @csrf
    <div class="row">
        <div class="form-group col-md-4">
            <label>Nom</label>
            <input required type="text" name="name" class="form-control" placeholder="saisir votre nom">
            @if($errors->has('name'))
            <span style="color: red" class="small">{{ $errors->first('name')}}</span>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label>Email</label>
            <input required type="email" name="email" class="form-control" placeholder="saisir votre adresse e-mail">
            @if($errors->has('email'))
            <span style="color: red" class="small">{{ $errors->first('email')}}</span>
            @endif
        </div>
        <div class="form-group col-md-4">
            <label>Téléphone</label>
            <input required type="text" name="phone" class="form-control" placeholder="saisir votre numéro de téléphone">
            @if($errors->has('phone'))
            <span style="color: red" class="small">{{ $errors->first('phone')}}</span>
            @endif
        </div>
        <div class="form-group col-md-12">
            <label>Message</label>
            <textarea required class="form-control" name="message" placeholder="saisir votre message"></textarea>
            @if($errors->has('message'))
            <span style="color: red" class="small">{{ $errors->first('message')}}</span>
            @endif
        </div>

    </div>
    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
            @if($errors->has('g-recaptcha-response'))
            <span>
                <strong style="color: red">{{ $errors->first('g-recaptcha-response')}}</strong>
               </span>
            @endif
            <p hidden class="alert ">{{ $message = Session::get('message')}}</p>
            @if($message)
            <p style="color: #1a741a; font-family: 'Manjari Regular'" class="data-notify=" message"> {{$message }} <br/>
            </p>
            {{ Session::put('message',NULL) }}
            @endif
        </div>

    </div>
    <div  style="padding-left: 16px" class="row">
        <button type="submit" class="btn btn-primary pull-left">
            <i class="fa fa-send" style="color: white"></i>
            Envoyer
        </button>
    </div>
</form>

<div style="padding-top: 20px" class="row reveal-3">
    <div id="featured-properties">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-heading">
                        <h4><span class="heading-icon"><i class="fa fa-home"></i></span>Propriétés similaire</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="yes"
                    data-pagination="no" data-arrows="yes" data-single-item="no">
                    @foreach($terrain_similaire as $terrain)
                    <li class="item property-block">
                        <a href="{{ route('detail_terre', array('select' => $terrain->id)) }}" class="property-featured-image">
                            <img style="height: 150px;"  src="{{ asset($terrain->image) }}" alt="">
                            @if($terrain->option == 1)
                            <span style="background-color: #00b2bd !important; color: white" class="badges">louer</span>
                            @elseif($terrain->option == 2)
                            <span style="background-color: #00bd49 !important; color: white" class="badges">vendre</span>
                            @else
                            <span class="badges">Promo</span>
                            @endif
                        </a>
                        <div class="property-info">
                            <h4><a href="{{ route('detail_terre', array('select' => $terrain->id)) }}">{{ $terrain->name }}</a></h4>
                            <span class="location">{{ $terrain->adresse }}</span>
                            @if($terrain->devise == 1)
                            <div style="background-color: rgba(2,72,255,0.76)" class="price"><span>{{ $terrain->prix }}</span><strong>CFA</strong></div>
                            @elseif($appart->devise == 2)
                            <div style="background-color: rgba(2,72,255,0.76)" class="price"><span>{{ $terrain->prix }}</span><strong>EURO</strong></div>
                            @else
                            <div style="background-color: rgba(2,72,255,0.76)" class="price"><span>{{ $terrain->prix }}</span><strong>$</strong></div>
                            @endif
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            @if( $nb_terre <= 0)
            <span style="padding-left: 40%" align="center" class="text-center">Aucune information trouvée</span>
            @endif
        </div>
    </div>
</div>
@endsection