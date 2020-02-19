@extends('site.layout')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="block-heading">
            <h4><span class="heading-icon"><i class="fa fa-th-list"></i></span>Liste des villas</h4>
        </div>
        <div class="property-listing">
            <ul>
                @foreach($villas as $villa)
                <li class="type-rent col-md-12 reveal">
                    <div class="col-md-4"><a href="{{ route('villa_detail', array('select' => $villa->id)) }}"
                                             class="property-featured-image"> <img src="{{ asset($villa->image) }}"
                                                                                   alt=""> <span class="images-count"><i
                                        class="fa fa-picture-o"></i> 1</span>
                            @if($villa->option == 1)
                            <span style="background-color: #00b2bd !important; color: white" class="badges">louer</span>
                            @elseif($villa->option == 2)
                            <span style="background-color: #00bd49 !important; color: white"
                                  class="badges">vendre</span>
                            @else
                            <span class="badges">Promo</span>
                            @endif
                    </div>
                    <div class="col-md-8">
                        <div class="property-info">
                            @if($villa->devise == 1)
                            <div style="background-color: rgba(2,72,255,0.76)" class="price">
                                <span>{{ $villa->prix }}</span><strong>CFA</strong></div>
                            @elseif($villa->devise == 2)
                            <div style="background-color: rgba(2,72,255,0.76)" class="price">
                                <span>{{ $villa->prix }}</span><strong>EURO</strong></div>
                            @else
                            <div style="background-color: rgba(2,72,255,0.76)" class="price">
                                <span>{{ $villa->prix }}</span><strong>$</strong></div>
                            @endif
                            <h4><a href="{{ route('villa_detail', array('select' => $villa->id)) }}">{{
                                    $villa->name }}</a></h4>
                            <span class="location">{{ $villa->adresse }}</span>
                            <p>{{ $villa->short_description }}</p>
                        </div>
                        <div class="property-amenities clearfix">
                            <span class="area"><strong>{{ $villa->chambre }}</strong>Chambre</span>
                            <span class="baths"><strong>{{ $villa->salon }}</strong>Salon</span>
                            <span class="beds"><strong>{{ $villa->cuisine }}</strong>Cuisine</span>
                            <span class="parking"><strong>{{ $villa->garage }}</strong>Garage</span>
                        </div>
                </li>
                @endforeach
            </ul>
        </div>
        <ul class="pagination">
            {{ $villas->links() }}
        </ul>
    </div>
    <!-- Start Sidebar -->
    <div class="sidebar right-sidebar col-md-3">
        <form action="{{ route('search_vill') }}" method="post">
            @csrf
            <div class="widget sidebar-widget">
                <h3 class="widgettitle">Recherche</h3>
                <div class="full-search-form">
                    <form action="#">
                        <div class="form-group">
                            <label>Recherche</label>
                            <input class="form-control" placeholder="Saisir ici" name="search">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Search</button>
                    </form>
                </div>
            </div>
            <div class="widget sidebar-widget featured-properties-widget">
                <h3 class="widgettitle">Affiche</h3>
                <img  style="height: 380px" src="{{ asset('site/image/02.jpg ') }}">
            </div>
        </form>
    </div>
</div>
@endsection