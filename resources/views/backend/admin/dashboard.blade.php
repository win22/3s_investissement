@extends('backend.admin_layout')
@section('contenu')
<p hidden>   {{ \Carbon\Carbon::setLocale('fr') }}</p>
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>

                <p>Appartements </p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div style="color: white !important;" class="small-box bg-warning">
            <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">

                <div class="col-lg-12">
                    <div class="card card-orange card-outline ">
                        <div class="card-header">
                            <h5 class="m-0">Messages</h5>
                            <p>Voici la liste des messages de l'application</p>
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
                                                <a id="delete" href="/delete_admin/{{ $v_info['id'] }}"
                                                   class="btn btn-danger btn-link btn-sm" style="margin-left: 2px">
                                                    <i style="color: white !important;" class="fas fa-times "></i>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <p class="card-text">
                                        @if($nb>0)
                                        Total des informations : <span id="total_records">{{ $nb }}</span>
                                        @else
                                        <span class="text-center">Aucune information trouvé</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>

                <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's
                    content.
                </p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div><!-- /.card -->
    </div>
    <!-- /.col-md-6 -->

    <!-- /.col-md-6 -->
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
            <form enctype="multipart/form-data" action="/update_admin/test" method="post">
                @csrf
                <div class="modal-body">
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
                    <button type="button"  class="btn btn-danger btn-sm" data-dismiss="modal">Marquer comme lu</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection