@php
use App\Models\User;
use Carbon\Carbon;

$perms = User::where('id', session('id'))->with("permissions")->first();
$perms_groupes = $perms->permissions->pluck('groupe');
$perms_ids = $perms->permissions->pluck('id');

//dd($perms_ids);

@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    {{--
    <link rel="icon" href="{{ asset('favicon.ico') }}"> --}}

    <title>{{ $page }}</title>

    @livewireStyles

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/main.css') }}">
    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/flatpickr.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('lib/main.js') }}"></script>
    <script src="{{ asset('lib/locales-all.js') }}"></script>
    {{-- <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" />
    --}}
    <!-- Or for RTL support -->
    <style>
        .dataTables_filter,
        .dataTables_length {
            margin-top: 10px;
            margin-bottom: 10px;
            float: left;
        }

        /* Square button */
        .square {
            border-radius: 0 !important;
        }

        .bg-cp {
            background-color: #282733 !important;
        }

        .modal-content {
            background-color: #f1f2f5 !important; 
        }

    </style>

</head>

<body {{-- oncontextmenu='return false' --}} class='snippet-body'>

    <body class="body-pd" id="body-pd">

        <!-- Page Heading -->
        <header class="header" id="header">
            <div class="header_toggle">
                <i class="fas fa-bars" id="header-toggle"></i>
            </div>
            <div class="titre d-flex justify-content-center align-content-center   me-auto ms-2  ">
                {{-- <img src="{{ asset('images/fadLogo3.png') }}" class="fw-bold ms-2 " alt="Accueil" height="36"
                    title="Accueil"> --}} <h3 class="fw-bold ms-2 ">FAD SSA</h3>
            </div>
            <div class="navbar-nav float-end ">
                <h5 class="fw-bold text-primary">{{ session('nom') }} </h5>
            </div>
        </header>
        <!-- Page Sidebar -->

        <div class="l-navbar" id="nav-bar">
            <nav class="nav nav_">
                <div class="nav_list">
                    <a href="{{ url('/') }}" class="nav_link mb-3 mt- @if($pageSlug == "index") activee @endif ">
                        <i class='fa-solid fa-hospital nav_icon ' data-bs-toggle=" tooltip"
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

                    <a href="{{ url('/visites') }}" class="nav_link  @if($pageSlug == "visites") activee @endif ">
                        <i class='fa-solid fa-calendar-days nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Visites"></i>
                        <span class="nav_name">Visites</span>
                    </a>
                    <a href="{{ url('/personnel') }}" class="nav_link  @if($pageSlug == "personnel") activee @endif ">
                        <i class='fa-solid fa-users nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Personnel"></i>
                        <span class="nav_name">Personnel</span>
                    </a>
                    <a href="{{ url('/patients') }}" class="nav_link  @if($pageSlug == "patients") activee @endif ">
                        <i class='fa-solid fa-hospital-user nav_icon' data-bs-toggle="tooltip"
                        data-bs-placement="right" title="Patients"></i>
                        <span class="nav_name">Patients</span>
                    </a>

                    {{-- @if ($perms_groupes->contains('Pharmacie')) --}}
                        <a href="{{ url('/pharmacie') }}" class="nav_link  @if($pageSlug == "pharmacie") activee @endif ">
                            <i class='fa-sharp fa-solid fa-prescription-bottle-medical nav_icon' data-bs-toggle="tooltip"
                            data-bs-placement="right" title="Pharmacie"></i>
                            <span class="nav_name">Pharmacie</span>
                        </a>
                    {{-- @endif --}}
                    <a href="{{ url('/laboratoire') }}"  href="#" class="nav_link   @if($pageSlug == "laboratoire") activee @endif ">
                        <i class='fa-solid fa-flask nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Laboratoire"></i>
                        <span class="nav_name">Laboratoire</span>
                    </a>
                    <a href="{{ url('/radiologie') }}"   href="#"  class="nav_link   @if($pageSlug == "radiologie") activee @endif ">
                        <i class='fa-solid fa-x-ray nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                        title="Radiologie"></i>
                        <span class="nav_name">Radiologie</span>
                    </a>
                    <a href="{{ url('/administration') }}" class="nav_link   @if($pageSlug == "admin") activee @endif ">
                        <i class='fas fa-cogs nav_icon fa-2x' data-bs-toggle="tooltip" data-bs-placement="right"
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

                    <a href="{{ url('logout') }}" class="nav_link">
                        <i class='fas fa-sign-out-alt  nav_icon' data-bs-toggle="tooltip" data-bs-placement="right"
                            title="Déconnexion"></i>
                        <span class="nav_name">Déconnexion</span>
                    </a>
                </div>

            </nav>
        </div>

        <!-- Page Content -->
        <!--Container Main start-->

        <div class="main-c  p-3">
            @yield('content')
            <x-go-top />
        </div>

        @stack('modals')

        @stack('scripts')

        
        <script>
            var goTopHandler = function(e) {
                $('.go-top').on('click', function(e) {
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                    e.preventDefault();
                });
            };

            $(document).ready(function(){
                $('[data-bs-toggle="tooltip"]').tooltip();   
            });
            /* const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl)) */

            $(document).ready(function() {
                $('table.liste').DataTable({
                    "paging": false,
                    "info": false,
                    "searching": true,
                    /* "scrollY": "600px",
                    "scrollCollapse": true, */
                    "filter": false,
                    /* "language": { 
                        url:  'js/datatablefr.json'
                    },  */
                });
            });

            $(document).ready(function() {
                $(".flatpickr").flatpickr({
                    dateFormat: "d/m/Y",
                });
            });
            
            window.addEventListener('close-modal', event => {
                $('.modal').modal('hide');
            }); 

            window.addEventListener('eventAction', event => {
                $('#eventAction').modal('show');
            }); 


            window.addEventListener('alert', event => {
                toastr[event.detail.type](event.detail.message,
                    event.detail.title ?? ''), toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
            }); 

            
        </script>

        {{-- <script> 
            Echo.channel('public.refetch.1')
            .listen('refetch', (event) => {
            console.log(event);
            //calendar.refetchEvents();
            });
        </script> --}}

        @livewireScripts
        <script src="{{ asset('js/alpinejs.min.js') }}"></script>
        @yield('script')

    </body>

</html>