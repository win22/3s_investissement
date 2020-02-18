@extends('site.layout')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="block-heading">
            <h4><span class="heading-icon"><i class="fa fa-th-list"></i></span>Liste des appartements</h4>
        </div>
        <div class="property-listing">
            <ul>
                @foreach($apparts as $appart)
                <li class="type-rent col-md-12 reveal">
                    <div class="col-md-4"><a href="{{ route('property-detail', array('select' => $appart->id)) }}"
                                             class="property-featured-image"> <img src="{{ asset($appart->image) }}"
                                                                                   alt=""> <span class="images-count"><i
                                        class="fa fa-picture-o"></i> 1</span>
                            @if($appart->option == 1)
                            <span style="background-color: #00b2bd !important; color: white" class="badges">louer</span>
                            @elseif($appart->option == 2)
                            <span style="background-color: #00bd49 !important; color: white"
                                  class="badges">vendre</span>
                            @else
                            <span class="badges">Promo</span>
                            @endif
                    </div>
                    <div class="col-md-8">
                        <div class="property-info">
                            @if($appart->devise == 1)
                            <div style="background-color: rgba(2,72,255,0.76)" class="price">
                                <span>{{ $appart->prix }}</span><strong>CFA</strong></div>
                            @elseif($appart->devise == 2)
                            <div style="background-color: rgba(2,72,255,0.76)" class="price">
                                <span>{{ $appart->prix }}</span><strong>EURO</strong></div>
                            @else
                            <div style="background-color: rgba(2,72,255,0.76)" class="price">
                                <span>{{ $appart->prix }}</span><strong>$</strong></div>
                            @endif
                            <h4><a href="{{ route('property-detail', array('select' => $appart->id)) }}">{{
                                    $appart->name }}</a></h4>
                            <span class="location">{{ $appart->adresse }}</span>
                            <p>{{ $appart->short_description }}</p>
                        </div>
                        <div class="property-amenities clearfix">
                            <span class="area"><strong>{{ $appart->chambre }}</strong>Chambre</span>
                            <span class="baths"><strong>{{ $appart->salon }}</strong>Salon</span>
                            <span class="beds"><strong>{{ $appart->cuisine }}</strong>Cuisine</span>
                            <span class="parking"><strong>{{ $appart->garage }}</strong>Garage</span>
                        </div>
                </li>
                @endforeach
            </ul>
        </div>
        <ul class="pagination">
            {{ $apparts->links() }}
        </ul>
    </div>
    <!-- Start Sidebar -->
    <div class="sidebar right-sidebar col-md-3">
        <div class="widget sidebar-widget">
            <h3 class="widgettitle">Search Properties</h3>
            <div class="full-search-form">
                <form action="#">
                    <select name="propery type" class="form-control input-lg selectpicker">
                        <option selected>Type</option>
                        <option>Villa</option>
                        <option>Family House</option>
                        <option>Single Home</option>
                        <option>Cottage</option>
                        <option>Apartment</option>
                    </select>
                    <select name="propery contract type" class="form-control input-lg selectpicker">
                        <option selected>Contract</option>
                        <option>Rent</option>
                        <option>Buy</option>
                    </select>
                    <select name="propery location" class="form-control input-lg selectpicker">
                        <option selected>Location</option>
                        <option>New York</option>
                    </select>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
                </form>
            </div>
        </div>
        <div class="widget sidebar-widget featured-properties-widget">
            <h3 class="widgettitle">Featured Properties</h3>
            <ul class="owl-carousel owl-alt-controls1 single-carousel" data-columns="1" data-autoplay="no"
                data-pagination="no" data-arrows="yes" data-single-item="yes">
                <li class="item property-block"><a href="#" class="property-featured-image"> <img
                                src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span
                                class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span
                                class="badges">Rent</span> </a>
                    <div class="property-info">
                        <h4><a href="#">116 Waverly Place</a></h4>
                        <span class="location">NYC</span>
                        <div class="price"><strong>$</strong><span>2800 Monthly</span></div>
                    </div>
                </li>
                <li class="item property-block"><a href="#" class="property-featured-image"> <img
                                src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span
                                class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span
                                class="badges">Buy</span> </a>
                    <div class="property-info">
                        <h4><a href="#">232 East 63rd Street</a></h4>
                        <span class="location">NYC</span>
                        <div class="price"><strong>$</strong><span>250000</span></div>
                    </div>
                </li>
                <li class="item property-block"><a href="#" class="property-featured-image"> <img
                                src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span
                                class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span
                                class="badges">Buy</span> </a>
                    <div class="property-info">
                        <h4><a href="#">55 Warren Street</a></h4>
                        <span class="location">NYC</span>
                        <div class="price"><strong>$</strong><span>300000</span></div>
                    </div>
                </li>
                <li class="item property-block"><a href="#" class="property-featured-image"> <img
                                src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt=""> <span
                                class="images-count"><i class="fa fa-picture-o"></i> 2</span> <span
                                class="badges">Rent</span> </a>
                    <div class="property-info">
                        <h4><a href="#">459 West Broadway</a></h4>
                        <span class="location">NYC</span>
                        <div class="price"><strong>$</strong><span>3100 Monthly</span></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection