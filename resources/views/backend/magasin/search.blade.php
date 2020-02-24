@extends('backend.admin_layout')
@section('contenu')

<div class="col-lg-12 reveal">
    <p hidden> {{ \Carbon\Carbon::setLocale('fr') }}</p>
    <div class="card card-dark  ">
        <div class="card-header">
            <div class="float-left">
                <h5 class="m-0">Recherche</h5>
                <p>Voici le resultat de votre recherche</p>
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
            <div class="row">
                @foreach($magasins as $magasin)
                <div class="col-md-4 p-2">
                    <div class="card carde dropdown-hover animated-dropdown-menu">
                        <div class="ribbon-wrapper sm ribbon">
                            @if($magasin['sold'] == 1)
                            <div style="color: white !important;" class="ribbon bg-success text-white">
                                <span class="sm">Promo</span>
                            </div>
                            @elseif($magasin['sold'] == 1 || $magasin['sold'] == 2 && $magasin['option'] == 2)
                            <div style="color: white !important;" class="ribbon bg-blue text-white">
                                <span class="sm">Vendre</span>
                            </div>
                            @elseif($magasin['sold'] == 1 || $magasin['sold'] == 2 && $magasin['option'] == 1)
                            <div style="color: white !important;" class="ribbon bg-danger text-white">
                                <span class="sm">Louer</span>
                            </div>
                            @endif
                        </div>
                        <div class="card-header"
                             style="background: url({{$magasin['image'] }}) center center; background-position: cover; height: 130px !important;">

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
            <p style="padding-left: 40%; color:tomato" class="card-text md-2">
                @if($nb<=0)
                <span class="">Aucune information trouvé</span>
                @endif
            </p>
            </p>

            <div class="card-tools">

                <ul class="pagination pagination-sm float-right">
                    {{ $magasins->links() }}

                </ul>
            </div>
            <div class="float-left">
                <a href="{{ route('magasins')}}" class="btn btn-danger ">
                    <i class="fas fa-backspace fa-lg mr-2"></i>
                    Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection