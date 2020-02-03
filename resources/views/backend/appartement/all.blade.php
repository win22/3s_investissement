@extends('backend.admin_layout')
@section('contenu')

<div class="col-lg-12">
    <p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
    <div class="card card-dark ">
        <div class="card-header">
            <h5 class="m-0">Appartements</h5>
            <p>Liste des appartements par catégorie</p>
        </div>
        <div class="card-body">
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" href="#p1" data-toggle="tab">A louer</a>
                <a class="nav-item nav-link" href="#p2" data-toggle="tab">A vendre</a>
                <a class="nav-item nav-link" href="#p3" data-toggle="tab">Promotion</a>
            </nav>
            <div class="tab-content p-3">
                <div class="tab-pane fade show active" id="p1">
                    Vous etes dans l'onglet qui affiche les appartements qui sont à <span class="text-warning">louer</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($all_appart as $appart)
                        <div class="col-md-4 p-2">
                            <div class="card card-success1 card-outline1">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div style="color: white !important;" class="ribbon bg-danger text-white">
                                        Louer
                                    </div>
                                </div>
                                <a href="{{ route('detail', array('test' => $appart->id)) }}"> <h6 class="widget-user-desc p-1"> {{ $appart['name']
                                        }}</h6></a>
                                <div class="card-header"
                                     style="background: url({{$appart['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 40px">
                                        <h2 style="padding: 10px;" class="badge badge-danger float-right">{{
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
                                    Description:<br/>
                                    <span>{{ $appart['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <i style="color: orangered !important;" class="fas fa-map-marker-alt"></i>&nbsp;
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
                                            <i style="color: green  !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            <span class="text-success">Activé</span>
                                            @else
                                            <i style="color: #da2839 !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            <span class="text-danger">Désactivé</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-left">
                                        <span class="small"> {{  \Carbon\Carbon::parse($appart['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($appart['status'] == 1)
                                        <a href="{{ route('desactive', array('test' => $appart->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active', array('test' => $appart->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="#" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer', array('test' => $appart->id)) }}" id="delete"
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
                            {{ $all_appart->links() }}

                        </ul>
                    </div>
                </div>
                <div class="tab-pane" id="p2">
                    Vous etes dans l'onglet qui affiche les appartements qui sont à <span class="text-info">vendre</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($all_appart_vendre as $appart)
                        <div class="col-md-4 p-2">
                            <div class="card card-success1 card-outline1">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div style="color: white !important;" class="ribbon bg-info text-white">
                                        Vendre
                                    </div>
                                </div>
                                <a href="{{ route('detail', array('test' => $appart->id)) }}"> <h6 class="widget-user-desc p-1"> {{ $appart['name']
                                        }}</h6></a>
                                <div class="card-header"
                                     style="background: url({{$appart['image'] }}) center center; background-position: cover; height: 130px !important;">

                                    <div style="padding-top: 40px">
                                        <h2 style="padding: 10px;" class="badge badge-danger float-right">{{
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
                                    Description:<br/>
                                    <span>{{ $appart['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <i style="color: orangered !important;" class="fas fa-map-marker-alt"></i>&nbsp;
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
                                            <i style="color: green  !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            <span class="text-success">Activé</span>
                                            @else
                                            <i style="color: #da2839 !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            <span class="text-danger">Désactivé</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-left">
                                       <span class="small"> {{ \Carbon\Carbon::parse($appart['updated_at'])->diffForHumans() }}</span>
                                    </div>
                                    <div class="row td-actions text-center float-right">
                                        @if($appart['status'] == 1)
                                        <a href="{{ route('desactive', array('test' => $appart->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active', array('test' => $appart->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="#" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer', array('test' => $appart->id)) }}" id="delete"
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
                            {{ $all_appart_vendre->links() }}

                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade show" id="p3">
                    Vous etes dans l'onglet qui affiche les appartements qui sont en <span class="text-info">Promotions</span> sur votre site ! <br/>
                    <div class="row">
                        @foreach($all_appart_sold as $appart)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="ribbon-wrapper ribbon-lg">
                                    <div class="ribbon bg-success">
                                        Promo
                                    </div>
                                </div>
                                <a href="{{ route('detail', array('test' => $appart->id)) }}"><h6 class="widget-user-desc p-1 container text-left">{{ $appart['name']
                                        }}</h6></a>
                                <div class="card-header"
                                     style="background: url({{$appart['image'] }}) center center; height: 130px !important;">

                                    <div style="padding-top: 40px">
                                        <h2 style="padding: 10px;" class="badge badge-danger float-right">{{
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
                                    <i style="color: orangered !important;" class="fas fa-info-circle"></i>
                                    <span>{{ $appart['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <i style="color: orangered !important;" class="fas fa-map-marker-alt"></i>&nbsp;
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
                                            <i style="color: green  !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            <span class="text-success">Activé</span>
                                            @else
                                            <i style="color: #da2839 !important;" class="fas fa-shield-alt"></i>&nbsp;
                                            <span class="text-danger">Désactivé</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;"is=""  class="nav-icon fas fa-store-alt"></i>
                                            @if($appart['type'] == 1)
                                            <span>A louer</span>
                                            @else
                                            <span>A vendre</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row td-actions text-center float-right">
                                        @if($appart['status'] == 1)
                                        <a href="{{ route('desactive', array('test' => $appart->id)) }}"
                                           class="btn btn-dark btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                        </a>
                                        @else
                                        <a href="{{ route('active', array('test' => $appart->id)) }}"
                                           class="btn btn-success btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                        </a>
                                        @endif
                                        &nbsp;
                                        <a href="#" class="btn btn-warning btn-link btn-sm">
                                            <i style="color: white !important;" class="fas fa-edit"></i>
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('supprimer', array('test' => $appart->id)) }}" id="delete"
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
                            {{ $all_appart_sold->links() }}

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection