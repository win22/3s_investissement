@extends('backend.admin_layout')
@section('contenu')
<p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
<div class="card card-solid card-success1 fade show card-outline1">
    <div class="card-body fade show">
        <div class="ribbon-wrapper ribbon-lg">
            @if($terrain['sold'] == 1)
            <div style="color: white !important;" class="ribbon bg-success text-white">
                Promo
            </div>
            @elseif($terrain['sold'] == 1 || $terrain['sold'] == 2 && $terrain['option'] == 2)
            <div style="color: white !important;" class="ribbon bg-blue text-white">
                A vendre
            </div>
            @elseif($terrain['sold'] == 1 || $terrain['sold'] == 2 && $terrain['option'] == 1)
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
                            @foreach($terrain->images as $image)
                            <div class="carousel-item @if($loop->first) elevation-3 active @endif">
                                <img class="d-block w-100 " style="width: 600px !important;" src="{{ URL::to($image['image']) }}" alt="slide">
                            </div>
                            @endforeach
                            <div class="carousel-item elevation-3">
                                <img class="d-block w-100" style="width: 600px !important;" src="{{ URL::to($terrain['image']) }}" alt="slide">
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
                <h3 class="my-3">{{ $terrain->name }}
                    <br/>
                    @if( ($terrain['sold']) == 1 )
                    <span style="color: limegreen; font-family: 'Manjari Regular'">{{ $terrain['pourcentage'] }} de réduction</span>
                    @endif
                </h3>
                <span class="small text-orange">Petite description :</span><br/>
                <p>{{ $terrain->short_description }}</p>
                <hr>
                <div class="bg-gray py-2 px-3 btn-rounded">
                    <h2 class="mb-0">
                        {{ $terrain['prix'] }}
                        @if($terrain['devise'] == 1)
                        CFA
                        @elseif($terrain['devise'] == 2)
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
                        <span>{{ $terrain['adresse'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Ville:</span><br/>
                        <span>{{ $terrain['ville'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Pays:</span><br/>
                        <span>{{ $terrain['pays'] }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span class="small text-orange">Type:</span><br/>
                        <span>{{ $terrain['type'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Option:</span><br/>
                        @if($terrain['option'] == 1)
                        <span>A louer</span>
                        @elseif($terrain['devise'] == 2)
                        EURO
                        <span>A vendre</span>
                        $
                        @endif
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Allignement sur le site :</span><br/>
                        @if($terrain['align'] == 10)
                        <span class="badge badge-danger">0</span>
                        @else
                        <span class="badge badge-danger">{{ $terrain['align'] }}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span class="small text-orange">Chambre:</span><br/>
                        <span>{{ $terrain['chambre'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Cuisines:</span><br/>
                        <span>{{ $terrain['cuisine'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Salle de bain:</span><br/>
                        <span>{{ $terrain['sale_de_bain'] }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span class="small text-orange">Garage:</span><br/>
                        <span>{{ $terrain['garage'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Salon:</span><br/>
                        <span>{{ $terrain['salon'] }}</span>
                    </div>
                </div>
                <br/>
            </div>
            <div style="padding-top: 10px" class="row reveal-3">
                <nav class="nav nav-tabs">
                    <a class="nav-item nav-link active" href="#p1" data-toggle="tab">Large description</a>
                    <div class="tab-content p-3">
                        <div class="tab-pane fade show active" id="p1">
                            {{ $terrain['large_description'] }}
                        </div>
                    </div>
                </nav>
            </div>
            <div class="mt-3">
                <a href="{{ route('selectionner_terre', array('select' =>$terrain->id)) }}" class="btn btn-primary ">
                    <i class="fas fa-edit fa-lg mr-2"></i>
                    Modifier
                </a>
                <a href="{{ route('terrains')}}" class="btn btn-danger ">
                    <i class="fas fa-backspace fa-lg mr-2"></i>
                    Retour
                </a>
            </div>
        </div>
        <div class="float-right">
            <span class="small">Modifié {{  \Carbon\Carbon::parse($terrain['updated_at'])->diffForHumans() }}
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