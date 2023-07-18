@extends('2.layout', ['page' => "Gestion des visites", 'pageSlug' => 'visites'])
@section('content')
<div class="containe">

    <style>
        @media (max-width: 767px) {
            .hid {
                display: none;
            }
        }


        @media (max-width: 767px) {
            #calendar-wrap {
                max-width: 100%;
            }

        }

        #calendar {

            margin: 0 auto;
        }

        .fc-toolbar-title {
            text-transform: uppercase;
        }

        .fc-col-header-cell-cushion {
            text-transform: capitalize;
        }

        .fc-list-day-text {
            text-transform: capitalize;
        }

        .fc-event:hover {
            cursor: pointer;
        }
    </style>

    <div class="d-flex justify-content-between ">
        <h3 class="over-title ">Gestion de visites </h3>
    </div>

    {{-- <div class="d-flex justify-content-end mb-3 ">
        <div class="">
            <a class="btn btn-primary bg-cp square border-0 fw-bold" data-bs-toggle="modal" data-bs-target="#newpatient"
                title="Ajouter un patient">
                <i class="fa-solid fa-user-plus"></i> Ajouter
            </a>
        </div>
    </div> --}}





    <div wire:ignore.self>
        <div id='calendar-wrap' wire:ignore.self>
            <div id='calendar' wire:ignore.self></div>
        </div>
    </div>

    <livewire:gestion-visites2 />

</div>

@endsection