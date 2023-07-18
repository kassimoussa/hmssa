@php
use Carbon\Carbon;
@endphp

<div wire:poll>
    <div class="card my-3 position-relative" style="width: 100%; ">

        <a class="btn text-success  position-absolute top-0 start-100 translate-middle badge" data-bs-toggle="modal"
            data-bs-target="#edit">
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
                        <p class="text-muted fw-italic mb-0">Groupe sanguin</p>
                        <h5 class="fw-bold">{{ $patient->gp_sanguin }}</h5>
                    </div>
                    <div class=" mt-2 col ">
                        <p class="text-muted fw-italic mb-0">Date de naissance </p>
                        <h5 class="fw-bold">{{ Carbon::parse($patient->date_naissance)->format('d/m/Y') }} ({{
                            Carbon::parse($patient->date_naissance)->age }} ans)</h5>
                    </div>
                    <div class=" mt-2 col ">
                        <p class="text-muted fw-italic mb-0">Lieu de naissance</p>
                        <h5 class="fw-bold">{{ $patient->lieu_naissance }}</h5>
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

    <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true" wire:ignore.self>

        <div class="modal-dialog modal-fullscreen " role="document">
            <div class="modal-content ">
                <form wire:submit.prevent="update">

                    <div class="modal-header bg-dark text-white d-flex ">
                        <div class="col-6 text-end">
                            <h3 class="fw-bold">Info du patient</h3>
                        </div>

                        <div class="col-6 text-end pe-3">
                            <div class="row">
                                <div class="">
                                    <button type="submit" name="submit"
                                        class="btn btn-success square border-0  fw-bold">Enregistrer</button>
                                    <button  class="btn btn-danger square fw-bold"
                                        data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body px-3">
                        <div class="row ">
                            <div class="mt-3 col-6">
                                <label for="nom" class="form-label text-muted fw-italic mb-0">Nom *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fas fa-user icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nom" wire:model.defer="nom"
                                        placeholder="Nom du patient " required>
                                </div>
                                <span class="text-danger">
                                    @error('nom')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="matricule" class="form-label text-muted fw-italic mb-0">Matricule
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-minus icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="matricule" wire:model.defer="matricule"
                                        placeholder="ex: 25/5d54" required>
                                </div>
                                <span class="text-danger">
                                    @error('matricule')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="mt-3 col-6 ">
                                <label for="sexe" class="form-label text-muted fw-italic mb-0">Sexe *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fas fa-venus-mars icnbgc"></i>
                                    </span>
                                    <select wire:model.defer="sexe" class="form-select" id="sexe">
                                        <option value="" selected>Select</option>
                                        <option value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('sexe')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="mt-3 col-6 ">
                                <label for="gp_sanguin" class="form-label text-muted fw-italic mb-0">Groupe sanguin
                                    *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fas fa-venus-mars icnbgc"></i>
                                    </span>
                                    <select wire:model.defer="gp_sanguin" class="form-select" id="gp_sanguin">
                                        <option value="" selected>Select</option>
                                        <option value="A-">A-</option>
                                        <option value="A+">A+</option>
                                        <option value="B-">B-</option>
                                        <option value="B+">B+</option>
                                        <option value="AB-">AB-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="O-">O-</option>
                                        <option value="O+">O+</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('gp_sanguin')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="date_naissance" class="form-label text-muted fw-italic mb-0">Date de
                                    naissance
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-calendar-days icnbgc"></i>
                                    </span>
                                    <input type="date" class="form-control " id="date_naissance"
                                        wire:model.defer="date_naissance" required>
                                </div>
                                <span class="text-danger">
                                    @error('date_naissance')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="lieu_naissance" class="form-label text-muted fw-italic mb-0">Lieu de
                                    naissance *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-city icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="lieu_naissance"
                                        wire:model.defer="lieu_naissance" placeholder="Lieu de naissance du patient" required>
                                </div>
                                <span class="text-danger">
                                    @error('lieu_naissance')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="telephone" class="form-label text-muted fw-italic mb-0">Telephone
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-phone icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="telephone" wire:model.defer="telephone"
                                        placeholder="ex: 77123456 " required>
                                </div>
                                <span class="text-danger">
                                    @error('telephone')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="affiliation" class="form-label text-muted fw-italic mb-0">Affiliation
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-link icnbgc"></i>
                                    </span>
                                    <select wire:model.defer="affiliation" class="form-select" id="affiliation">
                                        <option value="" selected>Select</option>
                                        <option value="militaire">Militaire</option>
                                        <option value="Conjoint(e) du militaire">Conjoint(e) du militaire</option>
                                        <option value="Enfant du militaire">Enfant du militaire</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('affiliation')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-12  ">
                                <label for="adresse" class="form-label text-muted fw-italic mb-0">Adresse *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-location-dot icnbgc"></i>
                                    </span>
                                    <textarea class="form-control" id="adresse" wire:model.defer="adresse" cols="5"
                                        rows="3"></textarea>
                                </div>
                                <span class="text-danger">
                                    @error('adresse')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>