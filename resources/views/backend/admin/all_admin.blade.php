@extends('backend.admin_layout')
@section('contenu')
<div class="col-lg-12">
    <div class="card card-orange card-outline">
        <div class="card-header">
            <h5 class="m-0">Utilisateurs</h5>
            <p>Voici la liste des utilisateurs de l'application</p>
        </div>
        <div class="card-body">
            <div class="col-md-12">

                    <!-- /.card-header -->

                        <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="text-white" style="background-color: #343a40; border-radius: 30px !important;">
                            <tr>
                                <th style="width: 10px">image</th>
                                <th>Nom</th>
                                <th>E-mail</th>
                                <th>Rôle</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_info as $v_info)
                            <tr>
                                <td class="text-center"><img src="{{ URL::to($v_info->admin_image) }}"
                                                             style=" height: 40px; width: 40px; border-radius: 15px;">
                                </td>
                                <td>{{ $v_info->admin_name }}</td>
                                <td>{{ $v_info->admin_email }}</td>
                                <td >
                                    @if($v_info->admin_role == 'Administrateur')
                                    <span class="text-danger">Adminnistrateur</span>
                                    @else
                                    <span class="text-warning">Utilisateur</span>
                                    @endif
                                </td>
                                <td >
                                    @if($v_info->admin_status == 'Activé')
                                    <span class="text-success">Activé</span>
                                    @else
                                    <span class="text-warning">Désactivé</span>
                                    @endif
                                </td>

                                <td  class="td-actions text-center">
                                    <a class="btn btn-info btn-link btn-sm">
                                        <i  style="color: white !important;" class="fas fa-thumbs-down"></i>
                                    </a>

                                    <a data-toggle="modal"
                                       data-id="{{ $v_info->id }}"
                                       data-name="{{ $v_info->admin_name }}"
                                       data-email="{{ $v_info->admin_email }}"
                                       data-password="{{ null }}"
                                       data-role="{{ $v_info->admin_role }}"
                                       data-target="#updateModal"
                                       class="btn btn-warning btn-link btn-sm"  style="margin-left: 2px">
                                        <i  style="color: white !important;" class="fas fa-edit" ></i>
                                    </a>

                                    <a id="delete" class="btn btn-danger btn-link btn-sm" style="margin-left: 2px">
                                        <i  style="color: white !important;" class="fas fa-times "></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- /.card-body -->

                <!-- /.card -->


                <!-- /.card -->
            </div>
            <p class="card-text">
                @if($nb>0)
                Total des orangemations : <span id="total_records">{{ $nb }}</span>
            @else
            Aucune orangemation trouvé
                @endif
            </p>

            <div class="card-tools">
                <a href="#" class="btn btn-outline-orange  btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i  style="color: #ff5100 !important;"  class="fas fa-user"></i> &nbsp; Ajouter un nouveau</a>
                <ul class="pagination pagination-sm float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;
                            {{ $all_info->links() }}
                        </a></li>

                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Modal save user -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form enctype="multipart/form-data" action="/save_admin" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h6 class="">Nom <span class="text-orange">*</span></h6>
                            <input type="text" name="admin_name" class="form-control" placeholder="Saisir ici...">

                            @if($errors->has('admin_name'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_name')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="">Adresse e-mail  <span class="text-orange">*</span></h6>
                            <input type="email" name="admin_email" class="form-control" placeholder="Saisir ici...">

                            @if($errors->has('admin_email'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_email')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h6 class="">Mot de Passe  <span class="text-orange">*</span></h6>
                            <input type="password" name="admin_password" class="form-control" placeholder="Saisir ici...">

                            @if($errors->has('admin_password'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_password')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <h6 class="">Role  <span class="text-orange">*</span></h6>
                            <select class="form-control" name="admin_role">
                                <option value="">Selectionnez un role </option>
                                <option class="text-orange" value="Administrateur">Administrateur </option>
                                <option value="Utilisateur">Utilisateur </option>
                            </select>
                            @if($errors->has('admin_role'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_role')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <h6 class="">Image de l'utilisateur</h6>
                                <input  accept="image/*" type="file" name="admin_image">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-orange btn-sm">Ajouter</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Annuler</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" action="/update/test" method="post">
                @csrf
                <div class="modal-body">
                    <input hidden  name="id" id="id" value="">
                    @include('backend.admin.edit')
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-orange btn-sm">Modifier</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Annuler</button>
                </div>
            </form>

        </div>
    </div>
</div>


@endsection