@extends('backend.admin_layout')
@section('contenu')

<div class="col-md-12 reveal">
    <!-- general form elements -->
    <div class="card card-orange card-outline">
        <div class="card-header">
            <h3 class="card-title ">Hectare</h3><br/>
            <p>Vous etes dans le formulaire d'ajout d'un hectare</p>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
            <div class="card-header" style="background-color: #0c3540">
                <h6 class="card-title text-white">Formulaire d'ajout</h6>
            </div>
            <form  action="{{ route('save_hectare') }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h6  style="font-family: 'Manjari bold">Nom de du hectare<span class="text-orange"> *</span></h6>
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
                                <option value="hectare">hectare</option>
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
                                <option value="10">0</option>
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
                    <div class="text-divider"><span>Détail du hectare</span></div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h6 style="font-family: 'Manjari Bold'" class="">Dimension</h6>
                            <input required name="dimension" class="form-control" placeholder="saisir ici">
                            @if($errors->has('dimension'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('dimension')}}</small>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Image Profile</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input required type="file" class="custom file" accept="image/*" name="image" id="exampleInputFile">
                                @if($errors->has('image'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('image')}}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="text-divider"><span>Selectionner un autre images</span></div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image details</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" required name="images[]" multiple  accept="image/*" class="custom file" id="exampleInputFile">
                                @if($errors->has('imagess'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('images')}}</small>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="float-right">
                    <button type="submit" class="btn btn-info">
                        <i class="nav-icon fas fa-check"></i>
                        Enregistrer</button>
                    &nbsp;
                    <a href="{{ route('hectares')}}" class="btn btn-danger">
                        <i class="fas fa-backspace fa-lg mr-2"></i>
                        Retour
                    </a>
                </div>



            </form>
        </div>

    </div>
</div>
@endsection
