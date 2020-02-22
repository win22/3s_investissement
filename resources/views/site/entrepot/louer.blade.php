@extends('site.layout')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="block-heading">
            <h4><span class="heading-icon"><i class="fa fa-th-list"></i></span>Liste des entrepots à louer</h4>
        </div>
        <div class="property-listing">
            <ul>
                @foreach($entrepot_louer as $entrepot)
                <li class="type-rent col-md-12 reveal">
                    <div class="col-md-4"><a href="{{ route('detail_entr', array('select' => $entrepot->id)) }}"
                                             class="property-featured-image"> <img src="{{ asset($entrepot->image) }}"
                                                                                   alt=""> <span class="images-count"><i
                                    class="fa fa-picture-o"></i> 1</span>
                            @if($entrepot->option == 1)
                            <span style="background-color: #00b2bd !important; color: white" class="badges">louer</span>
                            @elseif($entrepot->option == 2)
                            <span style="background-color: #00bd49 !important; color: white"
                                  class="badges">vendre</span>
                            @else
                            <span class="badges">Promo</span>
                            @endif
                    </div>
                    <div class="col-md-8">
                        <div class="property-info">
                            @if($entrepot->devise == 1)
                            <div style="background-color: rgba(2,72,255,0.76)" class="price">
                                <span>{{ $entrepot->prix }}</span><strong>CFA</strong></div>
                            @elseif($entrepot->devise == 2)
                            <div style="background-color: rgba(2,72,255,0.76)" class="price">
                                <span>{{ $entrepot->prix }}</span><strong>EURO</strong></div>
                            @else
                            <div style="background-color: rgba(2,72,255,0.76)" class="price">
                                <span>{{ $entrepot->prix }}</span><strong>$</strong></div>
                            @endif
                            <h4><a href="{{ route('detail_entr', array('select' => $entrepot->id)) }}">{{
                                    $entrepot->name }}</a></h4>
                            <span class="location">{{ $entrepot->adresse }}</span>
                            <p>{{ $entrepot->short_description }}</p>
                        </div>
                        <div class="property-amenities clearfix">
                            <span class="parking"><strong>{{ $entrepot->dimension }}</strong>Dimension</span>
                        </div>
                </li>
                @endforeach
            </ul>
        </div>
        <ul class="pagination">
            {{ $entrepot_louer->links() }}
        </ul>
        @if( $nb_entr <= 0)
        <span style="padding-left: 40%" align="center" class="text-center">Aucune information trouvée</span>
        @endif
    </div>
    <!-- Start Sidebar -->
    <div class="sidebar right-sidebar col-md-3">
        <form action="{{ route('search_lou_entr') }}" method="post">
            @csrf
            <div class="widget sidebar-widget">
                <h3 class="widgettitle">Recherche</h3>
                <div class="full-search-form">
                    <form action="#">
                        <div class="form-group">
                            <label>Recherche</label>
                            <input required class="form-control" placeholder="Saisir ici" name="search">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Rechercher</button>
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