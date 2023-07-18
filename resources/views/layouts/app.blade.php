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

    <title>@yield('title')</title>

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

        @yield('menu')

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

            window.addEventListener('alert', event => {
                toastr[event.detail.type](event.detail.message,
                    event.detail.title ?? ''), toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                }
            }); 

            
        </script>

        @livewireScripts
        <script src="{{ asset('js/alpinejs.min.js') }}"></script>
        @yield('script')

    </body>

</html>