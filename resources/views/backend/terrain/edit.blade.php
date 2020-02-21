@extends('backend.admin_layout')
@section('contenu')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-orange card-outline">
        <div class="card-header">
            <h3 class="card-title badge">terrain</h3><br/>
            <p>Vous êtes dans le formulaire de modifification d'un terrain</p>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
            <div class="card-header" style="background-color: red">
                <h6 class="card-title text-white">Modification de la terrain : <span style="font-family: 'Manjari Bold'">{{ $terrain['name'] }}</span> </h6>
            </div>
            <form  action="{{ route('modifie_terre', array('test' => $terrain->id)) }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h6  style="font-family: 'Manjari bold">Nom de la terrain<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" value="{{ $terrain['name']}}"  name="name"  placeholder="Saisir ici">
                            @if($errors->has('name'))
                            <small class="form-text text-danger">{{$errors->first('name')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <h6 style="font-family: 'Manjari bold">Description rapide<span class="text-orange"> *</span></h6>
                            <input type="text"  name="short_description"value="{{ $terrain['short_description']}}" class="form-control" placeholder="Saisir ici">
                            @if($errors->has('short_description'))
                            <small class="form-text text-danger">{{$errors->first('short_description')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="font-family: 'Manjari bold">Large déscription<span class="text-orange"> *</span></h6>
                        <textarea name="large_description" value="{{ old('large_description') }}"  class="form-control" rows="3" placeholder="Saisi ici ...">
                            {{ $terrain['large_description']}}
                        </textarea>
                        @if($errors->has('large_description'))
                        <small class="form-text text-danger">{{$errors->first('large_description')}}</small>
                        @endif
                    </div>
                    <div class="text-divider"><span>Localisation </span></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6  style="font-family: 'Manjari bold">Adresse<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" value="{{ $terrain['adresse']}}" name="adresse"  placeholder="Saisir ici">
                            @if($errors->has('adresse'))
                            <small class="form-text text-danger">{{$errors->first('adresse')}}</small>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari bold">Ville<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" value="{{ $terrain['ville']}}" name="ville" placeholder="Saisir ici">
                            @if($errors->has('ville'))
                            <small class="form-text text-danger">{{$errors->first('ville')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari bold">Pays<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" value="{{ $terrain['pays']}}" name="pays" placeholder="Saisir ici">
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
                                <option value="terrainement">terrainement</option>
                            </select>
                            @if($errors->has('type'))
                            <small  class="form-text text-danger">{{$errors->first('type')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'">Option<span class="text-orange"> *</span></h6>
                            <select class="form-control" name="option">
                                @if($terrain['option'] == 1)
                                <option value="1">Â louer</option>
                                @else
                                <option value="2">Â vendre</option>
                                @endif
                                <option value="">Selectionner une autre option</option>
                                <option value="1">Â louer</option>
                                <option value="2">Â vendre</option>
                            </select>
                            @if($errors->has('option'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('option')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Alignements sur le site<span class="text-orange"> *</span></h6>
                            <select class="form-control" name="align">
                                @if($terrain['align'] == 10)
                                <option value="10">0</option>
                                @else
                                <option class="text-orange" value="{{ $terrain['align'] }}"> {{ $terrain['align'] }} </option>
                                @endif
                                <option value="">Selectionner une nouvelle option</option>
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
                            <input class="form-control" value="{{ $terrain['prix'] }}" placeholder="Saisi ici" name="prix">
                            @if($errors->has('prix'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('prix')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Devise<span class="text-orange"> *</span></h6>
                            <select class="form-control" name="devise" >
                                @if($terrain['devise'] == 1)
                                <option value="{{ $terrain['devise']}}">CFA</option>
                                @elseif($terrain['devise'] == 2)
                                <option value="{{ $terrain['devise']}}">EURO</option>
                                @else
                                <option value="{{ $terrain['devise']}}" >DOLLAR</option>
                                @endif
                                <option value="">Selectionner une nouvelle devise</option>
                                <option value="1">CFA</option>
                                <option value="2">EURO</option>
                                <option value="3">DOLLAR</option>
                            </select>
                            @if($errors->has('devise'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('devise')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4 ">
                            <h6 style="font-family: 'Manjari Bold'">Solde<span class="text-orange"> *</span></h6>
                            <select name="sold" class="form-control">
                                @if($terrain['sold'] == 1)
                                <option class="text-orange" value="{{ $terrain['sold']}}">En promo</option>
                                @else
                                <option class="text-orange" value="{{ $terrain['sold']}}" >Sans promo</option>
                                @endif
                                <option value="">Selectionner une nouvelle catégorie</option>
                                <option value="2">Sans promo</option>
                                <option value="1">Avec promo</option>
                            </select>
                            @if($errors->has('sold'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('sold')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Pourcentage<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" value="{{ $terrain['pourcentage'] }}" name="pourcentage"  placeholder="Saisir ici">
                            @if($errors->has('pourcentage'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('pourcentage')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="text-divider"><span>Détail de l'terrainement</span></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Dimension</h6>
                            <input name="dimension" class="form-control" value="{{ $terrain['dimension'] }}">
                            @if($errors->has('dimension'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('dimension')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Image Profile</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom file" accept="image/*" name="image" id="exampleInputFile">
                            </div>
                        </div>
                    </div>
                    <div class="text-divider"><span>Selectionner plusieurs images</span></div>
                    <div class="form-group">
                        <label for="exampleInputFile">Galerie image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" multiple name="images[]" accept="image/*" class="custom file" id="exampleInputFile">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <button type="submit" class="btn btn-info float-left">
                    <i class="nav-icon fas fa-edit"></i>
                    Modifier</button>
                &nbsp;
                <a href="{{ route('terrains')}}" class="btn btn-danger">
                    <i class="fas fa-backspace fa-lg mr-2"></i>
                    Retour
                </a>


            </form>
        </div>

    </div>
</div>
@endsection

