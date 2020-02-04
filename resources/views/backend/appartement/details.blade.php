@extends('backend.admin_layout')
@section('contenu')
<p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
<div class="card card-solid card-success1 fade show card-outline1">
    <div class="card-body fade show">
        <div class="ribbon-wrapper ribbon-lg">
            @if($appart['sold'] == 1)
            <div style="color: white !important;" class="ribbon bg-success text-white">
                Promo
            </div>
            @elseif($appart['sold'] == 1 || $appart['sold'] == 2 && $appart['option'] == 2)
            <div style="color: white !important;" class="ribbon bg-blue text-white">
                A vendre
            </div>
            @elseif($appart['sold'] == 1 || $appart['sold'] == 2 && $appart['option'] == 1)
            <div style="color: white !important;" class="ribbon bg-danger text-white">
                A louer
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12 col-sm-6">
                <div class="col-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner shadow">

                            @foreach($appart->images as $image)
                            <div class="carousel-item @if($loop->first) elevation-3 active @endif">
                                <img class="d-block w-100 " style="width: 600px !important;" src="{{ URL::to($image['image']) }}" alt="slide">
                            </div>
                            @endforeach
                            <div class="carousel-item elevation-3">
                                <img class="d-block w-100" style="width: 600px !important;" src="{{ URL::to($appart['image']) }}" alt="slide">
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
            <div class="col-12 col-sm-6">
                <h3 class="my-3">{{ $appart->name }}</h3>
                <span class="small text-orange">Petite description :</span><br/>
                <p>{{ $appart->short_description }}</p>
                <hr>
                <div class="bg-gray py-2 px-3 btn-rounded">
                    <h2 class="mb-0">
                        {{ $appart['prix'] }}
                        @if($appart['devise'] == 1)
                        CFA
                        @elseif($appart['devise'] == 2)
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
                        <span>{{ $appart['adresse'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Ville:</span><br/>
                        <span>{{ $appart['ville'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Pays:</span><br/>
                        <span>{{ $appart['pays'] }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span class="small text-orange">Type:</span><br/>
                        <span>{{ $appart['type'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Option:</span><br/>
                        @if($appart['option'] == 1)
                        <span>A louer</span>
                        @elseif($appart['devise'] == 2)
                        EURO
                        <span>A vendre</span>
                        $
                        @endif
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Allignement sur le site :</span><br/>
                        <span class="badge badge-danger">{{ $appart['align'] }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span class="small text-orange">Chambre:</span><br/>
                        <span>{{ $appart['chambre'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Cuisines:</span><br/>
                        <span>{{ $appart['cuisine'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Salle de bain:</span><br/>
                        <span>{{ $appart['sale_de_bain'] }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <span class="small text-orange">Garage:</span><br/>
                        <span>{{ $appart['garage'] }}</span>
                    </div>
                    <div class="col-md-4">
                        <span class="small text-orange">Salon:</span><br/>
                        <span>{{ $appart['salon'] }}</span>
                    </div>
                </div>
                <br/>
            </div>
            <div class="row">
                <nav class="nav nav-tabs">
                    <a class="nav-item nav-link active" href="#p1" data-toggle="tab">Large description</a>
                    <div class="tab-content p-3">
                        <div class="tab-pane fade show active" id="p1">
                            {{ $appart['large_description'] }}
                        </div>
                    </div>
                </nav>
            </div>
            <div class="mt-4">
                <a href="{{ route('selectionner', array('select' =>$appart->id)) }}" class="btn btn-primary float-right">
                    <i class="fas fa-edit fa-lg mr-2"></i>
                    Modifier
                </a>
            </div>
        </div>
        <div class="float-right">
            <span class="small">Modifié {{  \Carbon\Carbon::parse($appart['updated_at'])->diffForHumans() }}
             par {{$admin_name['name']}}
            </span>

        </div>
    </div>
    <!-- /.card-body -->
</div>
@endsection