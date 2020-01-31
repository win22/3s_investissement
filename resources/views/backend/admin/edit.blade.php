@if(Auth::user()->id == 1)
    <div class="row">
        <div class="form-group col-md-6">
            <h6 class="">Nom <span class="text-orange">*</span></h6>
            <input id="name" type="text" name="name" class="form-control">

            @if($errors->has('name'))
            <small id="emailHelp" class="form-text text-danger">{{$errors->first('name')}}</small>
            @endif
        </div>
        <div class="form-group col-md-6">
            <h6 class="">Adresse e-mail  <span class="text-orange">*</span></h6>
            <input  id="email" type="email" name="email" class="form-control" placeholder="Saisir ici...">

            @if($errors->has('email'))
            <small id="emailHelp" class="form-text text-danger">{{$errors->first('email')}}</small>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <h6 class="">Mot de Passe</h6>
            <input id="password" type="password" name="password" class="form-control" placeholder="Saisir ici...">
            @if($errors->has('password'))
            <small id="emailHelp" class="form-text text-danger">{{$errors->first('password')}}</small>
            @endif
        </div>

        <div class="form-group col-md-6">
            <h6 class="">Role  <span class="text-orange">*</span></h6>
            <select  id="role" class="form-control" name="role">
              <option value="" >Selectionner un autre role</option>
                <option class="text-orange" value="1">Administrateur </option>
                <option value="2">Utilisateur </option>
            </select>
            @if($errors->has('role'))
            <small id="emailHelp" class="form-text text-danger">{{$errors->first('role')}}</small>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <h6 class="">Image de l'utilisateur</h6>
                <input  accept="image/*" type="file" name="image">
            </div>
        </div>
    </div>
@endif