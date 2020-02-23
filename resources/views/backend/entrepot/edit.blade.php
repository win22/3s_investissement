@extends('backend.admin_layout')
@section('contenu')

<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-orange card-outline">
        <div class="card-header">
            <h3 class="card-title badge">Entrepot</h3><br/>
            <p>Vous êtes dans le formulaire de modifification d'un entrepot</p>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
            <div class="card-header" style="background-color: red">
                <h6 class="card-title text-white">Modification de la entrepot : <span style="font-family: 'Manjari Bold'">{{ $entrepot['name'] }}</span> </h6>
            </div>
            <form  action="{{ route('modifie_entr', array('test' => $entrepot->id)) }}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <h6  style="font-family: 'Manjari bold">Nom de la entrepot<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" value="{{ $entrepot['name']}}"  name="name"  placeholder="Saisir ici">
                            @if($errors->has('name'))
                            <small class="form-text text-danger">{{$errors->first('name')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <h6 style="font-family: 'Manjari bold">Description rapide<span class="text-orange"> *</span></h6>
                            <input type="text"  name="short_description"value="{{ $entrepot['short_description']}}" class="form-control" placeholder="Saisir ici">
                            @if($errors->has('short_description'))
                            <small class="form-text text-danger">{{$errors->first('short_description')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <h6 style="font-family: 'Manjari bold">Large déscription<span class="text-orange"> *</span></h6>
                        <textarea name="large_description" value="{{ old('large_description') }}"  class="form-control" rows="3" placeholder="Saisi ici ...">
                            {{ $entrepot['large_description']}}
                        </textarea>
                        @if($errors->has('large_description'))
                        <small class="form-text text-danger">{{$errors->first('large_description')}}</small>
                        @endif
                    </div>
                    <div class="text-divider"><span>Localisation </span></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6  style="font-family: 'Manjari bold">Adresse<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" value="{{ $entrepot['adresse']}}" name="adresse"  placeholder="Saisir ici">
                            @if($errors->has('adresse'))
                            <small class="form-text text-danger">{{$errors->first('adresse')}}</small>
                            @endif
                        </div>

                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari bold">Ville<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" value="{{ $entrepot['ville']}}" name="ville" placeholder="Saisir ici">
                            @if($errors->has('ville'))
                            <small class="form-text text-danger">{{$errors->first('ville')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari bold">Pays<span class="text-orange"> *</span></h6>
                            <input type="text" class="form-control" value="{{ $entrepot['pays']}}" name="pays" placeholder="Saisir ici">
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
                                <option value="entrepot">entrepot</option>
                            </select>
                            @if($errors->has('type'))
                            <small  class="form-text text-danger">{{$errors->first('type')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'">Option<span class="text-orange"> *</span></h6>
                            <select class="form-control" name="option">
                                @if($entrepot['option'] == 1)
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
                                @if($entrepot['align'] == 10)
                                <option value="10">0</option>
                                @else
                                <option class="text-orange" value="{{ $entrepot['align'] }}"> {{ $entrepot['align'] }} </option>
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
                            <input class="form-control" value="{{ $entrepot['prix'] }}" placeholder="Saisi ici" name="prix">
                            @if($errors->has('prix'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('prix')}}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Devise<span class="text-orange"> *</span></h6>
                            <select class="form-control" name="devise" >
                                @if($entrepot['devise'] == 1)
                                <option value="{{ $entrepot['devise']}}">CFA</option>
                                @elseif($entrepot['devise'] == 2)
                                <option value="{{ $entrepot['devise']}}">EURO</option>
                                @else
                                <option value="{{ $entrepot['devise']}}" >DOLLAR</option>
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
                                @if($entrepot['sold'] == 1)
                                <option class="text-orange" value="{{ $entrepot['sold']}}">En promo</option>
                                @else
                                <option class="text-orange" value="{{ $entrepot['sold']}}" >Sans promo</option>
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
                            <input type="text" class="form-control" value="{{ $entrepot['pourcentage'] }}" name="pourcentage"  placeholder="Saisir ici">
                            @if($errors->has('pourcentage'))
                            <small id="emailHelp" class="form-text text-danger">{{$errors->first('pourcentage')}}</small>
                            @endif
                        </div>
                    </div>
                    <div class="text-divider"><span>Détail de l'entrepotement</span></div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <h6 style="font-family: 'Manjari Bold'" class="">Dimension</h6>
                            <input name="dimension" class="form-control" value="{{ $entrepot['dimension'] }}">
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
                <div class="float-right">
                    <button type="submit" class="btn btn-info ">
                        <i class="nav-icon fas fa-edit"></i>
                        Modifier</button>
                    &nbsp;
                    <a href="{{ route('entrepots')}}" class="btn btn-danger">
                        <i class="fas fa-backspace fa-lg mr-2"></i>
                        Retour
                    </a>
                </div>



            </form>
        </div>

    </div>
</div>
@endsection

