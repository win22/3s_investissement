
@extends('backend.admin_layout')
@section('contenu')

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="col-lg-12">
                    <div class="card card-orange card-outline ">
                        <div class="card-header">
                            <h5 class="m-0">Utilisateurs</h5>
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
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_info as $v_info)
                                        <tr>
                                            <td><img src="{{ URL::to($v_info['image']) }}"
                                                     style=" height: 40px; width: 40px; border-radius: 15px;">
                                            </td>
                                            <td>{{ $v_info['name'] }}</td>
                                            <td>{{ $v_info['email'] }}</td>
                                            <td>
                                                @if($v_info->role == 1 )
                                                <span class="text-danger">Adminnistrateur</span>
                                                @else
                                                <span class="text-warning">Utilisateur</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($v_info->status == 1)
                                                <span class="text-success">Activé</span>
                                                @else
                                                <span class="text-warning">Désactivé</span>
                                                @endif
                                            </td>

                                            <td class="td-actions text-center">
                                                @if(Auth::check() AND Auth::user()->role == 1)
                                                @if($v_info->status == 1)
                                                <a href="/desactive_admin/{{$v_info['id']}}" class="btn btn-dark btn-link btn-sm">
                                                    <i style="color: white !important;" class="fas fa-thumbs-down"></i>
                                                </a>
                                                @else
                                                <a href="/active_admin/{{$v_info['id']}}" class="btn btn-info btn-link btn-sm">
                                                    <i style="color: white !important;" class="fas fa-thumbs-up"></i>
                                                </a>
                                                @endif
                                                <a data-toggle="modal"
                                                   data-id="{{ $v_info['id'] }}"
                                                   data-name="{{ $v_info['name'] }}"
                                                   data-email="{{ $v_info['email'] }}"
                                                   data-password="{{ bcrypt($v_info['password']) }}"
                                                   data-role="{{ $v_info['role'] }}"
                                                   data-target="#updateModal"
                                                   class="btn btn-warning btn-link btn-sm" style="margin-left: 2px">
                                                    <i style="color: white !important;" class="fas fa-edit"></i>
                                                </a>
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

                                    <div class="card-tools">
                                        <a href="#" class="btn btn-info  btn-sm" data-toggle="modal" data-target="#exampleModal">
                                            <i style="color: #ffffff !important;" class="fas fa-user-plus"></i> &nbsp; Ajouter</a>
                                        <ul class="pagination pagination-sm float-right">
                                            {{ $all_info->links() }}
                                        </ul>
                                    </div>
                                </div>
                            </div>

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
<button type="button" class="btn btn-success swalDefaultSuccess">
    Launch Success Toast
</button>
@endsection