@extends('2.layout', ['page' => "Gestion des visites", 'pageSlug' => 'visites'])
@section('content')
<div class="mt-2 ">

    <x-toastr-alerts />

    <form action="{{ url('/visites/store') }}" role="form" method="post" class="form-card"
        enctype="multipart/form-data">
        @csrf

        <div class="card">
            <div class="card-header  bg-cp d-flex justify-content-center">
                <h3 class="fw-bold text-white">Nouvelle Consultation </h3>
            </div>

            <div class="card-body">

                <div class="row my-3">
                    <div class="d-flex justify-content-between   bg-white mt-4 mb-2">
                        <h4 class="over-title">Patient </h4>
                    </div>

                    <div class="col-md-12">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt fw-bold ">Nom</span>
                            <input type="text" class="form-control iput" name="nom_patient" value="{{ $visite->patient->nom }}"
                                disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt fw-bold ">Matricule</span>
                            <input type="text" class="form-control iput" name="maticule"
                                value="{{ $visite->patient->matricule }}" disabled required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group   mb-3">
                            <span class="input-group-text txt fw-bold ">Date </span>
                            <input type="text" class="form-control iput" name="date" value="{{ $visite->date }}"
                                disabled required>
                        </div>
                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-between   bg-white mb-2">
                        <h4 class="over-title mb-2">Médécin traitant </h4>
                    </div>

                    <div class="col-md-12">
                        <select class="form-select" name="medecin_id" id="grade">
                            <option value="" selected>Select</option>
                            @foreach ($medecins as $medecin)
                                <option value="{{ $medecin->id }}">{{ $medecin->nom }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>

                <div class="my-3">
                    <div class="d-flex justify-content-between   bg-white mb-2">
                        <h4 class="over-title mb-2">Motif de consultation</h4>
                    </div>

                    <div class="col-md-12">
                        <textarea class="form-control" name="motif" id="" cols="30" rows="5"></textarea>
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
                                placeholder="Température du patient" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group mb-3 ">
                            <span class="input-group-text txt fw-bold ">Tension</span>
                            <input type="text" class="form-control iput" name="tension"
                                placeholder="Tension du patient" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group   mb-3">
                            <span class="input-group-text txt fw-bold ">Glycémie </span>
                            <input type="text" class="form-control iput" name="glycemie"
                                placeholder="Taux de glycémie" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group   mb-3">
                            <span class="input-group-text txt fw-bold ">SpO2 </span>
                            <input type="text" class="form-control iput" name="spo2"
                                placeholder="Taux d'oxygène sanguin" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group   mb-3">
                            <span class="input-group-text txt fw-bold ">Poids </span>
                            <input type="text" class="form-control iput" name="poids"
                                placeholder="Poids du patient" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group   mb-3">
                            <span class="input-group-text txt fw-bold ">Taille </span>
                            <input type="text" class="form-control iput" name="taille"
                                placeholder="Taille du patient" required>
                        </div>
                    </div>

                </div>

                <div class="d-flex justify-content-center my-2">
                    <div class=" form-group">
                        <button type="submit" name="submit"
                            class="btn btn-primary fw-bold me-1">Enregistrer</button>
                        <button type="reset" class="btn btn-outline-danger  fw-bold">Annuler</button>
                        <input type="text" name="patient_id" value="{{ $visite->patient_id }}" hidden>
                        <input type="text" name="visite_id" value="{{ $visite->id }}" hidden>
                    </div>
                </div>

            </div>
        </div>
    </form>
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