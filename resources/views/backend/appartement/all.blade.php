@extends('backend.admin_layout')
@section('contenu')

<div class="col-lg-12 reveal">
    <p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
    <div class="card card-dark  ">
        <div class="card-header">
            <div class="float-left">
                <h5 class="m-0">Appartements</h5>
                <p>Liste des appartements par catégorie</p>
            </div>
            <div style="padding-top: 20px" class="float-right">
                <form class="form-inline ml-3" action="{{ route('search_admin_ap') }}" method="post">
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
                    <p>Vous etes dans l'onglet qui affiche les appartements qui sont à <span class="text-warning">louer</span> sur votre site !</p>
                    <div class="row">
                        @foreach($all_appart as $appart)
                        <div class="col-md-4 p-2">
                            <div class="card carde dropdown-hover animated-dropdown-menu">
                                <div class="ribbon-wrapper sm ribbon">
                                    <div style="color: white !important; " class="ribbon bg-danger text-white">
                                        <span class="small" style="font-family: 'Manjari Bold'">A louer</span>
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{$appart['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $appart['prix'] }}
                                            @if($appart['devise'] == 1)
                                            CFA
                                            @elseif($appart['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail_appart', array('test' => $appart->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $appart['name']
                                            }}</h6></a><br/>
                                    <span>{{ $appart['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $appart['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $appart['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($appart['status'] == 1)
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
                                        <span class="small"> Modifier {{  \Carbon\Carbon::parse($appart['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($appart['status'] == 1)
                                        <a href="{{ route('desactive_ap', array('test' => $appart->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_ap', array('test' => $appart->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_ap', array('select' =>$appart->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_ap', array('test' => $appart->id)) }}" id="delete"
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
                    <p style="padding-left: 40%; color:tomato" class="card-text md-2">
                        @if($nb<=0)
                        <span class="">Aucune information trouvé</span>
                        @endif
                    </p>
                    </p>

                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $all_appart->links() }}

                        </ul>
                    </div>
                </div>
                <div class="tab-pane" id="p2">
                    Vous etes dans l'onglet qui affiche les appartements qui sont à <span class="text-info">vendre</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($all_appart_vendre as $appart_v)
                        <div class="col-md-4 p-2">
                            <div class="card carde">
                                <div class="ribbon-wrapper sm ribbon">
                                    <div style="color: white !important; " class="ribbon bg-success text-white">
                                        <span class="small" style="font-family: 'Manjari Bold'">A Vendre</span>
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{$appart_v['image'] }}) center center; background-position: cover; height: 130px !important;">
                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $appart_v['prix'] }}
                                            @if($appart_v['devise'] == 1)
                                            CFA
                                            @elseif($appart_v['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body"> <a href="{{ route('detail_appart', array('test' => $appart_v->id)) }}">
                                        <h6 class="widget-user-desc p-1 float-right"> {{ $appart_v['name']
                                            }}</h6></a>
                                  <br/>
                                    <span>{{ $appart_v['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                           <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                    <span>{{ $appart_v['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $appart_v['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($appart_v['status'] == 1)
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
                                       <span class="small"> Modifié {{ \Carbon\Carbon::parse($appart_v['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($appart_v['status'] == 1)
                                        <a href="{{ route('desactive_ap', array('test' => $appart_v->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_ap', array('test' => $appart_v->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_ap', array('select' =>$appart_v->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_ap', array('test' => $appart_v->id)) }}" id="delete"
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
                    <p style="padding-left: 40%; color:tomato" class="card-text md-2">
                        @if($nb_v<=0)
                        <span class="">Aucune information trouvé</span>
                        @endif
                    </p>
                    </p>

                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $all_appart_vendre->links() }}

                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade show" id="p3">
                    Vous etes dans l'onglet qui affiche les appartements qui sont en <span class="text-info">Promotions</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($all_appart_sold as $appart_p)
                        <div class="col-md-4">
                            <div class="card carde">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">
                                        Promo
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{$appart_p['image'] }}) center center; height: 130px !important;">

                                    <div style="padding-top: 103px">
                                        <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                            $appart_p['prix'] }}
                                            @if($appart_p['devise'] == 1)
                                            CFA
                                            @elseif($appart_p['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                     <a href="{{ route('detail_appart', array('test' => $appart_p->id)) }}">
                                         <h6 class="widget-user-desc p-1 float-right"> {{ $appart_p['name']
                                                }}</h6></a>
                                    <span class="text-orange small">Déscription rapide</span><br/>
                                    <span>{{ $appart_p['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $appart_p['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $appart_p['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($appart_p['status'] == 1)
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
                                            @if($appart_p['type'] == 1)
                                            <span>A louer</span>
                                            @else
                                            <span>A vendre</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row td-actions text-center float-right">
                                        @if($appart_p['status'] == 1)
                                        <a href="{{ route('desactive_ap', array('test' => $appart_p->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active_ap', array('test' => $appart_p->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner_ap', array('select' =>$appart_p->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer_ap', array('test' => $appart_p->id)) }}" id="delete"
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
                    <p style="padding-left: 40%; color:tomato" class="card-text md-2">
                        @if($nb_s<=0)
                        <span class="">Aucune information trouvé</span>
                        @endif
                    </p>
                    </p>

                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $all_appart_sold->links() }}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection