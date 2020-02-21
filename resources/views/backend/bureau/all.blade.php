@extends('backend.admin_layout')
@section('contenu')

<div class="col-lg-12 reveal">
    <p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
    <div class="card card-dark  ">
        <div class="card-header">
            <h5 class="m-0">Bureau</h5>
            <p>Liste des bureaux par catégorie</p>
        </div>
        <div class="card-body">
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" href="#p1" data-toggle="tab">A louer</a>
                <a class="nav-item nav-link" href="#p2" data-toggle="tab">A vendre</a>
                <a class="nav-item nav-link" href="#p3" data-toggle="tab">Promotion</a>
            </nav>
            <div class="tab-content p-3">
                <div class="tab-pane fade show active" id="p1">
                    <p>Vous etes dans l'onglet qui affiche les bureaux qui sont à <span class="text-warning">louer</span> sur votre site !</p>
                    <div class="row">
                        @foreach($bureaux_louer as $bureau)
                        <div class="col-md-4 p-2">
                            <div class="card carde dropdown-hover animated-dropdown-menu">
                                <div class="ribbon-wrapper sm ribbon">
                                    <div style="color: white !important; " class="ribbon bg-danger text-white">
                                        <span class="small" style="font-family: 'Manjari Bold'">A louer</span>
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{ $bureau['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $bureau['prix'] }}
                                            @if($bureau['devise'] == 1)
                                            CFA
                                            @elseif($bureau['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_bureau', array('test' => $bureau->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $bureau['name']
                                            }}</h6></a><br/>
                                    <span>{{ $bureau['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $bureau['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $bureau['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($bureau['status'] == 1)
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
                                        <span class="small"> Modifier {{  \Carbon\Carbon::parse($bureau['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($bureau['status'] == 1)
                                        <a href="{{ route('desactive_bureaux', array('test' => $bureau->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_bureaux', array('test' => $bureau->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_bur', array('select' =>$bureau->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_bur', array('test' => $bureau->id)) }}" id="delete"
                                           class="btn btn-danger btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if( $nb_l <= 0)
                    <span style="padding-left: 40%;  color:tomato" align="center" class="text-center">Aucune information trouvée</span>
                    @endif
                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $bureaux_louer->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade " id="p2">
                    <p>Vous etes dans l'onglet qui affiche les bureaux qui sont à <span class="text-warning">vendre</span> sur votre site !</p>
                    <div class="row">
                        @foreach($bureaux_vendre as $bureau_v)
                        <div class="col-md-4 p-2">
                            <div class="card carde">
                                <div class="ribbon-wrapper sm ribbon">
                                    <div style="color: white !important; " class="ribbon bg-danger text-white">
                                        <span class="small" style="font-family: 'Manjari Bold'">A louer</span>
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{ $bureau_v['image'] }}) center center; background-position: cover; height: 130px !important;">
                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $bureau_v['prix'] }}
                                            @if($bureau_v['devise'] == 1)
                                            CFA
                                            @elseif($bureau_v['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_bureau', array('test' => $bureau_v->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $bureau_v['name']
                                            }}</h6></a><br/>
                                    <span>{{ $bureau_v['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $bureau_v['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $bureau_v['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($bureau_v['status'] == 1)
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
                                        <span class="small"> Modifier {{  \Carbon\Carbon::parse($bureau_v['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($bureau_v['status'] == 1)
                                        <a href="{{ route('desactive_bureaux', array('test' => $bureau_v->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_bureaux', array('test' => $bureau_v->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_bur', array('select' =>$bureau_v->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_bur', array('test' => $bureau_v->id)) }}" id="delete"
                                           class="btn btn-danger btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if( $nb_v <= 0)
                    <span style="padding-left: 40%;  color:tomato" align="center" class="text-center">Aucune information trouvée</span>
                    @endif

                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $bureaux_vendre->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane show" id="p3">
                    Vous etes dans l'onglet qui affiche les bureaux qui sont en <span class="text-info">Promotions</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($bureaux_promo as $bureau_p)
                        <div class="col-md-4">
                            <div class="card carde">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">
                                        Promo
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{$bureau_p['image'] }}) center center; height: 130px !important;">
                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $bureau_p['prix'] }}
                                            @if($bureau_p['devise'] == 1)
                                            CFA
                                            @elseif($bureau_p['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_bureau', array('test' => $bureau_p->id)) }}"> <h6 class="widget-user-desc p-1 float-right"> {{ $bureau_p['name']
                                            }}</h6></a>
                                    <span class="text-orange small">Déscription rapide</span><br/>
                                    <span>{{ $bureau_p['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $bureau_p['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $bureau_p['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($bureau_p['status'] == 1)
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
                                            @if($bureau_p['type'] == 1)
                                            <span>A louer</span>
                                            @else
                                            <span>A vendre</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row td-actions text-center float-right">
                                        @if($bureau_p['status'] == 1)
                                        <a href="{{ route('desactive_bureaux', array('test' => $bureau_p->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_bureaux', array('test' => $bureau_p->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_bur', array('select' =>$bureau_p->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_bur', array('test' => $bureau_p->id)) }}" id="delete"
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
                        @if( $nb_p <= 0)
                        <span style="padding-left: 40%; color:tomato" align="center" class="text-center">Aucune information trouvée</span>
                        @endif
                    </p>
                    <br/>
                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $bureaux_promo->links() }}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection