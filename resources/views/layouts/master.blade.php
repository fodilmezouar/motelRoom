<!DOCTYPE html>
<?php
    $logo = \App\Parametre::find(1)->logo;


?>
<html class="app-ui">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- Document title -->
    <title>Pages &ndash; Blank | AppUI</title>

    <meta name="description" content="AppUI - Admin Dashboard Template & UI Framework" />
    <meta name="author" content="rustheme" />
    <meta name="robots" content="noindex, nofollow" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{asset('img/favicons/apple-touch-icon.png')}}" />
    <link rel="icon" href="{{asset('img/favicons/favicon.ico')}}" />

    <!-- Google fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400" />
    <!-- Page JS Plugins CSS -->
        <link rel="stylesheet" href="{{asset('js/plugins/datatables/jquery.dataTables.min.css')}}" />
    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="{{asset('css/font-awesome.css')}}" />
    <link rel="stylesheet" id="css-ionicons" href="{{asset('css/ionicons.css')}}" />
    <link rel="stylesheet" id="css-bootstrap" href="{{asset('css/bootstrap.css')}}" />
    <link rel="stylesheet" id="css-app" href="{{asset('css/app.css')}}" />
    <link rel="stylesheet" id="css-app-custom" href="{{asset('css/app-custom.css')}}" />
    <!-- End Stylesheets -->
</head>

<body class="app-ui layout-has-drawer layout-has-fixed-header">
<div class="app-layout-canvas">
    <div class="app-layout-container">

        <!-- Drawer -->
        <aside class="app-layout-drawer">

            <!-- Drawer scroll area -->
            <div class="app-layout-drawer-scroll">
                <!-- Drawer logo -->
                <div id="logo" class="drawer-header">
                    <a href="index.html"><img class="img" src="{{asset($logo)}}" title="AppUI" alt="AppUI" /></a>
                </div>

                <!-- Drawer navigation -->
                <nav class="drawer-main">
                    <ul class="nav nav-drawer">

                        <li class="nav-item nav-drawer-header">Application</li>

                        <li class="nav-item nav-item-has-subnav active open">
                            <a href="javascript:void(0)"><i class="ion-ios-browsers"></i> Réservation</a>
                            <ul class="nav nav-subnav">
                                <li class="active">
                                    <a href="{{url('reservation/reserver')}}">Réserver</a>
                                </li>
                                <li>
                                    <a href="{{url('reservation/liste')}}">Liste des Réservations</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-subnav active open">
                            <a href="javascript:void(0)"><i class="fa fa-plus-square"></i> Chambres</a>
                            <ul class="nav nav-subnav">
                                <li class="active">
                                    <a href="{{url('gestionChambres')}}">Gestion chambres</a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-subnav active open">
                            <a href="javascript:void(1)"><i class="ion-settings"></i> Parametre</a>
                            <ul class="nav nav-subnav">
                                <li>
                                    <a href="{{url('parametre')}}">Parametre</a>
                                </li>

                            </ul>
                        </li>



                    </ul>
                </nav>
                <!-- End drawer navigation -->

            </div>
            <!-- End drawer scroll area -->
        </aside>
        <!-- End drawer -->

        <!-- Header -->
        <header class="app-layout-header">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout" data-action="sidebar_toggle">
                            <span class="sr-only">Toggle drawer</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>


                </div>
                <!-- .container-fluid -->
            </nav>
            <!-- .navbar-default -->
        </header>
        <!-- End header -->

        <main class="app-layout-content">

            <!-- Page Content -->
            <div class="container-fluid p-y-md">
                @yield('content')
            </div>
            <!-- End Page Content -->

        </main>

    </div>
    <!-- .app-layout-container -->
</div>
<!-- .app-layout-canvas -->

<!-- Apps Modal -->
<!-- Opens from the button in the header -->
<div id="apps-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-sm modal-dialog modal-dialog-top">
        <div class="modal-content">
            <!-- Apps card -->
            <div class="card m-b-0">
                <div class="card-header bg-app bg-inverse">
                    <h4>Apps</h4>
                    <ul class="card-actions">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <div class="row text-center">
                        <div class="col-xs-6">
                            <a class="card card-block m-b-0 bg-app-secondary bg-inverse" href="index.html">
                                <i class="ion-speedometer fa-4x"></i>
                                <p>Admin</p>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a class="card card-block m-b-0 bg-app-tertiary bg-inverse" href="frontend_home.html">
                                <i class="ion-laptop fa-4x"></i>
                                <p>Frontend</p>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- .card-block -->
            </div>
            <!-- End Apps card -->
        </div>
    </div>
</div>
<!-- End Apps Modal -->

<div class="app-ui-mask-modal"></div>

<!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
<script src="{{asset('js/core/jquery.min.js')}}"></script>
<script src="{{asset('js/core/bootstrap.min.js')}}"></script>
<script src="{{asset('js/core/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('js/core/jquery.scrollLock.min.js')}}"></script>
<script src="{{asset('js/core/jquery.placeholder.min.js')}}"></script>
<script src="{{asset('js/appT.js')}}"></script>
<script src="{{asset('js/app-custom.js')}}"></script>
<script src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
@yield('scripts')
</body>

</html>