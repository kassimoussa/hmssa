<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--
    <link rel="icon" href="{{ asset('favicon.ico') }}"> --}}

    <title>Test 2</title>


    @vite(['resources/js/app.js'])

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/main2.css') }}">
    <!-- Scripts -->
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
    --}}
    <!-- Or for RTL support -->
    <style>
        .dataTables_filter {
            margin-top: 10px;
            margin-bottom: 10px;
            float: left;
        }
    </style>

</head>

<body oncontextmenu='return false' class='snippet-body'>

    <body class="body-pd" id="body-pd">

        <!-- Page Heading -->
        <header class="header" id="header">
            <div class="header_toggle">
                <i class="fas fa-bars" id="header-toggle"></i>
            </div>
            <div class="titre d-flex justify-content-center align-content-center   me-auto ms-2  ">
                {{-- <img src="{{ asset('images/fadLogo3.png') }}" class="fw-bold ms-2 " alt="Accueil" height="36"
                    title="Accueil"> --}} <h3 class="fw-bold ms-2 ">FAD Santé Hospial System</h3>
            </div>
            <div class="navbar-nav float-end ">
                <h5 class="fw-bold text-primary">Kassim </h5>
            </div>
        </header>
        <!-- Page Sidebar -->

        <div class="l-navbar" id="nav-bar">
            <nav class="nav nav_">
                <div class="nav_list">
                    <a href="#" class="nav_link mb-3 mt- activee">
                        <i class='fa-solid fa-house-medical nav_icon ' data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Accueil"></i>
                        <span class="nav_name">Accueil</span>
                    </a>


                    {{-- <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                        aria-controls="collapseExample" class="nav_link  has-submenu">
                        <i class='fas fa-warehouse nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Docteurs"></i>
                        <span class="nav_name">Docteurs</span>
                    </a>

                    <ul class="collapse" id="collapseExample">
                        <li class="nav_link_sub"><a href="#">Liste</a></li>
                        <li class="nav_link_sub"><a href="#">Ajouter</a></li>
                    </ul> --}}

                    <a href="#" class="nav_link ">
                        <i class='fa-solid fa-user-doctor nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Medecins"></i>
                        <span class="nav_name">Medecins</span>
                    </a>
                    <a href="#" class="nav_link ">
                        <i class='fa-solid fa-user-nurse nav_icon' data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Infirmiers"></i>
                        <span class="nav_name">Infirmiers</span>
                    </a>
                    <a href="#" class="nav_link ">
                        <i class='fa-sharp fa-solid fa-prescription-bottle-medical nav_icon' data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Pharmacie"></i>
                        <span class="nav_name">Pharmacie</span>
                    </a>
                    <a href="#" class="nav_link ">
                        <i class='fa-solid fa-flask-vial nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Laboratoire"></i>
                        <span class="nav_name">Laboratoire</span>
                    </a>
                    <a href="#" class="nav_link ">
                        <i class='fa-solid fa-x-ray nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Radiologie"></i>
                        <span class="nav_name">Radiologie</span>
                    </a>
                    <a href="#" class="nav_link ">
                        <i class='fa-solid fa-hospital-user nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Patients"></i>
                        <span class="nav_name">Patients</span>
                    </a>
                    <a href="#" class="nav_link d-flex align-content-center ">
                        <i class='fas fa-user-cog nav_icon fa-2x' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Administration"></i>
                        <span class="nav_name">Administration</span>
                    </a>

                </div>
                <div>
                    <a href="#" class="nav_link ">
                        <i class='fas fa-user  nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Profile"></i>
                        <span class="nav_name">Profile</span>
                    </a>

                    <a href="#" class="nav_link">
                        <i class='fas fa-sign-out-alt  nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Déconnexion"></i>
                        <span class="nav_name">Déconnexion</span>
                    </a>
                </div>

            </nav>
        </div>

        <!-- Page Content -->
        <!--Container Main start-->

        <div class="container-fluid  ">
            @yield('content')
        </div>

        @stack('modals')

        @stack('scripts')

        <script>
            $(document).ready(function(){
                $('[data-bs-toggle="tooltip"]').tooltip();   
            });
            /* const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)) */
        </script>

    </body>

</html>