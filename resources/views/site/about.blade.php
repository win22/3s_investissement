@extends('site.layout')
@section('content')
<div class="page">
    <div class="row reveal">
        <div class="col-md-6 col-sm-6">
            <h3>Mission &amp; Vision</h3>
            <p style="text-align: justify">
                3S-Investissement Suarl, est une société immobilière qui véhicule dans les différents secteurs d’activités de l'immobiliers Tels que :<br/>
                Nous proposons à notre  clientèle :<br/>
                <ul>
                <li> - La Vente et le Courtage de Vergers,Terrains Habitable, Agricoles partout Au Sénégal</li>
                <li> - La Location de Biens Immobiliers ( Terrains, Villas,Immeubles, Appartements,Bureaux,Dépôts...)</li>
                <li> - La location Meublé A Court et Long Terme.</li>
                <li> - La Constitution, le dépôt et la suivie des dossiers de demande de titre de propriété (bail, titre foncier,Délibération)
                </li>
                <li> - L’Expertise immobilière (Immeuble,Terrain,Villa,Hectare...).</li>
                <li> - La Construction et la rénovation de bâtiments ( Immeuble, Terrain,Villa,Bureau...)</li>
                <li> - La Pose de clôture pour sécuriser un périmètre déterminé.</li>
                <li> - La Gérance,le Conseil en Investissement....</li>
            </ul>
            </p>

            <p style="text-align: justify">
                Nous avons une équipe compétent,dynamique et tres sérieux,Votre besoin est notre priorité
                Toute l’équipe de 3S-Investissement serait tres ravi d’accueillir toutes vos demandes et d'y répondre rapidement efficacement dans un délais court
                .<br/> Gerant de 3S-Investissement - Mr Diop
            </p>
             </div>
        <div class="col-md-6 col-sm-6">
            <h3>Autres infos</h3>
            <!-- Start Accordion -->
            <div class="accordion" id="accordionArea">
                <div class="accordion-group panel">
                    <div class="accordion-heading accordionize"> <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordionArea">Pourquoi devriez-vous nous choisir <i class="fa fa-angle-down"></i> </a> </div>
                    <div id="oneArea" class="accordion-body in collapse">
                        <div class="accordion-inner">
                        <p style="text-align: justify">
                            3S-Investissement Suarl,société immobilière implante au Sénégal, depuis une dizaine d’années, a su être parmi les leaders dans ce domaine.

                            Nous sommes les plus dynamiques,Sérieux et professionnels.

                            Nous avons à travers ses années résolus plus de 300 demandes de nos clients.

                            Aujourd’hui 80% des demandes de nos clients ont été satisfaites.

                            Nous sommes la, que pour nos clients.

                            Votre confort, notre priorité.
                        </p>
                        </div>
                </div>
            </div>
            <!-- End Accordion -->
        </div>
    </div>
</div>
    <div class="padding-tb45 bottom-blocks">
        <div class="container">
            <div class="row">
                <h3 class="text-center">Notre équipe</h3>
                <div style="padding-bottom: 10px" class="col-md-4 col-sm-4 latest-testimonials column carde">
                    <ul class="testimonials">
                        <li style="padding-top: 15px">
                            <img style="width: 190px !important; height: 180px; border-color: tomato"
                                 src="{{ asset('site/image/dg.jpg') }}" alt="Happy Client"
                                 class="testimonial-sender">
                            <cite>Monsieur - <strong> DIOP</strong>

                                <br><a style="color: tomato">Directeur Général</a>
                            </cite>
                        </li>
                    </ul>
                </div>
                <div style="padding-bottom: 10px" class="col-md-4 col-sm-4 latest-testimonials column carde">
                    <ul class="testimonials">
                        <li style="padding-top: 15px">
                            <img style="width: 190px !important; height: 180px;  border-color: tomato"
                                 src="{{ asset('site/image/sc.jpg') }}" alt="Happy Client"
                                 class="testimonial-sender">
                            <cite>Madame - <strong>NDIAYE</strong>
                                <br><a style="color: tomato; padding-top: 15px">Assistante de Direction</a>
                            </cite>
                        </li>
                    </ul>
                </div>
                <div style="padding-bottom: 10px" class="col-md-4 col-sm-4 latest-testimonials column carde">
                    <ul class="testimonials">
                        <li style="padding-top: 15px">
                            <img style="width: 190px !important; height: 180px;  border-color: tomato"
                                 src="{{ asset('site/image/au.jpg') }}" alt="Happy Client"
                                 class="testimonial-sender">
                            <cite>Monsieur - <strong>SAMBOU</strong>
                                <br><a style="color: tomato; padding-top: 15px">Agent Commercial</a>
                            </cite>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection