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
            <form  action="{{ route('save_ap') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h6  style="font-family: 'Manjari bold">Nom de l'appartement<span class="text-orange"> *</span></h6>
                            <input required type="text" class="form-control" value="{{ old('name') }}"  name="name"  placeholder="Saisir ici">
                            @if($errors->has('name'))
                            <small class="form-text text-danger">{{$errors->first('name')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <h6 style="font-family: 'Manjari bold">Description rapide<span class="text-orange"> *</span></h6>
                            <input required type="text"  name="short_description" value="{{ old('short_description') }}" class="form-control" placeholder="Saisir ici">
                            @if($errors->has('short_description'))
                            <small class="form-text text-danger">{{$errors->first('short_description')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="font-family: 'Manjari bold">Large déscription<span class="text-orange"> *</span></h6>
                        <textarea required name="large_description" value="{{ old('large_description') }}"  class="form-control" rows="3" placeholder="Saisi ici ..."></textarea>
                        @if($errors->has('large_description'))
                        <small class="form-text text-danger">{{$errors->first('large_description')}}</small>
                        @endif
                    </div>
                    <div class="text-divider"><span>Localisation </span></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6  style="font-family: 'Manjari bold">Adresse<span class="text-orange"> *</span></h6>
                            <input required type="text" class="form-control" value="{{ old('adresse') }}" name="adresse"  placeholder="Saisir ici">
                            @if($errors->has('adresse'))
                            <small class="form-text text-danger">{{$errors->first('adresse')}}</small>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari bold">Ville<span class="text-orange"> *</span></h6>
                            <input required type="text" class="form-control" value="{{ old('ville') }}" name="ville" placeholder="Saisir ici">
                            @if($errors->has('ville'))
                            <small class="form-text text-danger">{{$errors->first('ville')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari bold">Pays<span class="text-orange"> *</span></h6>
                            <input required type="text" class="form-control" value="{{ old('pays') }}" name="pays" placeholder="Saisir ici">
                            @if($errors->has('pays'))
                            <small class="form-text text-danger">{{$errors->first('pays')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="text-divider"><span>Catégorie</span></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Type<span class="text-orange"> *</span></h6>
                            <select class="form-control" name="type">
                                <option value="Appartement">Appartement</option>
                            </select>
                            @if($errors->has('type'))
                            <small  class="form-text text-danger">{{$errors->first('type')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'">Option<span class="text-orange"> *</span></h6>
                            <select required class="form-control" name="option">
                                <option value="1">Â louer</option>
                                <option value="2">Â vendre</option>
                            </select>
                            @if($errors->has('option'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('option')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Alignements sur le site<span class="text-orange"> *</span></h6>
                            <select required class="form-control" name="align">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            @if($errors->has('align'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('align')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'">Prix<span class="text-orange"> *</span></h6>
                            <input required class="form-control" value="{{ old('prix') }}" placeholder="Saisi ici" name="prix">
                            @if($errors->has('prix'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('prix')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Devise<span class="text-orange"> *</span></h6>
                            <select required class="form-control" name="devise" >
                                <option value="1">CFA</option>
                                <option value="2">EURO</option>
                                <option value="3">DOLARS</option>
                            </select>
                            @if($errors->has('devise'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('devise')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4 ">
                            <h6 style="font-family: 'Manjari Bold'">Promotion<span class="text-orange"> *</span></h6>
                            <select required name="sold" class="form-control dynamic2">
                                <option value="2">Sans promotion</option>
                                <option value="1">Avec promotion</option>
                            </select>
                            @if($errors->has('sold'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('sold')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row forma">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Pourcentage<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" value="{{ old('pourcentage') }}" name="pourcentage"  placeholder="Saisir ici">
                            @if($errors->has('pourcentage'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('pourcentage')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="text-divider"><span>Détail de l'appartement</span></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Chambre</h6>
                            <select class="form-control" name="chambre">
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
                            @if($errors->has('chambre'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('chambre')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Cuisine</h6>
                            <select class="form-control" name="cuisine">
                                <option value="0">0</option>
                                <option value="1">1 cuisine</option>
                                <option value="2">2 cuisines </option>
                                <option value="3">3 cuisines</option>
                            </select>
                            @if($errors->has('cuisine'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('cuisine')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Garage</h6>
                            <select class="form-control" name="garage">
                                <option value="0">0</option>
                                <option value="1">1 garage</option>
                                <option value="2">2 garages </option>
                                <option value="3">3 garages</option>
                            </select>
                            @if($errors->has('garage'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('garage')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Salon</h6>
                            <select class="form-control" name="salon">
                                <option value="0">0</option>
                                <option value="1">1 salon</option>
                                <option value="2">2 salons </option>
                                <option value="3">3 salons</option>
                                <option value="4">4 salons</option>
                                <option value="5">5 salons</option>
                            </select>
                            @if($errors->has('salon'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('salon')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Sale de bain</h6>
                            <select class="form-control" name="sale_de_bain">
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
                            @if($errors->has('sale_de_bain'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('sale_de_bain')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image Profile</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input required type="file" class="custom file" accept="image/*" name="image" id="exampleInputFile">
                            </div>
                        </div>
                    </div>
                    <div class="text-divider"><span>Selectionner un autre images</span></div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image details</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" required name="images"  accept="image/*" class="custom file" id="exampleInputFile">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                    <button type="submit" class="btn btn-info float-left">
                        <i class="nav-icon fas fa-check"></i>
                        Ajouter</button>
                &nbsp;
                <a href="{{ route('appart')}}" class="btn btn-danger">
                    <i class="fas fa-backspace fa-lg mr-2"></i>
                    Retour
                </a>

            </form>
        </div>

    </div>
</div>
@endsection
