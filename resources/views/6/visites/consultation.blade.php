@php
use Carbon\Carbon;
@endphp

@extends('6.layout', ['page' => "Gestion des visites", 'pageSlug' => 'visites'])
@section('content')
    <div class="mt-2 ">
        
            <div class="card">
                <div class="card-header  bg-cp d-flex justify-content-center">
                    <h3 class="fw-bold text-white">Consultation </h3> 
                </div>

                <div class="card-body">   

                    <div class="row mb-3">
                        <div class="d-flex justify-content-between   bg-white mt-4 mb-2">
                            <h4 class="over-title">Patient </h4>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text txt fw-bold ">Nom</span> 
                                <input type="text" class="form-control iput" name="nom"  value="{{ $consultation->patient->nom }}" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text txt fw-bold ">Matricule</span> 
                                <input type="text" class="form-control iput" name="maticule" value="{{ $consultation->patient->matricule }}" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group   mb-3">
                                <span class="input-group-text txt fw-bold ">Date </span> 
                                <input type="text" class="form-control iput" name="date" 
                                    value="{{ Carbon::parse($consultation->date)->format('d/m/Y à H:i:s')  }}" disabled required>
                            </div>
                        </div>

                    </div>

                    <div class="my-3">
                        <div class="d-flex justify-content-between   bg-white mb-2">
                            <h4 class="over-title mb-2">Médécin traitant </h4>
                        </div>
                        
                        <div class="col-md-12"> 
                            <input type="text" class="form-control iput" name="medecin_id" 
                            value="{{ $consultation->medecin->nom }}" disabled required>
                        </div>

                    </div>

                    <div class="my-3">
                        <div class="d-flex justify-content-between   bg-white mb-2">
                            <h4 class="over-title mb-2">Motif de consultation</h4>
                        </div>
                        
                        <div class="col-md-12">
                            <textarea class="form-control iput" name="motif" id="" cols="30" rows="5" disabled> {{ $consultation->motif }} </textarea>
                        </div>

                    </div>
 
                    <div class="row my-3">
                        <div class="d-flex justify-content-between   bg-white mb-2">
                            <h4 class="over-title mb-2">Paramètres </h4>
                        </div>
    
                        <div class="col-md-6">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text txt fw-bold ">Température</span>
                                <input type="text" class="form-control iput" name="temperature"
                                    placeholder="Température du patient" value="{{ $consultation->temperature }}" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text txt fw-bold ">Tension</span>
                                <input type="text" class="form-control iput" name="tension"
                                    placeholder="Tension du patient" value="{{ $consultation->tension }}" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group   mb-3">
                                <span class="input-group-text txt fw-bold ">Glycémie </span>
                                <input type="text" class="form-control iput" name="glycemie"
                                    placeholder="Taux de glycémie" value="{{ $consultation->glycemie }}" disabled  required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group   mb-3">
                                <span class="input-group-text txt fw-bold ">SpO2 </span>
                                <input type="text" class="form-control iput" name="spo2"
                                    placeholder="Taux d'oxygène sanguin" value="{{ $consultation->spo2 }}" disabled  required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group   mb-3">
                                <span class="input-group-text txt fw-bold ">Poids </span>
                                <input type="text" class="form-control iput" name="poids"
                                    placeholder="Poids du patient" value="{{ $consultation->poids }}" disabled  required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group   mb-3">
                                <span class="input-group-text txt fw-bold ">Taille </span>
                                <input type="text" class="form-control iput" name="taille"
                                    placeholder="Taille du patient" value="{{ $consultation->taille }}" disabled  required>
                            </div>
                        </div>
    
                    </div>

                    <livewire:consultation-partie-medecin :consultation_id="$consultation->id" />

                </div>
            </div>

    </div>

    <style>
        .btn-default:hover {
            background-color: red !important;
            color: white;
        }

        .btn-primary {
            color: white;
        }

        .txt {
            width: 150px;
            background: lavender;
        }

        .iput {
            background: white !important;
        }

        .cbox {}
    </style>

@endsection
