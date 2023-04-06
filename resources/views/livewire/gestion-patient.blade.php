@php
use Carbon\Carbon;
@endphp

<div class="py-3 ">
    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3 ">
        <div class="col-6">
            <div class="input-group">
                <span class="btn btn-dark square">Rechercher</span>
                <input type="search" class="form-control square" wire:model="search" placeholder="Rechercher un patient"
                    value="{{ $search }}">
            </div>
        </div>
        <div class="">
            <a class="btn btn-primary bg-cp square border-0 fw-bold" data-bs-toggle="modal"
                data-bs-target="#newpatient" title="Ajouter un patient">
                <i class="fa-solid fa-user-plus"></i> Ajouter
            </a>
        </div>
    </div>

    <div class="modal fade" id="newpatient" tabindex="-1" aria-hidden="true" wire:ignore.self>

        <div class="modal-dialog modal-fullscreen " role="document">
            <div class="modal-content ">
                <form wire:submit.prevent="store">

                    <div class="modal-header bg-dark text-white d-flex ">
                        <div class="col-6 text-end">
                            <h3 class="fw-bold">Ajout de nouveau patient</h3>
                        </div>

                        <div class="col-6 text-end pe-3">
                            <div class="row">
                                <div class="">
                                    <button type="submit" name="submit"
                                        class="btn btn-success square border-0  fw-bold">Enregistrer</button>
                                    <button type="reset" wire.click="close_modal" class="btn btn-danger square fw-bold"
                                        data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body px-3  " >
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

                            <div class="mt-3 col-3 ">
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


                            <div class="mt-3 col-3 ">
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
                                        wire:model.defer="lieu_naissance" placeholder="Lieu de naissance du patient"
                                        required>
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

    <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true" wire:ignore.self>

        <div class="modal-dialog modal-fullscreen " role="document">
            <div class="modal-content ">
                <form wire:submit.prevent="store">

                    <div class="modal-header bg-dark text-white d-flex ">
                        <div class="col-6 text-end">
                            <h3 class="fw-bold">Info du patient</h3>
                        </div>

                        <div class="col-6 text-end pe-3">
                            <div class="row">
                                <div class="">
                                    <button type="submit" name="submit"
                                        class="btn btn-success square border-0  fw-bold">Enregistrer</button>
                                    <button type="reset" wire.click="close_modal" class="btn btn-danger square fw-bold"
                                        data-bs-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-body px-3">
                        <div class="row ">
                            <div class="mt-3 col-6">
                                <label for="nom2" class="form-label text-muted fw-italic mb-0">Nom *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fas fa-user icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nom2" wire:model.defer="nom2"
                                        placeholder="Nom du patient " required>
                                </div>
                                <span class="text-danger">
                                    @error('nom2')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-3 ">
                                <label for="matricule2" class="form-label text-muted fw-italic mb-0">Matricule
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-minus icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="matricule2" wire:model.defer="matricule2"
                                        placeholder="ex: 25/5d54" required>
                                </div>
                                <span class="text-danger">
                                    @error('matricule2')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>


                            <div class="mt-3 col-3 ">
                                <label for="sexe2" class="form-label text-muted fw-italic mb-0">Sexe *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fas fa-venus-mars icnbgc"></i>
                                    </span>
                                    <select wire:model.defer="sexe2" class="form-select" id="sexe2">
                                        <option value="" selected>Select</option>
                                        <option value="Homme">Homme</option>
                                        <option value="Femme">Femme</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('sexe2')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="date_naissance2" class="form-label text-muted fw-italic mb-0">Date de
                                    naissance
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-calendar-days icnbgc"></i>
                                    </span>
                                    <input type="date" class="form-control " id="date_naissance2"
                                        wire:model.defer="date_naissance2" required>
                                </div>
                                <span class="text-danger">
                                    @error('date_naissance2')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="lieu_naissance2" class="form-label text-muted fw-italic mb-0">Lieu de
                                    naissance *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-city icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="lieu_naissance2"
                                        wire:model.defer="lieu_naissance2" placeholder="Lieu de naissance du patient"
                                        required>
                                </div>
                                <span class="text-danger">
                                    @error('lieu_naissance2')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="telephone2" class="form-label text-muted fw-italic mb-0">Telephone
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-phone icnbgc"></i>
                                    </span>
                                    <input type="text" class="form-control" id="telephone2" wire:model.defer="telephone2"
                                        placeholder="ex: 77123456 " required>
                                </div>
                                <span class="text-danger">
                                    @error('telephone2')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-6 ">
                                <label for="affiliation2" class="form-label text-muted fw-italic mb-0">Affiliation
                                    *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-link icnbgc"></i>
                                    </span>
                                    <select wire:model.defer="affiliation2" class="form-select" id="affiliation2">
                                        <option value="" selected>Select</option>
                                        <option value="militaire">Militaire</option>
                                        <option value="Conjoint(e) du militaire">Conjoint(e) du militaire</option>
                                        <option value="Enfant du militaire">Enfant du militaire</option>
                                    </select>
                                </div>
                                <span class="text-danger">
                                    @error('affiliation2')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mt-3 col-12  ">
                                <label for="adresse2" class="form-label text-muted fw-italic mb-0">Adresse *</label>
                                <div class="input-group">
                                    <span class="input-group-text txt fw-bold  text-white">
                                        <i class="fa-solid fa-location-dot icnbgc"></i>
                                    </span>
                                    <textarea class="form-control" id="adresse2" wire:model.defer="adresse2" cols="5"
                                        rows="3"></textarea>
                                </div>
                                <span class="text-danger">
                                    @error('adresse2')
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


    <div class="col ">

        <table class="table table-bordered border-dark table-striped table-hover table-sm align-middle " id="">
            <thead class="bg-dark text-white text-center">
                <th scope="col">#</th>
                {{-- <th scope="col">Photo</th> --}}
                <th scope="col">Matricule</th>
                <th scope="col">Nom</th>
                <th scope="col">Age</th>
                <th scope="col">Sexe</th>
                <th scope="col">Affilication</th>
                <th scope="col">Action</th>
            </thead>
            <tbody class="text-center">
                @if ($patients->isNotEmpty())
                @php
                $cnt = 1;
                $editmodal = 'edit' . $cnt;
                $delmodal = 'delete' . $cnt;
                @endphp

                @foreach ($patients as $key => $patient)
                @php
                if($patient->sexe == "Homme"){
                $affi = "Le militaire";
                } else {
                $affi = "La militaire";
                }
                @endphp

                <tr>
                    <td>{{ $cnt }}</td>
                    {{-- <td><img style="width: 60px; height: 60px; oject-fit: cover;" src="{{ asset($photo) }}"
                            alt="Photo du patient"> </td> --}}
                    <td>{{ $patient->matricule }}</td>
                    <td>{{ $patient->nom }}</td>
                    <td>{{ Carbon::parse($patient->date_naissance)->age }}</td>
                    <td>{{ $patient->sexe }}</td>
                    <td>{{ $affi }}</td>
                    <td class="td-actions ">
                        <a class="btn  " href="{{ url("/patients/show", $patient->id ) }}" title="Voir la fiche du
                            patient ">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a class="btn  " data-bs-toggle="modal" data-bs-target="#edit"
                            wire:click="loadid('{{ $patient->id }}')" title="Modifier les informations du patient ">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a class="btn  " data-bs-toggle="modal" data-bs-target="#delete"
                            wire:click="loadid('{{ $patient->id }}')" title="Supprimer le patient ">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>

                @php
                $cnt += 1;
                $editmodal = 'edit' . $cnt;
                $delmodal = 'delete' . $cnt;
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="10">There are no data.</td>
                </tr>
                @endif

                <x-delete-modal delmodal="delete" message="Confirmer la suppression " delf="delete" />

            </tbody>
        </table>
    </div>



</div>