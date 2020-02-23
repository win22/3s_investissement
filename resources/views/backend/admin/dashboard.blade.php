@extends('backend.admin_layout')
@section('contenu')
<p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
<div class="row reveal">
    <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                @if($apparts > 0)
                <h3>{{ $apparts }}</h3>
                @else
                <h3>0</h3>
                @endif
                <p>Appartements </p>
            </div>
            <div class="icon">
                <i style="color: white" class="fas fa-store-alt"></i>
            </div>
            <a href="{{ route('appart') }}" class="small-box-footer">Voir les détails <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>


    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                @if($villas >= 0)
                <h3>{{ $villas }}</h3>
                @endif
                <p>Villa</p>
            </div>
            <div class="icon">
                <i style="color: white" class="fas fa-house-damage"></i>
            </div>
            <a href="{{ route('all_vil') }}" class="small-box-footer">Voir les détails <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div style="color: white !important;" class="small-box bg-warning">
            <div class="inner">
                @if($immeubles > 0)
                <h3>{{ $immeubles }}</h3>
                @else
                <h3>0</h3>
                @endif
                <p>Immeuble</p>
            </div>
            <div class="icon">
                <i style="color: white" class="fas fa-hotel"></i>
            </div>
            <a href="{{ route('immeubles') }}" class="small-box-footer">Voir les détails <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                @if($bureaux > 0)
                <h3>{{ $bureaux }}</h3>
                @else
                <h3>0</h3>
                @endif
                <p>Bureau</p>
            </div>
            <div class="icon">
                <i style="color: white" class="fas fa-chair"></i>
            </div>
            <a href="{{ route('bureaux') }}" class="small-box-footer"> Voir les détails <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row reveal-2">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                @if($terrains >= 0)
                <h3>{{ $terrains }}</h3>
                @endif
                <p>Terrain</p>
            </div>
            <div class="icon">
                <i style="color: white"class="fas fa-ruler-combined"></i>
            </div>
            <a href="{{ route('terrains') }}" class="small-box-footer">Voir les détails<i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                @if($entrepots >= 0)
                <h3>{{ $entrepots }}</h3>
                @endif
                <p>Entrepot</p>
            </div>
            <div class="icon">
                <i style="color: white" class="fas fa-warehouse"></i>
            </div>
            <a href="{{ route('entrepots') }}" class="small-box-footer">Voir les détails <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div style="color: white !important;" class="small-box bg-warning">
            <div class="inner">
                @if($Magasin >= 0)
                <h3>{{ $Magasin }}</h3>
                @endif
                <p>Magasin</p>
            </div>
            <div class="icon">
                <i style="color: white" class="fas fa-store"></i>
            </div>
            <a href="{{ route('magasins') }}" class="small-box-footer">Voir les détails <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                @if($hectare >= 0)
                <h3>{{ $hectare }}</h3>
                @endif
                <p>Hectare</p>
            </div>
            <div class="icon">
                <i style="color: white" class="fas fa-campground"></i>
            </div>
            <a href="{{ route('hectares') }}" class="small-box-footer">Voir les détails <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">

                <div class="col-lg-12">
                    <div class="card card-orange card-outline reveal-2">
                        <div class="card-header">
                            <h5 class="m-0">Messages</h5>
                            @if($last_mess)
                            <p> {{  \Carbon\Carbon::parse($last_mess['created_at'])->diffForHumans() }}
                                de cela vous avez reçu un nouveau message de {{ $last_mess->name }}
                            </p>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">

                                <!-- /.card-header -->

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="text-white" style="background-color: #0c3540; border-radius: 30px !important;">
                                        <tr>

                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Numero</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_messages as $v_info)
                                        <tr >

                                            <td>{{ $v_info['name'] }}</td>
                                            <td>{{ $v_info['email'] }}</td>
                                            <td>
                                                {{ $v_info['phone'] }}
                                            </td>
                                            <td>
                                                {{  \Carbon\Carbon::parse($v_info['created_at'])->diffForHumans() }}
                                            </td>
                                            <td>
                                                @if($v_info->status == 1)
                                                <span class="badge badge-success">lue</span>
                                                @else
                                                <span class="badge badge-warning">Non lue</span>
                                                @endif
                                            </td>

                                            <td class="td-actions text-center">
                                                <a data-toggle="modal"
                                                   data-id="{{ $v_info['id'] }}"
                                                   data-name="{{ $v_info['name'] }}"
                                                   data-email="{{ $v_info['email'] }}"
                                                   data-message="{{ $v_info['message'] }}"
                                                   data-phone="{{ $v_info['phone'] }}"
                                                   data-name_p="{{ $v_info['name_p'] }}"
                                                   data-target="#updateModal2"

                                                   class="btn btn-warning btn-link btn-sm" style="margin-left: 2px">
                                                    <i style="color: white !important;" class="fas fa-eye"></i>
                                                </a>
                                                @if(Auth::check() AND Auth::user()->role == 1)
                                                <a id="delete" href="/delete_message/{{ $v_info['id'] }}"
                                                   class="btn btn-danger btn-link btn-sm" style="margin-left: 2px">
                                                    <i style="color: white !important;" class="fas fa-times "></i>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <p style="padding-left: 40%; color:tomato" class="card-text md-2">
                                        @if($nb<=0)
                                        <span class="">Aucune information trouvé</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
    </div>
    <!-- /.col-md-6 -->
    <!-- /.col-md-6 -->
    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch reveal-3">
        <div class="card  card-info card-outline">
            <div class="card-header text-muted border-bottom-0">
                @if( Auth()->user()->role == 1)
                    Administrateur
                @else
                    Utilisateur
                @endif
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>{{ Auth()->user()->name }}</b></h2>
                        <p class="text-muted text-sm"><b>Email </b> <br/>
                            {{ Auth()->user()->email }}
                        </p>
                        <p class="text-muted text-sm"><b>Téléphone </b> <br/>
                            {{ Auth()->user()->email }}
                        </p>
                        <p class="text-muted text-sm"><b>Status </b> <br/>
                            Activé
                        </p>
                    </div>
                    <div class="col-5 text-center">
                        <img src="{{ asset(Auth()->user()->image) }}" alt="" class="img-circle img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-success swalDefaultSuccess">
    Launch Success Toast
</button>

<div class="modal fade" id="updateModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content card-orange card-outline">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Message</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/view_message/test" method="post">
                @csrf
                <div class="modal-body">
                    <input hidden name="id" id="id" value="">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                        <h6 class="">Nom </h6>
                        <input disabled id="name" type="text" name="name" class="form-control">
                       </div>
                        <div class="form-group row">
                        <h6 class="">Email </h6>
                        <input disabled id="email" type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group row">
                        <h6 class="">Téléphone </h6>
                        <input disabled id="phone" type="text" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <h6>Message </h6>
                        <textarea disabled id="message" style="height: 120px " type="text" name="message" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <h6 class="">Nom de la propriété </h6>
                            <input disabled id="name_p" type="text" name="name_p" class="form-control">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" style="color: white" class="btn btn-danger btn-sm">
                        <i class="fas fa-eye"></i>
                        Marquer comme lu</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection