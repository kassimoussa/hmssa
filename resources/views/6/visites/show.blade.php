@extends('6.layout', ['page' => "Gestion des visites", 'pageSlug' => 'visites'])
@section('content')
    <div class="mt-2 ">
        
            <div class="card">
                <div class="card-header  bg-cp d-flex justify-content-center">
                    <h3 class="fw-bold text-white">Visite </h3> 
                </div>

                <div class="card-body">   

                    <div class="row my-3">
                        <div class="d-flex justify-content-between   bg-white mt-4 mb-2">
                            <h4 class="over-title">Patient </h4>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text txt fw-bold ">Nom</span> 
                                <input type="text" class="form-control iput" name="nom"  value="{{ $visite->patient->nom }}" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text txt fw-bold ">Matricule</span> 
                                <input type="text" class="form-control iput" name="maticule" value="{{ $visite->patient->matricule }}" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group   mb-3">
                                <span class="input-group-text txt fw-bold ">Date </span> 
                                <input type="text" class="form-control iput" name="date_visite" 
                                    value="{{ $visite->date }}" disabled required>
                            </div>
                        </div>

                    </div>

                    <div class="my-3">
                        <div class="d-flex justify-content-between   bg-white mb-2">
                            <h4 class="over-title mb-2">Médécin traitant </h4>
                        </div>
                        
                        <div class="col-md-12">
                            <select  class="form-select" id="grade">
                                <option value="" selected>Select</option> 
                                <option value="Habib">Habib</option>
                                <option value="Bouh">Bouh</option>
                                <option value="Mourad">Mourad</option>
                            </select>
                        </div>

                    </div>

                    <div class="my-3">
                        <div class="d-flex justify-content-between   bg-white mb-2">
                            <h4 class="over-title mb-2">Motif de consultation</h4>
                        </div>
                        
                        <div class="col-md-12">
                            <textarea class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>

                    </div>

                    <div class="row my-3">
                        <div class="d-flex justify-content-between   bg-white mb-2">
                            <h4 class="over-title mb-2">Paramètres </h4>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text txt fw-bold ">Température</span> 
                                <input type="text" class="form-control iput" name="nom_intervenant"  placeholder="Température du patient" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text txt fw-bold ">Tension</span> 
                                <input type="text" class="form-control iput" name="nom_site" placeholder="Tension du patient" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group   mb-3">
                                <span class="input-group-text txt fw-bold ">Glycémie </span> 
                                <input type="text" class="form-control iput" name="date_intervention" 
                                    placeholder="Taux de glycémie" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group   mb-3">
                                <span class="input-group-text txt fw-bold ">SpO2 </span> 
                                <input type="text" class="form-control iput" name="date_intervention" 
                                    placeholder="Taux d'oxygène sanguin" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group   mb-3">
                                <span class="input-group-text txt fw-bold ">Poids </span> 
                                <input type="text" class="form-control iput" name="date_intervention" 
                                    placeholder="Poids du patient" disabled required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group   mb-3">
                                <span class="input-group-text txt fw-bold ">Taille </span> 
                                <input type="text" class="form-control iput" name="date_intervention" 
                                    placeholder="Taille du patient" disabled required>
                            </div>
                        </div>

                    </div>

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
