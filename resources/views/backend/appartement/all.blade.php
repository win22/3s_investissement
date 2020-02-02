@extends('backend.admin_layout')
@section('contenu')

<div class="col-lg-12">

    <div class="card card-orange card-outline ">
        <div class="card-header">
            <h5 class="m-0">Appartements</h5>
            <p>Voici la liste des appartements de l'application</p>
        </div>
        <div class="card-body">
            <nav class="nav nav-tabs">
                <a class="nav-item nav-link active" href="#p1" data-toggle="tab">A vendre</a>
                <a class="nav-item nav-link" href="#p2" data-toggle="tab">A louer</a>
            </nav>

            <div class="tab-content p-3">
                <div class="tab-pane active" id="p1">
                    <div class="row">
                        @foreach($all_appart as $appart)
                        <div class="col-md-4" >
                            <!-- Widget: user widget style 1 -->
                            <div class="card">
                                <div class="card-header" style="background: url({{$appart['image'] }}) center center; height: 130px !important;">
                                    <div class="widget-user-header text-white"
                                    <h2 class="widget-user-desc text-right">{{ $appart['name'] }}</h2></div>
                                <div style="padding-top: 40px">
                                    <h2 style="padding: 10px;"  class="badge badge-danger float-right">{{ $appart['prix'] }}
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
                                <p>Petite description:<br/>
                                    {{ $appart['short_description'] }}</p>
                                <!-- /.row -->
                                <div class="row">
                                    <div class="col-md-8">
                                        <i  style="color: orangered !important;" class="fas fa-map-marker-alt"></i>&nbsp;
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
                                        <i  style="color: green  !important;" class="fas fa-shield-alt"></i>&nbsp;
                                        <span class="text-success">Activé</span>
                                        @else
                                        <i  style="color: #da2839 !important;" class="fas fa-shield-alt"></i>&nbsp;
                                        <span class="text-danger">Désactivé</span>
                                        @endif
                                    </div>


                                </div>
                                <div class="row td-actions text-center float-right">
                                    <a href="#" class="btn btn-dark btn-link btn-sm">
                                        <i  style="color: white !important;" class="fas fa-thumbs-down"></i>
                                    </a>
                                    &nbsp;
                                    <a href="#" class="btn btn-info btn-link btn-sm">
                                        <i  style="color: white !important;" class="fas fa-low-vision"></i>
                                    </a>
                                    &nbsp;
                                    <a href="#" class="btn btn-warning btn-link btn-sm">
                                        <i  style="color: white !important;" class="fas fa-edit"></i>
                                    </a>
                                    &nbsp;
                                    <a href="#" class="btn btn-danger btn-link btn-sm">
                                        <i  style="color: white !important;" class="fas fa-times"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                </div>
                <p class="card-text">
                    @if($nb>0)
                    Total des informations : <span id="total_records">{{ $nb }}</span>
                    @else
                    <span class="text-center">Aucune information trouvé</span>
                    @endif
                </p>

                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        {{ $all_appart->links() }}

                    </ul>
                </div>
                </div>
                <div class="tab-pane" id="p2">Panneau 2</div>
            </div>
        </div>
        </div>
    </div>


@endsection