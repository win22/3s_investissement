@if(Auth::check())
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>3s investissement</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/fontawesome-free/css/all.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/assets/dist/css/adminlte.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('backend/assets/plugins/toastr/toastr.min.css') }}">
    <!-- Google Font: Source Sans Pro -->

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark navbar-light">

        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" style="color: orangered" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <p hidden class="alert ">{{ $message = Session::get('message')}}</p>
        @if($message)
        <div id="alert"  class="alert alert-success alert-with-icon small right ml-5">
            <i class="fa fa-bell" data-notify="icon"></i>
            </button>
            <span class="text-center data-notify="message"> {{$message }} </span>
        </div>
        {{ Session::put('message',NULL) }}
        @endif

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    <span class="badge badge-danger navbar-badge">3</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Brad Diesel
                                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">Call me whenever you can...</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    John Pierce
                                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">I got your message bro</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">
                                    Nora Silvester
                                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                </h3>
                                <p class="text-sm">The subject goes here</p>
                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>

        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-orange elevation-4" >
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img style="width: 63px; border-radius: 60px" src="{{ asset('backend/img/logo.png')}}">
            <span class="brand-text text-white font-weight-light">3s investissement</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ URL::asset(Auth::user()->image)}}"  class="img-circle elevation-1">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item ">
                        <a href="/dashboard" class="nav-link {{ request()->is('dashboard')? 'active' : ''  }}" >
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Tableau de bord
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/all_admin" class="nav-link {{ request()->is('all_admin')? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Utilisateurs
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('all_appartement','add_appartement','detail_appart/{id}')? 'open-menu' : ''}} ">
                        <a href="#" class="nav-link {{ request()->is('all_appartement','add_appartement','detail_appart/{id}')? 'active' : ''}}">
                            <i class="nav-icon fas fa-store-alt"></i>
                            <p>
                                Appartements
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('appart') }}" class="nav-link {{ request()->is('all_appartement')? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste Appartements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/add_appartement" class="nav-link {{ request()->is('add_appartement')? 'active' : ''}}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter Appartements</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('all_villa','add_villa')? 'open-menu' : ''}} ">
                        <a href="#" class="nav-link {{ request()->is('all_villa','add_villa')? 'active' : ''}}">
                            <i class="nav-icon fas fa-house-damage"></i>
                            <p>
                                Villa
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('all_vil') }}" class="nav-link {{ request()->is('all_villa')?  'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste villa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/add_villa" class="nav-link {{ request()->is('add_villa')?  'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter Villa</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('all_im','add_im')? 'open-menu' : ''}} ">
                        <a href="#" class="nav-link {{ request()->is('all_im','add_im')? 'active' : ''}}">
                            <i class="nav-icon fas fa-hotel"></i>
                            <p>
                                Immeubles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('immeubles') }}" class="nav-link {{ request()->is('all_im')?  'active' : ''}} ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste immeubles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('add_immeubles') }}" class="nav-link {{ request()->is('add_im')?  'active' : ''}} ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter immeuble</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('all_appart','add_appart')? 'open-menu' : ''}} ">
                        <a href="#" class="nav-link {{ request()->is('all_bur','add_bur')? 'active' : ''}}">
                            <i class="nav-icon fas fa-chair"></i>
                            <p>
                                Burreau
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste Appartements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter Appartements</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('all_appart','add_appart')? 'open-menu' : ''}} ">
                        <a href="#" class="nav-link {{ request()->is('all_bur','add_bur')? 'active' : ''}}">
                            <i class="nav-icon fas fa-warehouse"></i>
                            <p>
                                Entreprôts
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste Appartements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter Appartements</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{ request()->is('all_entr','add_entr')? 'open-menu' : ''}} ">
                        <a href="#" class="nav-link {{ request()->is('all_entr','add_entr')? 'active' : ''}}">
                            <i class="nav-icon fas fa-store"></i>
                            <p>
                                Magasin
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste Appartements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter Appartements</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('all_entr','add_entr')? 'open-menu' : ''}} ">
                        <a href="#" class="nav-link {{ request()->is('all_entr','add_entr')? 'active' : ''}}">
                            <i class="nav-icon fas fa-ruler-combined"></i>
                            <p>
                                Terrain
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste Appartements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter Appartements</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{ request()->is('all_entr','add_entr')? 'open-menu' : ''}} ">
                        <a href="#" class="nav-link {{ request()->is('all_entr','add_entr')? 'active' : ''}}">
                            <i class="nav-icon fas fa-campground"></i>
                            <p>
                                Hectares
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Liste Appartements</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ajouter Appartements</p>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li class="nav-item">
                        <a href="/logout" class="nav-link">
                            <i style="color: orangered" class="nav-icon fas fa-power-off"></i>
                            <p>
                                Déconnexion
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">

            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
              @yield('contenu')
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



    <!-- Main Footer -->
    <footer class="main-footer card-success1 card-outline1">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            3s investissement suarl
        </div>
        <!-- Default to the left -->
        <span class="small">Copyright &copy; 2020 | Design by  <a  href="http://nataalagency.com/">Nataal Agency</a>.</span>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('backend/assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/assets/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('backend/assets/dist/js/my.js') }}"></script>
<script src="{{ asset('backend/assets/dist/js/app.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('backend/assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('backend/assets/plugins/toastr/toastr.min.js') }}"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>-->


<!-- Pour declenché l'action du bouton delete -->
<script type="text/javascript" src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js')}}"></script>
<script>
    $(document).on("click", "#delete",function (e) {
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Voulez-vous poursuivre cette action?", function (confirmed) {
            if (confirmed) {
                window.location.href = link;
            };
        });
    });
</script>
<!-- Pour mon modal de modification -->
<script>
    $('#updateModal').on('show.bs.modal', function (event) {

    var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var email = button.data('email')
        var role = button.data('role')

        var modal = $(this)
        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #role').val(role)
    })
</script>

<script>
    $('#updateModal2').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var email = button.data('email')
        var message = button.data('message')
        var phone = button.data('phone')
        var name_p = button.data('name_p')


        var modal = $(this)
        modal.find('.modal-body #id').val(id)
        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #email').val(email)
        modal.find('.modal-body #message').val(message)
        modal.find('.modal-body #phone').val(phone)
        modal.find('.modal-body #name_p').val(name_p)
    })
</script>

<!-- Pour afficher l'animation au niveau de l'alerte -->
<script>
    jQuery(function ($) {
        var alert = $('#alert');
        if(alert.length > 0){
            alert.hide().slideDown(730).delay(3850).slideUp(600);

        }
    })
</script>
<script type="text/javascript">
    $(function() {
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                type: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });

    });

</script>
<script>
    $(document).ready(function () {
        $(".forma").hide();

        $('.dynamic2').change(function () {

            if($(this).val() != '')
            {
                var select = $(this).attr("id");
                var value = $(this).val();

                if (value == 1) {
                    $(".forma").hide().slideDown("slow");
                };
                if (value ==2) {
                    $(".forma").hide().slideUp("slow");

                };
            }
        });
    });
</script>

<!--pour le slide du back-->
<script>
    $(document).ready(function () {
        $('.slider').bxSlider({
             sliderWidth: 500
        });
    });
</script>
<!-- pour le hover au niveau des card -->
<script>
    $(document).ready(function () {
        $('.carde').hover(
            function () {
                $(this).animate({
                    marginTop: "-1%",
                },100);
            },
            function () {
                $(this).animate({
                    marginTop: "0%",
                },100);
            }
        )
    });
</script>

<!--Annimation pour la transition -->

</body>
</html>
@endif