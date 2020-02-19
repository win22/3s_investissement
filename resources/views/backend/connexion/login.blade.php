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
                    <div class="auto-form-wrapper card-success card-outline card-success1 card-outline1">
                        <div class="card-title text text-center py-3">
                            <img width="120px" src="{{ asset('backend/img/logo.png')}}">
                            <h3 style="font-family: 'Manjari Regular'" class="text-center">Connexion</h3>
                        </div>

                        <form action="/admin_connexion" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="label">Adresse e-mail</label>
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control" placeholder="Veuillez saisir votre adresse e-mail">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                           <i class="material-icons">mail</i>
                                        </span>
                                    </div>
                                </div>
                                @if($errors->has('email'))
                                <small id="emailHelp" class="form-text text-danger">{{$errors->first('email')}}</small>
                                @endif
                                <p hidden class="alert">{{ $message = Session::get('message')}}</p>
                                <p hidden class="alert">{{ $succes = Session::get('succes')}}</p>
                                @if($message)
                                <small class="form-text text-danger">{{ $message}}</small>
                                {{ Session::put('message',NULL) }}
                                @endif
                                @if($succes)
                                <small class="form-text text-success">{{ $succes}}</small>
                                {{ Session::put('succes',NULL) }}
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="label">Mot de passe </label>
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
                            </div>

                            <div class="form-group">

                                <button style="background-color: #0c3540; border-radius: 10px" class="btn text-white  submit-btn btn-block">
                                    <i class="material-icons mr-6">send</i>
                                    Se connecter

                                </button>
                            </div>
                            <div class="text-block text-center my-3">

                                <a href="/user/reset" class="text-warning text-small">Réinitialiser votre mot de passe </a>
                            </div>
                            <div class="text-block text-center my-3">

                            </div>
                            <div class="form-group">

                            </div>


                        </form>
                    </div>
                    <ul class="auth-footer">
                    </ul>
                    <p class="footer-text text-center">design by Nataal Agency. Tous les droits sont réservés.</p>
                </div>
            </div>
        </div>

    </div>

</div>


</body>
</html>


