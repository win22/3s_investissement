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
            <form class="form-inline ml-3" action="{{ route('search_admin_im') }}" method="post">
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
                @foreach($immeubs as $immeub)
                <div class="col-md-4 p-2">
                    <div class="card carde dropdown-hover animated-dropdown-menu">
                        <div class="ribbon-wrapper sm ribbon">
                            @if($immeub['sold'] == 1)
                            <div style="color: white !important;" class="ribbon bg-success text-white">
                                <span class="sm">Promo</span>
                            </div>
                            @elseif($immeub['sold'] == 1 || $immeub['sold'] == 2 && $immeub['option'] == 2)
                            <div style="color: white !important;" class="ribbon bg-blue text-white">
                                <span class="sm">Vendre</span>
                            </div>
                            @elseif($immeub['sold'] == 1 || $immeub['sold'] == 2 && $immeub['option'] == 1)
                            <div style="color: white !important;" class="ribbon bg-danger text-white">
                                <span class="sm">Louer</span>
                            </div>
                            @endif
                        </div>
                        <div class="card-header"
                             style="background: url({{$immeub['image'] }}) center center; background-position: cover; height: 130px !important;">

                            <div style="padding-top: 103px">
                                <h2 style="padding: 10px;" class="badge badge-info float-left">{{
                                    $immeub['prix'] }}
                                    @if($immeub['devise'] == 1)
                                    CFA
                                    @elseif($immeub['devise'] == 2)
                                    EURO
                                    @else
                                    $
                                    @endif
                                </h2>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('detail_immeub', array('test' => $immeub->id)) }}"> <h6 class="widget-user-desc float-right"> {{ $immeub['name']
                                    }}</h6></a><br/>
                            <span>{{ $immeub['short_description'] }}
                                    <div class="row">
                                        <div class="col-md-8">
                                            <span class="small">
                                                <i style="color: deepskyblue !important;" class="fas fa-map-marker-alt"></i>&nbsp;
                                            </span>
                                            <span>{{ $immeub['adresse'] }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i style="color: #05d7ff  !important;" class="fas fa-globe-africa"></i>&nbsp;
                                            <span>{{ $immeub['pays'] }}</span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            @if($immeub['status'] == 1)
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
                                <span class="small"> Modifier {{  \Carbon\Carbon::parse($immeub['updated_at'])->diffForHumans() }}</span>
                            </div>
                            <div class="row td-actions text-center float-right">
                                @if($immeub['status'] == 1)
                                <a href="{{ route('desactive_immeubles', array('test' => $immeub->id)) }}"
                                   class="btn btn-dark btn-link btn-sm">
                                    <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                </a>
                                @else
                                <a href="{{ route('active_immeubles', array('test' => $immeub->id)) }}"
                                   class="btn btn-success btn-link btn-sm">
                                    <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                </a>
                                @endif
                                &nbsp;
                                <a href="{{ route('selectionner_im', array('select' =>$immeub->id)) }}" class="btn btn-warning btn-link btn-sm">
                                    <i style="color: white !important;" class="fas fa-edit"></i>
                                </a>
                                &nbsp;
                                <a href="{{ route('supprimer_im', array('test' => $immeub->id)) }}" id="delete"
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
                    {{ $immeubs->links() }}

                </ul>
            </div>
            <div class="float-left">
                <a href="{{ route('immeubles')}}" class="btn btn-danger ">
                    <i class="fas fa-backspace fa-lg mr-2"></i>
                    Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection