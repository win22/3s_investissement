@extends('backend.admin_layout')
@section('contenu')
<p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
<div class="card card-solid card-success1 fade show card-outline1">
    <div class="card-body fade show">
        <div class="ribbon-wrapper ribbon-lg">
            @if($immeub['sold'] == 1)
            <div style="color: white !important;" class="ribbon bg-success text-white">
                Promo
            </div>
            @elseif($immeub['sold'] == 1 || $immeub['sold'] == 2 && $immeub['option'] == 2)
            <div style="color: white !important;" class="ribbon bg-blue text-white">
                A vendre
            </div>
            @elseif($immeub['sold'] == 1 || $immeub['sold'] == 2 && $immeub['option'] == 1)
            <div style="color: white !important;" class="ribbon bg-danger text-white">
                A louer
            </div>
            @endif
        </div>
        <div class="row reveal">
            <div class="col-12 col-sm-6">
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner shadow">
                            @foreach($immeub->images as $image)
                            <div class="carousel-item @if($loop->first) elevation-3 active @endif">
                                <img class="d-block w-100 " style="width: 600px !important;" src="{{ URL::to($image['image']) }}" alt="slide">
                            </div>
                            @endforeach
                            <div class="carousel-item elevation-3">
                                <img class="d-block w-100" style="width: 600px !important;" src="{{ URL::to($immeub['image']) }}" alt="slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 reveal-2">
                <h3 class="my-3">{{ $immeub->name }} <br/>
                    @if( ($immeub['sold']) == 1 )
                    <span style="color: limegreen; font-family: 'Manjari Regular'">{{ $immeub['pourcentage'] }} de réduction</span>
                    @endif
                </h3>
                <span class="small text-orange">Petite description :</span><br/>
                <p>{{ $immeub->short_description }}</p>
                <hr>
                <div class="bg-gray py-2 px-3 btn-rounded">
                    <h2 class="mb-0">
                        {{ $immeub['prix'] }}
                        @if($immeub['devise'] == 1)
                        CFA
                        @elseif($immeub['devise'] == 2)
                        EURO
                        @else
                        $
                        @endif
                    </h2>
                </div>
                <br/>
                <div class="row">
                    <div class="col-md-4">
                        <span class="small text-orange">Adresse:</span><br/>
                        <span>{{ $immeub['adresse'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Ville:</span><br/>
                        <span>{{ $immeub['ville'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Pays:</span><br/>
                        <span>{{ $immeub['pays'] }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span class="small text-orange">Type:</span><br/>
                        <span>{{ $immeub['type'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Option:</span><br/>
                        @if($immeub['option'] == 1)
                        <span>A louer</span>
                        @elseif($immeub['devise'] == 2)
                        EURO
                        <span>A vendre</span>
                        $
                        @endif
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Allignement sur le site :</span><br/>
                        @if($immeub['align'] == 10)
                        <span class="badge badge-danger">0</span>
                        @else
                        <span class="badge badge-danger">{{ $immeub['align'] }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span class="small text-orange">Chambre:</span><br/>
                        <span>{{ $immeub['chambre'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Cuisines:</span><br/>
                        <span>{{ $immeub['cuisine'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Salle de bain:</span><br/>
                        <span>{{ $immeub['sale_de_bain'] }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span class="small text-orange">Garage:</span><br/>
                        <span>{{ $immeub['garage'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Salon:</span><br/>
                        <span>{{ $immeub['salon'] }}</span>
                    </div>
                </div>
                <br/>
            </div>
            <div style="padding-top: 10px" class="row reveal-3">
                <nav class="nav nav-tabs">
                    <a class="nav-item nav-link active" href="#p1" data-toggle="tab">Large description</a>
                    <div class="tab-content p-3">
                        <div class="tab-pane fade show active" id="p1">
                            {{ $immeub['large_description'] }}
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="float-right">
            <div class="mt-3">
                <a href="{{ route('selectionner_im', array('select' =>$immeub->id)) }}" class="btn btn-primary ">
                    <i class="fas fa-edit fa-lg mr-2"></i>
                    Modifier
                </a>
                <a href="{{ route('immeubles')}}" class="btn btn-danger ">
                    <i class="fas fa-backspace fa-lg mr-2"></i>
                    Retour
                </a>
            </div>
        </div>
        <div class="float-left">
            <span class="small">Modifié {{  \Carbon\Carbon::parse($immeub['updated_at'])->diffForHumans() }}
             par
                @if($admin_name['name'] == null)
                un utilisateur qui n'existe plus dans la base de donnée
                @else
                {{ $admin_name['name']}}
                @endif
            </span>
        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection