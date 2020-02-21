@extends('backend.admin_layout')
@section('contenu')

<div class="col-lg-12 reveal">
    <p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
    <div class="card card-dark  ">
        <div class="card-header">
            <h5 class="m-0">Terrain</h5>
            <p>Liste des terrains par catégorie</p>
        </div>
        <div class="card-body">
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" href="#p1" data-toggle="tab">A louer</a>
                <a class="nav-item nav-link" href="#p2" data-toggle="tab">A vendre</a>
                <a class="nav-item nav-link" href="#p3" data-toggle="tab">Promotion</a>
            </nav>
            <div class="tab-content p-3">
                <div class="tab-pane fade show active" id="p1">
                    <p>Vous etes dans l'onglet qui affiche les terrains qui sont à <span class="text-warning">louer</span> sur votre site !</p>
                    <div class="row">
                        @foreach($terrains_louer as $terrain)
                        <div class="col-md-4 p-2">
                            <div class="card carde dropdown-hover animated-dropdown-menu">
                                <div class="ribbon-wrapper sm ribbon">
                                    <div style="color: white !important; " class="ribbon bg-danger text-white">
                                        <span class="small" style="font-family: 'Manjari Bold'">A louer</span>
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{ $terrain['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $terrain['prix'] }}
                                            @if($terrain['devise'] == 1)
                                            CFA
                                            @elseif($terrain['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_terrain', array('test' => $terrain->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $terrain['name']
                                            }}</h6></a><br/>
                                    <span>{{ $terrain['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $terrain['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $terrain['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($terrain['status'] == 1)
                                            <span class="small">
                                                 <i style="color: green  !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            </span>
                                            <span class="text-success">Activé</span>
                                            @else
                                            <span class="small">
                                                 <i style="color: #da2839 !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            </span>
                                            <span class="text-danger">Désactivé</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-left">
                                        <span class="small"> Modifier {{  \Carbon\Carbon::parse($terrain['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($terrain['status'] == 1)
                                        <a href="{{ route('desactive_terrains', array('test' => $terrain->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_terrains', array('test' => $terrain->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_terre', array('select' =>$terrain->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_terre', array('test' => $terrain->id)) }}" id="delete"
                                           class="btn btn-danger btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <p class="card-text">
                        @if($nb_l<=0)
                        <span style="color: red ;padding-left: 35%">Aucune information trouvée</span>
                        @endif
                    </p>

                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $terrains_louer->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade " id="p2">
                    <p>Vous etes dans l'onglet qui affiche les terrains qui sont à <span class="text-warning">vendre</span> sur votre site !</p>
                    <div class="row">
                        @foreach($terrains_vendre as $terrain_v)
                        <div class="col-md-4 p-2">
                            <div class="card carde dropdown-hover animated-dropdown-menu">
                                <div class="ribbon-wrapper sm ribbon">
                                    <div style="color: white !important; " class="ribbon bg-danger text-white">
                                        <span class="small" style="font-family: 'Manjari Bold'">A louer</span>
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{ $terrain_v['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $terrain_v['prix'] }}
                                            @if($terrain_v['devise'] == 1)
                                            CFA
                                            @elseif($terrain_v['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_terrain', array('test' => $terrain_v->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $terrain_v['name']
                                            }}</h6></a><br/>
                                    <span>{{ $terrain_v['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $terrain_v['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $terrain_v['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($terrain_v['status'] == 1)
                                            <span class="small">
                                                 <i style="color: green  !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            </span>
                                            <span class="text-success">Activé</span>
                                            @else
                                            <span class="small">
                                                 <i style="color: #da2839 !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            </span>
                                            <span class="text-danger">Désactivé</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-left">
                                        <span class="small"> Modifier {{  \Carbon\Carbon::parse($terrain_v['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($terrain_v['status'] == 1)
                                        <a href="{{ route('desactive_terrains', array('test' => $terrain_v->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_terrains', array('test' => $terrain_v->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_terre', array('select' =>$terrain_v->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_terre', array('test' => $terrain_v->id)) }}" id="delete"
                                           class="btn btn-danger btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if($nb_v<=0)
                    <span style="color: red ;padding-left: 35%">Aucune information trouvée</span>
                    @endif

                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $terrains_vendre->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane show" id="p3">
                    Vous etes dans l'onglet qui affiche les terrains qui sont en <span class="text-info">Promotions</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($terrains_promo as $terrain_p)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">
                                        Promo
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{$terrain_p['image'] }}) center center; height: 130px !important;">
                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $terrain_v['prix'] }}
                                            @if($terrain_v['devise'] == 1)
                                            CFA
                                            @elseif($terrain_v['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_terrain', array('test' => $terrain_p->id)) }}"> <h6 class="widget-user-desc p-1 float-right"> {{ $terrain_p['name']
                                            }}</h6></a>
                                    <span class="text-orange small">Déscription rapide</span><br/>
                                    <span>{{ $terrain_p['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $terrain_p['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $terrain_p['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($terrain_p['status'] == 1)
                                            <span class="small">
                                                 <i style="color: green  !important;" class="fas fa-shield-alt"></i>&nbsp;
                                                  <span class="text-success">Activé</span>
                                            </span>
                                            @else
                                            <span class="small">
                                                <i style="color: #da2839 !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            <span class="text-danger">Désactivé</span>
                                           </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <small class="small">
                                                <i style="color: #05d7ff  !important;"is=""  class="nav-icon fas fa-store-alt"></i>
                                            </small>
                                            @if($terrain_p['type'] == 1)
                                            <span>A louer</span>
                                            @else
                                            <span>A vendre</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row td-actions text-center float-right">
                                        @if($terrain_p['status'] == 1)
                                        <a href="{{ route('desactive_terrains', array('test' => $terrain_p->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_terrains', array('test' => $terrain_p->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_terre', array('select' =>$terrain_p->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_terre', array('test' => $terrain_p->id)) }}" id="delete"
                                           class="btn btn-danger btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <p class="m-3">
                        @if($nb_p<=0)
                        <span style="color: red ;padding-left: 35%">Aucune information trouvée</span>
                        @endif
                    </p>
                    <br/>
                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $terrains_promo->links() }}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection