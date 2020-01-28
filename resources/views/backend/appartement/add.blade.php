@if(Session::get('admin_role') ==1 || Session::get('admin_role') == 2)
@extends('backend.admin_layout')
@section('contenu')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-orange card-outline">
        <div class="card-header">
            <h3 class="card-title ">Appartement</h3><br/>
            <p>Vous dans le formulaire d'ajout d'un appartement</p>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
            <div class="card-header" style="background-color: #0c3540">
                <h6 class="card-title text-white">Formulaire d'ajout</h6>
            </div>
            <form  action="{{ route('save') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h6  style="font-family: 'Manjari bold">Nom de l'appartement<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control"  name="appart_name"  placeholder="Saisir ici">
                            @if($errors->has('appart_name'))
                            <small class="form-text text-danger">{{$errors->first('appart_name')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <h6 style="font-family: 'Manjari bold">Description rapide<span class="text-orange"> *</span></h6>
                            <input type="text"  name="appart_short_description" class="form-control" placeholder="Saisir ici">
                            @if($errors->has('appart_short_description'))
                            <small class="form-text text-danger">{{$errors->first('appart_short_description')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="font-family: 'Manjari bold">Large déscription<span class="text-orange"> *</span></h6>
                        <textarea name="appart_long_description" class="form-control" rows="3" placeholder="Saisi ici ..."></textarea>
                        @if($errors->has('appart_long_description'))
                        <small class="form-text text-danger">{{$errors->first('appart_long_description')}}</small>
                        @endif
                    </div>
                    <div class="text-divider"><span>Localisation </span></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6  style="font-family: 'Manjari bold">Adresse<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" name="appart_adresse"  placeholder="Saisir ici">
                            @if($errors->has('appart_adresse'))
                            <small class="form-text text-danger">{{$errors->first('appart_adresse')}}</small>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari bold">Ville<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" name="appart_ville" placeholder="Saisir ici">
                            @if($errors->has('appart_ville'))
                            <small class="form-text text-danger">{{$errors->first('appart_ville')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari bold">Pays<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" name="appart_pays" placeholder="Saisir ici">
                            @if($errors->has('appart_pays'))
                            <small class="form-text text-danger">{{$errors->first('appart_pays')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="text-divider"><span>Catégorie</span></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Type<span class="text-orange"> *</span></h6>
                            <select class="form-control" name="appart_type">
                                <option value="Appartement">Appartement</option>
                            </select>
                            @if($errors->has('appart_type'))
                            <small  class="form-text text-danger">{{$errors->first('appart_type')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'">Option<span class="text-orange"> *</span></h6>
                            <select class="form-control" name="appart_option">
                                <option value="1">Â louer</option>
                                <option value="2">Â vendre</option>
                            </select>
                            @if($errors->has('appart_option'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('appart_option')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Alignements sur le site<span class="text-orange"> *</span></h6>
                            <select class="form-control" name="appart_align">
                                <option value="1">1</option>
                                <option value="1">2</option>
                                <option value="1">3</option>
                                <option value="1">4</option>
                            </select>
                            @if($errors->has('appart_align'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('appart_align')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'">Prix<span class="text-orange"> *</span></h6>
                            <input class="form-control" placeholder="Saisi ici" name="appart_prix">
                            @if($errors->has('appart_prix'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('appart_prix')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" name="appart_devise"" class="">Devise<span class="text-orange"> *</span></h6>
                            <select class="form-control">
                                <option value="1">CFA</option>
                                <option value="2">EURO</option>
                                <option value="3">DOLARS</option>
                            </select>
                            @if($errors->has('appart_devise'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('appart_devise')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="text-divider"><span>Détail de l'appartement</span></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Chambre</h6>
                            <select class="form-control" name="">
                                <option value="0">0</option>
                                <option value="1">1 chambre</option>
                                <option value="2">2 chambres </option>
                                <option value="3">3 chambres</option>
                                <option value="4">4 chambres</option>
                                <option value="5">5 chambres</option>
                                <option value="6">6 chambres</option>
                                <option value="7">7 chambres</option>
                                <option value="8">8 chambres</option>
                            </select>
                            @if($errors->has('admin_role'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_role')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Cuisine</h6>
                            <select class="form-control" name="">
                                <option value="0">0</option>
                                <option value="1">1 cuisine</option>
                                <option value="2">2 cuisines </option>
                                <option value="3">3 cuisines</option>
                            </select>
                            @if($errors->has('admin_role'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_role')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Garage</h6>
                            <select class="form-control" name="">
                                <option value="0">0</option>
                                <option value="1">1 garage</option>
                                <option value="2">2 garages </option>
                                <option value="3">3 garages</option>
                            </select>
                            @if($errors->has('admin_role'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_role')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Salon</h6>
                            <select class="form-control" name="">
                                <option value="0">0</option>
                                <option value="1">1 salon</option>
                                <option value="2">2 salons </option>
                                <option value="3">3 salons</option>
                                <option value="4">4 salons</option>
                                <option value="5">5 salons</option>
                            </select>
                            @if($errors->has('admin_role'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_role')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Sale de bain</h6>
                            <select class="form-control" name="">
                                <option value="0">0</option>
                                <option value="1">1 salle de bain</option>
                                <option value="2">2 salle de bain </option>
                                <option value="3">3 salle de bain</option>
                                <option value="4">4 salle de bain</option>
                                <option value="5">5 salle de bain</option>
                                <option value="6">6 salle de bain</option>
                                <option value="7">7 salle de bain</option>
                                <option value="8">8 salle de bain</option>
                                <option value="9">9 salle de bain</option>
                            </select>
                            @if($errors->has('admin_role'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_role')}}</small>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                    <button type="submit" class="btn btn-dark float-right card-success1 card-outline1">
                        <i class="nav-icon fas fa-check"></i>
                        Ajouter</button>

            </form>
        </div>

    </div>
</div>
@endsection
@endif