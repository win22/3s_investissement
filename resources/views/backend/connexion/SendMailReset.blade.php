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
                        <h3 class="text-center"><span class="text-primary">Mail envoyé</h3>
                            <div>
                                <p>
                                Nous avons envoyé à l'adresse {{ $data['email'] }} un mail contenant un lien permettant
                                de réinitialiser le mot de passe<br>
                                <br>
                                Avez vous reçu cet-email? Si ce n'est pas le cas, consultez votre dossier de courriers
                                indésirables ou <a href="/user/reset" class="text-warning"> réinitialiser de nouveau votre mot de passe </a>.
                                <br>
                                    Si vous rencontrez des problèmes veuillez contacter l'equipe de Gestion des Comptes
                                    de 3s investissement.
                                </p>
                            </div>
                            <div class="text-block text-right my-3">

                                <a href="/investi_admin" class="text-danger text-small">Retour </a>
                            </div>
                            <div class="text-block text-center my-3">

                            </div>
                            <div class="form-group">

                            </div>
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



