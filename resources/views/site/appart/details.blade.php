@extends('site.layout')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="single-property">
            <h2 class="page-title">{{ $appart->name }}</h2>
            <div class="property-slider">
                <div id="property-images" class="flexslider">
                    <ul class="slides">
                        @foreach($appart->images as $image)
                        <li class="item @if($loop->first) elevation-3 active @endif"> <img  src="{{ URL::to($image['image']) }}" alt="">
                        </li>
                        @endforeach
                        <li class="item"> <img src="{{URL::to($appart['image'])}}" alt=""> </li>
                    </ul>
                </div>
                <div id="property-thumbs" class="flexslider">
                    <ul class="slides">
                        @foreach($appart->images as $image)
                        <li class="item"> <img  src="{{ URL::to($image['image']) }}" alt=""> </li>
                        @endforeach
                        <li class="item"> <img src="{{URL::to($appart['image'])}}" alt=""> </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>
    <div class="sidebar right-sidebar col-md-4">
        <div class="widget">
            <div class="agent">
                <h4><i style="color: red" class="fa fa-map-marker"></i> {{ $appart->adresse }}</h4>
                <p>{{ $appart->short_description }}</p>
                <div class="agent-contacts clearfix">
                    @if($appart->devise == 1)
                    <div style="background-color: red;" class="price"><span>{{ $appart->prix }}</span><strong>CFA</strong></div>
                    @elseif($appart->devise == 2)
                    <div class="price"><span>{{ $appart->prix }}</span><strong>EURO</strong></div>
                    @else
                    <div class="price"><span>{{ $appart->prix }}</span><strong>$</strong></div>
                    @endif
                </div>
            </div>
        </div>

        <div class="widget">
            <h3 class="widgettitle">Additional Amenities</h3>
            <div style="font-family: 'Manjari Bold'" class="row">
                <div class="col-md-4">
                    <span style="color: red">Adresse:</span><br/>
                    <span>{{ $appart['adresse'] }}</span>
                </div>
                <div class="col-md-4">
                    <span style="color: red">Ville:</span><br/>
                    <span>{{ $appart['ville'] }}</span>
                </div>
                <div class="col-md-4">
                    <span style="color: red">Pays:</span><br/>
                    <span>{{ $appart['pays'] }}</span>
                </div>
            </div>
            <div style="font-family: 'Manjari Bold'" class="row">
                <div class="col-md-4">
                    <span style="color: red">Type:</span><br/>
                    <span>{{ $appart['type'] }}</span>
                </div>
                <div class="col-md-4">
                    <span style="color: red">Option:</span><br/>
                    @if($appart['option'] == 1)
                    <span>A louer</span>
                    @elseif($appart['devise'] == 2)
                    EURO
                    <span>A vendre</span>
                    $
                    @endif
                </div>
            </div>
            <div style="font-family: 'Manjari Bold'" class="row">
                <div class="col-md-4">
                    <span style="color: red">Chambre:</span><br/>
                    <span>{{ $appart['chambre'] }}</span>
                </div>
                <div class="col-md-4">
                    <span style="color: red">Cuisines:</span><br/>
                    <span>{{ $appart['cuisine'] }}</span>
                </div>
                <div class="col-md-4">
                    <span style="color: red">Salle de bain:</span><br/>
                    <span>{{ $appart['sale_de_bain'] }}</span>
                </div>
            </div>
            <div style="font-family: 'Manjari Bold'" class="row">
                <div class="col-md-4">
                    <span style="color: red">Garage:</span><br/>
                    <span>{{ $appart['garage'] }}</span>
                </div>
                <div class="col-md-4">
                    <span style="color: red">Salon:</span><br/>
                    <span>{{ $appart['salon'] }}</span>
                </div>
            </div>
            <br/>
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active"> <a data-toggle="tab" href="#description">Large description </a> </li>
                </ul>
                <div class="tab-content">
                    <div id="description" class="tab-pane active">
                        {{ $appart->large_description }}
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
<form class="forma" action="{{ route('save_mess', array('test' => $appart->id)) }}">
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
            Un mail vous a été envoyé afin de confirmer votre reservation<br/>
            </p>
            {{ Session::put('message',NULL) }}
            @endif
        </div>

    </div>

    <br/>
    <button type="submit" class="btn btn-primary pull-right">Envoyer</button>
</form>

<div class="row">
    <div id="featured-properties">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block-heading">
                        <h4><span class="heading-icon"><i class="fa fa-star"></i></span>>Propriétés similaire</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="yes"
                    data-pagination="no" data-arrows="yes" data-single-item="no">
                    @foreach($appart_similaire as $appart)
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
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>
@endsection