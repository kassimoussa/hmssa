@php
use Carbon\Carbon;
@endphp

<div>
    <div class="card my-3 position-relative" style="width: 100%; ">

        <a class="btn text-success  position-absolute top-0 start-100 translate-middle badge" data-bs-toggle="modal"
            data-bs-target="#editmodal">
            <i class="fas fa-edit fa-xl"></i>
        </a>


        <div class="d-flex justify-content-between">
            {{-- <div class="float-left col  m-0">
                <img src="{{ asset($photo) }}" class="img-  rounded-top-start " width="120" height="120" alt="...">
            </div> --}}
            <div class="col-12 px-5 ">
                <div class="row justify-content-between my-3">
                    <div class="mt-2 col-5">
                        <p class="text-muted fw-italic mb-0">Nom</p>
                        <h5 class="fw-bold">{{ $patient->nom }}</h5>
                    </div>
                    <div class=" mt-2 col ">
                        <p class="text-muted fw-italic mb-0">Matricule</p>
                        <h5 class="fw-bold">{{ $patient->matricule}}</h5>
                    </div>
                    <div class="mt-2 col">
                        <p class="text-muted fw-italic mb-0">Sexe</p>
                        <h5 class="fw-bold">{{ $patient->sexe}}</h5>
                    </div>
                </div>
                <div class="row justify-content-between mb-3">
                    <div class=" mt-2 col-5 ">
                        <p class="text-muted fw-italic mb-0">Date de naissance </p>
                        <h5 class="fw-bold">{{ Carbon::parse($patient->date_naissance)->format('d/m/Y') }} </h5>
                    </div>
                    <div class=" mt-2 col ">
                        <p class="text-muted fw-italic mb-0">Lieu de naissance</p>
                        <h5 class="fw-bold">{{ $patient->lieu_naissance }}</h5>
                    </div>
                    <div class=" mt-2 col ">
                        <p class="text-muted fw-italic mb-0">Age</p>
                        <h5 class="fw-bold">{{ Carbon::parse($patient->date_naissance)->age }}</h5>
                    </div>
                </div>

                <div class="row justify-content-between mb-3">
                    <div class="col-5">
                        <p class="text-muted fw-italic mb-0">Adresse</p>
                        <h5 class="fw-bold">{{ $patient->adresse }}</h5>
                    </div>
                    <div class=" col ">
                        <p class="text-muted fw-italic mb-0">Téléphone</p>
                        <h5 class="fw-bold">{{ $patient->telephone }}</h5>
                    </div>
                    <div class="col">
                        <p class="text-muted fw-italic mb-0">Affiliation</p>
                        <h5 class="fw-bold">{{ $patient->affiliation }}</h5>
                    </div>
                </div>



            </div>

            
        </div>
    </div>
</div>

</div>
</div>