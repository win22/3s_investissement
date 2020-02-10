@extends('backend.admin_layout')
@section('contenu')

<div class="col-lg-12">
    <p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
    <div class="card card-dark ">
        <div class="card-header">
            <h5 class="m-0">Villa</h5>
            <p>Liste des villas par catégorie</p>
        </div>
        <div class="card-body">
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" href="#p1" data-toggle="tab">A louer</a>
                <a class="nav-item nav-link" href="#p2" data-toggle="tab">A vendre</a>
                <a class="nav-item nav-link" href="#p3" data-toggle="tab">Promotion</a>
            </nav>
            <div class="tab-content p-3">
                <div class="tab-pane fade show active" id="p1">
                    <p>Vous etes dans l'onglet qui affiche les villa qui sont à <span class="text-warning">louer</span> sur votre site !</p>
                    <div class="row">
                        @foreach($all_villa as $villa)
                        <div class="col-md-4 p-2">
                            <div class="card card-success1 card-outline1">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div style="color: white !important; " class="ribbon bg-danger text-white">
                                        Louer
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{ $villa['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 40px">
                                        <h2 style="padding: 10px;" class="badge badge-danger float-left">{{
                                            $villa['prix'] }}
                                            @if($villa['devise'] == 1)
                                            CFA
                                            @elseif($villa['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="{{ route('detail', array('test' => $villa->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $villa['name']
                                            }}</h6></a>
                                    <span class="text-orange small">Déscription rapide</span><br/>
                                    <span>{{ $villa['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $villa['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $villa['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($villa['status'] == 1)
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
                                        <span class="small"> {{  \Carbon\Carbon::parse($villa['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($villa['status'] == 1)
                                        <a href="{{ route('desactive', array('test' => $villa->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active', array('test' => $villa->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner', array('select' =>$villa->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer', array('test' => $villa->id)) }}" id="delete"
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
                        @if($nb>0)
                        Total des informations : <span id="total_records">{{ $nb }}</span>
                        @else
                        <span align="center" class="text-center">Aucune information trouvé</span>
                        @endif
                    </p>

                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $all_villa->links() }}

                        </ul>
                    </div>
                </div>
                <div class="tab-pane" id="p2">
                    Vous etes dans l'onglet qui affiche les villas qui sont à <span class="text-info">vendre</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($all_villa_vendre as $villa)
                        <div class="col-md-4 p-2">
                            <div class="card card-success1 card-outline1">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div style="color: white !important;" class="ribbon bg-info text-white">
                                        Vendre
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{$villa['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 40px">
                                        <h2 style="padding: 10px;" class="badge badge-danger float-left">{{
                                            $villa['prix'] }}
                                            @if($villa['devise'] == 1)
                                            CFA
                                            @elseif($villa['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body"> <a href="{{ route('detail', array('test' => $villa->id)) }}"> <h6 class="widget-user-desc p-1 float-right"> {{ $villa['name']
                                            }}</h6></a>
                                    <span class="text-orange small">Déscription rapide</span><br/>
                                    <span>{{ $villa['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                           <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                    <span>{{ $villa['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $villa['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($villa['status'] == 1)
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
                                       <span class="small"> {{ \Carbon\Carbon::parse($villa['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($villa['status'] == 1)
                                        <a href="{{ route('desactive', array('test' => $villa->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active', array('test' => $villa->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner', array('select' =>$villa->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer', array('test' => $villa->id)) }}" id="delete"
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
                        @if($nb_v>0)
                        Total des informations : <span id="total_records">{{ $nb_v }}</span>
                        @else
                        <span align="center" class="text-center">Aucune information trouvé</span>
                        @endif
                    </p>

                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $all_villa_vendre->links() }}

                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade show" id="p3">
                    Vous etes dans l'onglet qui affiche les villas qui sont en <span class="text-info">Promotions</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($all_villa_sold as $villa)
                        <div class="col-md-4">
                            <div class="card  card-success1 card-outline1">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">
                                        Promo
                                    </div>
                                </div>
                                <div class="card-header"
                                     style="background: url({{$villa['image'] }}) center center; height: 130px !important;">

                                    <div style="padding-top: 40px">
                                        <h2 style="padding: 10px;" class="badge badge-danger float-left">{{
                                            $villa['prix'] }}
                                            @if($villa['devise'] == 1)
                                            CFA
                                            @elseif($villa['devise'] == 2)
                                            EURO
                                            @else
                                            $
                                            @endif
                                        </h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                     <a href="{{ route('detail', array('test' => $villa->id)) }}"> <h6 class="widget-user-desc p-1 float-right"> {{ $villa['name']
                                                }}</h6></a>
                                    <span class="text-orange small">Déscription rapide</span><br/>
                                    <span>{{ $villa['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $villa['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $villa['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($villa['status'] == 1)
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
                                            @if($villa['type'] == 1)
                                            <span>A louer</span>
                                            @else
                                            <span>A vendre</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row td-actions text-center float-right">
                                        @if($villa['status'] == 1)
                                        <a href="{{ route('desactive', array('test' => $villa->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active', array('test' => $villa->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="{{ route('selectionner', array('select' =>$villa->id)) }}" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer', array('test' => $villa->id)) }}" id="delete"
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
                        @if($nb_s>0)
                        Total des informations : <span id="total_records">{{ $nb_s }}</span>
                        @else
                        <span class="text-center">Aucune information trouvé</span>
                        @endif
                    </p>

                    <div class="card-tools">

                        <ul class="pagination pagination-sm float-right">
                            {{ $all_villa_sold->links() }}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection