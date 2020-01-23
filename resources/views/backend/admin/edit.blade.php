
    <div class="row">
        <div class="form-group col-md-6">
            <h6 class="">Nom <span class="text-orange">*</span></h6>
            <input id="admin_name" type="text" name="admin_name" class="form-control">

            @if($errors->has('admin_name'))
            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_name')}}</small>
            @endif
        </div>
        <div class="form-group col-md-6">
            <h6 class="">Adresse e-mail  <span class="text-orange">*</span></h6>
            <input  id="admin_email" type="email" name="admin_email" class="form-control" placeholder="Saisir ici...">

            @if($errors->has('admin_email'))
            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_email')}}</small>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <h6 class="">Mot de Passe</h6>
            <input id="admin_password" type="password" name="admin_password" class="form-control" placeholder="Saisir ici...">

            @if($errors->has('admin_password'))
            <small id="emailHelp" class="form-text text-danger">{{$errors->first('admin_password')}}</small>
            @endif
        </div>
        <div class="form-group col-md-6">
            <h6 class="">Role  <span class="text-orange">*</span></h6>
            <select  id="admin_role" class="form-control" name="admin_role">
              <option value="" >Selectionner un autre role</option>
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
