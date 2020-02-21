<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 style="color: white" class="widgettitle">Liens utiles</h3>
                <ul>
                    <li><a href="submit.html">Propriétés en promo</a></li>
                    <li><a href="login.html">Proprétes à louer</a></li>
                    <li><a href="pricing.html">Propriétes à vendre</a></li>
                    <li><a href="{{ route('about_site') }}">A propos de nous</a></li>
                    <li><a href="{{ route('contact_site') }}">Nous contacter</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 style="color: white" class="widgettitle">Information</h3>
                <ul>
                    <li>
                        <a href="blog-post.html">
                            Plus de 200 propriétes reparties par catégorie dans notre site
                            .</a>
                        <span class="meta-data">1 March, 2014</span>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 style="color: white" class="widgettitle">Réseaux sociaux</h3>
                <ul class="twitter-widget"></ul>
            </div>
            <div class="col-md-3 col-sm-6 footer-widget widget">
                <h3 style="color: white" class="widgettitle">Newsletter</h3>
                <p style="color: white">
                    Abonnez-vous à notre newsletter pour etre rapidement informé sur nos nouvelles promotions
                </p>
                <form method="post" id="newsletterform" name="newsletterform" class="newsletter-form"
                      action="mail/newsletter.php">
                    <input required type="email" name="nl-email" id="nl-email" placeholder="Saisir ici"
                           class="form-control">
                    <div class="form-group row">
                        <div style="width: 10px !important;" class="col-md-6 offset-md-4">
                            <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
                            @if($errors->has('g-recaptcha-response'))
                            <span>
                                <strong style="color: red">{{ $errors->first('g-recaptcha-response')}}</strong>
                                @endif
                            </span>
                        </div>
                    </div>
                    <input type="submit" name="nl-submit" id="nl-submit" class="btn btn-primary btn-block btn-lg"
                           value="Souscrire">
                </form>
                <div class="clearfix"></div>
                <div id="nl-message"></div>
            </div>
        </div>
    </div>
</footer>
<footer class="site-footer-bottom">
    <div class="container">
        <div class="row">
            <div class="copyrights-col-left col-md-12 col-sm-6">
                <p style="color: white">&copy; 2020 <a style="color: white" href="http://nataalagency.com/" bank>NataalAgency</a>.
                    Tous les droits sont réservés</p>
            </div>
        </div>
    </div>
</footer>
<!-- End Site Footer -->
<a id="back-to-top"><i class="fa fa-angle-double-up"></i></a>

