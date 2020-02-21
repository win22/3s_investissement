@extends('site.layout')
@section('content')
<div class="page">
    <div class="row reveal">
        <div class="col-md-6 col-sm-6">
            <h3>Mission &amp; Vision</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam euismod sollicitudin nunc, eget pretium massa. Ut sed adipiscing enim, pellentesque ultrices erat. Integer placerat felis neque, et semper augue ullamcorper in. Pellentesque iaculis leo iaculis aliquet ultrices. Suspendisse potenti. Aenean ac magna faucibus, consectetur ligula vel, feugiat est. Nullam imperdiet semper neque eget euismod. Nunc commodo volutpat semper.</p>
        </div>
        <div class="col-md-6 col-sm-6">
            <h3>Pourquoi devriez-vous nous choisir</h3>
            <!-- Start Accordion -->
            <div class="accordion" id="accordionArea">
                <div class="accordion-group panel">
                    <div class="accordion-heading accordionize"> <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordionArea" href="#oneArea"> We are real people <i class="fa fa-angle-down"></i> </a> </div>
                    <div id="oneArea" class="accordion-body in collapse">
                        <div class="accordion-inner"> Donec sed odio dui. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra augue.</div>
                    </div>
                </div>
                <div class="accordion-group panel">
                    <div class="accordion-heading accordionize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionArea" href="#twoArea"> Friendly Agents to deal with <i class="fa fa-angle-down"></i> </a> </div>
                    <div id="twoArea" class="accordion-body collapse">
                        <div class="accordion-inner"> Donec sed odio dui. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra augue.</div>
                    </div>
                </div>
                <div class="accordion-group panel">
                    <div class="accordion-heading accordionize"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionArea" href="#threeArea"> Notifications for your rent payments <i class="fa fa-angle-down"></i> </a> </div>
                    <div id="threeArea" class="accordion-body collapse">
                        <div class="accordion-inner"> Donec sed odio dui. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Sed posuere consectetur est at lobortis. Nulla vitae elit libero, a pharetra augue.</div>
                    </div>
                </div>
            </div>
            <!-- End Accordion -->
        </div>
    </div>
    <div class="row reveal-2">
        <div class="col-md-12">
            <div class="block-heading">
                <h4><span class="heading-icon"><i class="fa fa-user"></i></span>Notre equipe</h4>
            </div>
        </div>
    </div>
    <div class="row reveal-3">
        <ul class="owl-carousel owl-alt-controls" data-columns="4" data-autoplay="no" data-pagination="no" data-arrows="yes" data-single-item="no">
            <li class="item property-block">
                <a class="property-featured-image">
                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">

                </a>
                <div class="property-info">
                    <h4><a class="text-center" style="font-family: 'Manjari Regular'; padding-left: 15%">Ibrahimma DIALLO</a></h4>
                    <span style="padding-left: 30%" class="">Directeur Général</span>
                </div>
            </li>
            <li class="item property-block">
                <a class="property-featured-image">
                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">

                </a>
                <div class="property-info">
                    <h4><a class="text-center" style="font-family: 'Manjari Regular'; padding-left: 15%">Sagesse DIHAMBOU</a></h4>
                    <span style="padding-left: 35%" class="">IT Manager</span>
                </div>
            </li>
            <li class="item property-block">
                <a class="property-featured-image">
                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">

                </a>
                <div class="property-info">
                    <h4><a class="text-center" style="font-family: 'Manjari Regular'; padding-left: 15%">Malick DIALLO</a></h4>
                    <span style="padding-left: 35%" class="">Designer</span>
                </div>
            </li>
            <li class="item property-block">
                <a class="property-featured-image">
                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">

                </a>
                <div class="property-info">
                    <h4><a class="text-center" style="font-family: 'Manjari Regular'; padding-left: 15%">Sagesse DIHAMBOU</a></h4>
                    <span style="padding-left: 35%" class="">IT Manager</span>
                </div>
            </li>
            <li class="item property-block">
                <a class="property-featured-image">
                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">

                </a>
                <div class="property-info">
                    <h4><a class="text-center" style="font-family: 'Manjari Regular'; padding-left: 15%">Sagesse DIHAMBOU</a></h4>
                    <span style="padding-left: 35%" class="">IT Manager</span>
                </div>
            </li>
            <li class="item property-block">
                <a class="property-featured-image">
                    <img src="http://placehold.it/600x400&amp;text=IMAGE+PLACEHOLDER" alt="">

                </a>
                <div class="property-info">
                    <h4><a class="text-center" style="font-family: 'Manjari Regular'; padding-left: 15%">Sagesse DIHAMBOU</a></h4>
                    <span style="padding-left: 35%" class="">IT Manager</span>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection