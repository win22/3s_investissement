@extends('backend.admin_layout')
@section('contenu')

<div class="col-lg-12 reveal">
    <p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
    <div class="card card-dark  ">
        <div class="card-header">
            <h5 class="m-0">Entrepot</h5>
            <p>Liste des entrepots par catégorie</p>
        </div>
        <div class="card-body">
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" href="#p1" data-toggle="tab">A louer</a>
                <a class="nav-item nav-link" href="#p2" data-toggle="tab">A vendre</a>
                <a class="nav-item nav-link" href="#p3" data-toggle="tab">Promotion</a>
            </nav>
            <div class="tab-content p-3">
                <div class="tab-pane fade show active" id="p1">
                    <p>Vous etes dans l'onglet qui affiche les entrepots qui sont à <span class="text-warning">louer</span> sur votre site !</p>
                    <div class="row">
                        @foreach($entrepots_louer as $entrepot)
                        <div class="col-md-4 p-2">
                            <div class="card carde dropdown-hover animated-dropdown-menu">
                                <div class="ribbon-wrapper sm ribbon">
                                    <div style="color: white !important; " class="ribbon bg-danger text-white">
                                        <span class="small" style="font-family: 'Manjari Bold'">A louer</span>
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{ $entrepot['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $entrepot['prix'] }}
                                            @if($entrepot['devise'] == 1)
                                            CFA
                                            @elseif($entrepot['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_entrepot', array('test' => $entrepot->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $entrepot['name']
                                            }}</h6></a><br/>
                                    <span>{{ $entrepot['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $entrepot['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $entrepot['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($entrepot['status'] == 1)
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
                                        <span class="small"> Modifier {{  \Carbon\Carbon::parse($entrepot['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($entrepot['status'] == 1)
                                        <a href="{{ route('desactive_entrepots', array('test' => $entrepot->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_entrepots', array('test' => $entrepot->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_entr', array('select' =>$entrepot->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_entr', array('test' => $entrepot->id)) }}" id="delete"
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
                            {{ $entrepots_louer->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade " id="p2">
                    <p>Vous etes dans l'onglet qui affiche les entrepots qui sont à <span class="text-warning">vendre</span> sur votre site !</p>
                    <div class="row">
                        @foreach($entrepots_vendre as $entrepot_v)
                        <div class="col-md-4 p-2">
                            <div class="card carde dropdown-hover animated-dropdown-menu">
                                <div class="ribbon-wrapper sm ribbon">
                                    <div style="color: white !important; " class="ribbon bg-danger text-white">
                                        <span class="small" style="font-family: 'Manjari Bold'">A louer</span>
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{ $entrepot_v['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $entrepot_v['prix'] }}
                                            @if($entrepot_v['devise'] == 1)
                                            CFA
                                            @elseif($entrepot_v['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_entrepot', array('test' => $entrepot_v->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $entrepot_v['name']
                                            }}</h6></a><br/>
                                    <span>{{ $entrepot_v['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $entrepot_v['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $entrepot_v['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($entrepot_v['status'] == 1)
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
                                        <span class="small"> Modifier {{  \Carbon\Carbon::parse($entrepot_v['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($entrepot_v['status'] == 1)
                                        <a href="{{ route('desactive_entrepots', array('test' => $entrepot_v->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_entrepots', array('test' => $entrepot_v->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_entr', array('select' =>$entrepot_v->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_entr', array('test' => $entrepot_v->id)) }}" id="delete"
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
                            {{ $entrepots_vendre->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane show" id="p3">
                    Vous etes dans l'onglet qui affiche les entrepots qui sont en <span class="text-info">Promotions</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($entrepots_promo as $entrepot_p)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">
                                        Promo
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{$entrepot_p['image'] }}) center center; height: 130px !important;">
                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $entrepot_p['prix'] }}
                                            @if($entrepot_p['devise'] == 1)
                                            CFA
                                            @elseif($entrepot_p['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_entrepot', array('test' => $entrepot_p->id)) }}"> <h6 class="widget-user-desc p-1 float-right"> {{ $entrepot_p['name']
                                            }}</h6></a>
                                    <span class="text-orange small">Déscription rapide</span><br/>
                                    <span>{{ $entrepot_p['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $entrepot_p['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $entrepot_p['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($entrepot_p['status'] == 1)
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
                                            @if($entrepot_p['type'] == 1)
                                            <span>A louer</span>
                                            @else
                                            <span>A vendre</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row td-actions text-center float-right">
                                        @if($entrepot_p['status'] == 1)
                                        <a href="{{ route('desactive_entrepots', array('test' => $entrepot_p->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_entrepots', array('test' => $entrepot_p->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_entr', array('select' =>$entrepot_p->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_entr', array('test' => $entrepot_p->id)) }}" id="delete"
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
                            {{ $entrepots_promo->links() }}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection