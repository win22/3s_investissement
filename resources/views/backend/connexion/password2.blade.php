<!DOCTYPE html>
<html lang="fr">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Connexion</title>
    <link href="{{asset('backend/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
</head>
<body>

<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-5 mx-auto">
                    <div class="auto-form-wrapper">
                        <div class="card-title text text-center py-3">
                            <img width="100px" src="{{ asset('backend/img/logo.png')}}">
                            <h3 style="font-family: 'Manjari Regular'" class="text-center">Rénitialisation du mot de passe </h3>
                        </div>
                        <form action="{{ url('/user/res',$token)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="label">Mot de passe</label>
                                <div class="input-group">
                                    <input type="password" name="password" class="form-control" placeholder="Veuillez saisir votre mot de passe">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                           <i class="material-icons">lock</i>
                                        </span>
                                    </div>
                                </div>
                                @if($errors->has('password'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('password')}}</small>
                                @endif
                                <p hidden class="alert">{{ $message = Session::get('message')}}</p>
                                @if($message)
                                <small class="form-text text-danger">{{ $message}}</small>
                                {{ Session::put('message',NULL) }}
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="label">Confirmer mot de passe </label>
                                <div class="input-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Veuillez confirmer votre mot de passe">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="material-icons">lock</i>
                                        </span>
                                    </div>
                                </div>
                                @if($errors->has('password_confirmation'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('password_confirmation')}}</small>
                                @endif
                            </div>

                            <div class="form-group">

                                <button class="btn btn-primary submit-btn btn-block">
                                    <i class="material-icons">check</i>
                                    Sauvegarder
                                </button>
                            </div>
                            <div class="text-block text-center my-3">

                            </div>
                            <div class="form-group">

                            </div>


                        </form>
                    </div>
                    <ul class="auth-footer">
                    </ul>
                    <p  class="footer-text text-center">&copy; 2019 | design by <a  target="_blank" href="http://nataalagency.com/">Nataal Agency</a>. Tous les droits sont réservés.</p>
                </div>
            </div>
        </div>

    </div>

</div>


</body>
</html>



