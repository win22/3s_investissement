@extends('backend.admin_layout')
@section('contenu')

<div class="col-lg-12 reveal">
    <p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
    <div class="card card-dark  ">
        <div class="card-header">
            <div class="float-left">
                <h5 class="m-0">Magasin</h5>
                <p>Liste des magasins par catégorie</p>
            </div>

            <div style="padding-top: 20px" class="float-right">
                <form class="form-inline ml-3" action="{{ route('search_admin_mag') }}" method="post">
                    @csrf
                    <div class="input-group input-group-sm">
                        <input required class="form-control form-control-navbar" type="search" name="search" placeholder="Recherche" aria-label="Search">
                        <div class="input-group-append">
                            <button style="background-color: white" class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card-body">
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" href="#p1" data-toggle="tab">A louer</a>
                <a class="nav-item nav-link" href="#p2" data-toggle="tab">A vendre</a>
                <a class="nav-item nav-link" href="#p3" data-toggle="tab">Promotion</a>
            </nav>
            <div class="tab-content p-3">
                <div class="tab-pane fade show active" id="p1">
                    <p>Vous etes dans l'onglet qui affiche les magasins qui sont à <span class="text-warning">louer</span> sur votre site !</p>
                    <div class="row">
                        @foreach($magasins_louer as $magasin)
                        <div class="col-md-4 p-2">
                            <div class="card carde dropdown-hover animated-dropdown-menu">
                                <div class="ribbon-wrapper sm ribbon">
                                    <div style="color: white !important; " class="ribbon bg-danger text-white">
                                        <span class="small" style="font-family: 'Manjari Bold'">A louer</span>
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{ $magasin['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $magasin['prix'] }}
                                            @if($magasin['devise'] == 1)
                                            CFA
                                            @elseif($magasin['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_magasin', array('test' => $magasin->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $magasin['name']
                                            }}</h6></a><br/>
                                    <span>{{ $magasin['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $magasin['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $magasin['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($magasin['status'] == 1)
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
                                        <span class="small"> Modifier {{  \Carbon\Carbon::parse($magasin['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($magasin['status'] == 1)
                                        <a href="{{ route('desactive_magasins', array('test' => $magasin->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_magasins', array('test' => $magasin->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_mag', array('select' =>$magasin->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_mag', array('test' => $magasin->id)) }}" id="delete"
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
                            {{ $magasins_louer->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade " id="p2">
                    <p>Vous etes dans l'onglet qui affiche les magasins qui sont à <span class="text-warning">vendre</span> sur votre site !</p>
                    <div class="row">
                        @foreach($magasins_vendre as $magasin_v)
                        <div class="col-md-4 p-2">
                            <div class="card carde dropdown-hover animated-dropdown-menu">
                                <div class="ribbon-wrapper sm ribbon">
                                    <div style="color: white !important; " class="ribbon bg-danger text-white">
                                        <span class="small" style="font-family: 'Manjari Bold'">A louer</span>
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{ $magasin_v['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $magasin_v['prix'] }}
                                            @if($magasin_v['devise'] == 1)
                                            CFA
                                            @elseif($magasin_v['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_magasin', array('test' => $magasin_v->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $magasin_v['name']
                                            }}</h6></a><br/>
                                    <span>{{ $magasin_v['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $magasin_v['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $magasin_v['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($magasin_v['status'] == 1)
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
                                        <span class="small"> Modifier {{  \Carbon\Carbon::parse($magasin_v['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($magasin_v['status'] == 1)
                                        <a href="{{ route('desactive_magasins', array('test' => $magasin_v->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_magasins', array('test' => $magasin_v->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_mag', array('select' =>$magasin_v->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_mag', array('test' => $magasin_v->id)) }}" id="delete"
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
                            {{ $magasins_vendre->links() }}
                        </ul>
                    </div>
                </div>
                <div class="tab-pane show" id="p3">
                    Vous etes dans l'onglet qui affiche les magasins qui sont en <span class="text-info">Promotions</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($magasins_promo as $magasin_p)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">
                                        Promo
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{$magasin_p['image'] }}) center center; height: 130px !important;">
                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $magasin_p['prix'] }}
                                            @if($magasin_p['devise'] == 1)
                                            CFA
                                            @elseif($magasin_p['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_magasin', array('test' => $magasin_p->id)) }}"> <h6 class="widget-user-desc p-1 float-right"> {{ $magasin_p['name']
                                            }}</h6></a>
                                    <span class="text-orange small">Déscription rapide</span><br/>
                                    <span>{{ $magasin_p['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $magasin_p['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $magasin_p['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($magasin_p['status'] == 1)
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
                                            @if($magasin_p['type'] == 1)
                                            <span>A louer</span>
                                            @else
                                            <span>A vendre</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row td-actions text-center float-right">
                                        @if($magasin_p['status'] == 1)
                                        <a href="{{ route('desactive_magasins', array('test' => $magasin_p->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_magasins', array('test' => $magasin_p->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_mag', array('select' =>$magasin_p->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_mag', array('test' => $magasin_p->id)) }}" id="delete"
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
                            {{ $magasins_promo->links() }}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection