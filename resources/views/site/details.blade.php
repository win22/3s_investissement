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
<form>
    <div id="forma">
        pppp
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <label>Nom</label>
            <input type="text" class="form-control" placeholder="saisir votre nom">
        </div>
        <div class="form-group col-md-4">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="saisir votre adresse e-mail">
        </div>
        <div class="form-group col-md-4">
            <label>Téléphone</label>
            <input type="text" class="form-control" placeholder="saisir votre numéro de téléphone">
        </div>
        <div class="form-group col-md-12">
            <label>Message</label>
            <textarea class="form-control" placeholder="saisir votre message"></textarea>
        </div>
    </div>
    <button type="submit" class="btn btn-primary pull-right">Envoyer</button>
</form>

<div class="row">
    <h3>Related Properties</h3>
    <hr>
    <div class="property-grid col-md-12">
        <ul class="grid-holder col-3">
            <li class="grid-item type-rent">
                <div class="property-block"> <a href="#" class="property-featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Rent</span> </a>
                    <div class="property-info">
                        <h4><a href="#">116 Waverly Place</a></h4>
                        <span class="location">NYC</span>
                        <div class="price"><strong>$</strong><span>2800 Monthly</span></div>
                    </div>
                    <div class="property-amenities clearfix"> <span class="area"><strong>5000</strong>Area</span> <span class="baths"><strong>3</strong>Baths</span> <span class="beds"><strong>3</strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div>
                </div>
            </li>
            <li class="grid-item type-buy">
                <div class="property-block"> <a href="#" class="property-featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Buy</span> </a>
                    <div class="property-info">
                        <h4><a href="#">232 East 63rd Street</a></h4>
                        <span class="location">NYC</span>
                        <div class="price"><strong>$</strong><span>250000</span></div>
                    </div>
                    <div class="property-amenities clearfix"> <span class="area"><strong>5000</strong>Area</span> <span class="baths"><strong>3</strong>Baths</span> <span class="beds"><strong>3</strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div>
                </div>
            </li>
            <li class="grid-item type-rent">
                <div class="property-block"> <a href="#" class="property-featured-image"> <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span class="badges">Buy</span> </a>
                    <div class="property-info">
                        <h4><a href="#">55 Warren Street</a></h4>
                        <span class="location">NYC</span>
                        <div class="price"><strong>$</strong><span>300000</span></div>
                    </div>
                    <div class="property-amenities clearfix"> <span class="area"><strong>5000</strong>Area</span> <span class="baths"><strong>3</strong>Baths</span> <span class="beds"><strong>3</strong>Beds</span> <span class="parking"><strong>1</strong>Parking</span> </div>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection
