<div class="py-3 ">
    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3 ">
        <div class="col-6">
            <div class="input-group">
                <span class="btn btn-dark square">Rechercher</span>
                <input type="search" class="form-control square" wire:model="search" placeholder="Rechercher un personnel"
                    value="{{ $search }}">
            </div>
        </div>
        <div class="">
            <a class="btn btn-primary bg-cp square border-0 fw-bold" data-bs-toggle="modal"
                data-bs-target="#newpersonnel">
                <i class="fa-solid fa-user-plus"></i> Ajouter
            </a>
        </div>
    </div>

    <div class="modal fade" id="newpersonnel" tabindex="-1" aria-hidden="true" wire:ignore.self>

        <div class="modal-dialog modal-fullscreen " role="document">
            <div class="modal-content ">
                <form wire:submit.prevent="store">

                    <div class="modal-header bg-dark text-white d-flex ">
                        <div class="col-6 text-end">
                            <h3 class="fw-bold">Ajout d'un personnel</h3>
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
                        <div class="row me-1 ">
                            <div class="col-md-6 ">

                                <div class=" mt-2 d-flex justify-content-center align-items-center position-relative">
                                    <x-loading-indicator2 />
                                    <a id="imgupload" class="" onclick="$('#imginput').trigger('click'); return false;"
                                        role="button" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Clicker pour ajouter la photo du personnel ">
                                        <img alt="Photo du personnel" hover="Photo du personnel" src="{{ asset($url) }}"
                                            class="avatar border border-1 " id="avatar" height="150">
                                    </a>
                                    <input type="file" wire:model="filename" id="imginput" class="dimage"
                                        style="display: none;" onchange="readURL(this);" accept="image/*">
                                    <span class="text-danger">
                                        @error('photo')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12">
                                    <label for="nom" class="form-label text-muted fw-italic mb-0">Nom *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fas fa-user icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="nom" wire:model.defer="nom"
                                            placeholder="Nom de l'employé " required>
                                    </div>
                                    <span class="text-danger">
                                        @error('nom')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
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

                                <div class="mt-2 col-12">
                                    <label for="adresse" class="form-label text-muted fw-italic mb-0">Adresse *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-location-dot icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="adresse" wire:model.defer="adresse"
                                            placeholder="Adresse de l'employé" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('adresse')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="telephone" class="form-label text-muted fw-italic mb-0">Telephone
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-phone icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="telephone"
                                            wire:model.defer="telephone" placeholder="ex: 77123456 " required>
                                    </div>
                                    <span class="text-danger">
                                        @error('telephone')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="mt-2 col-12 ">
                                    <label for="email" class="form-label text-muted fw-italic mb-0">Email *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-at icnbgc"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" wire:model.defer="email"
                                            placeholder="L'email de l'employé" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('email')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>



                            </div>

                            <div class="col-md-6 row ">

                                <div class="mt-2 col-6 ">
                                    <label for="matricule" class="form-label text-muted fw-italic mb-0">Matricule
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-minus icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="matricule"
                                            wire:model.defer="matricule" placeholder="ex: 25/5d54" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('matricule')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="mt-2 col-6 ">
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

                                <div class="mt-2 col-12 ">
                                    <label for="grade" class="form-label text-muted fw-italic mb-0">Grade *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-star icnbgc"></i>
                                        </span>
                                        <select wire:model.defer="grade_id" class="form-select" id="grade">
                                            <option value="" selected>Select</option>
                                            @foreach ($grades as $choi)
                                            <option value="{{ $choi->id }}">{{ $choi->nom }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('grade')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="fonction" class="form-label text-muted fw-italic mb-0">Fonction
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-cog icnbgc"></i>
                                        </span>
                                        <select wire:model.defer="fonction_id" class="form-select" id="fonction">
                                            <option value="" selected>Select</option>
                                            @foreach ($fonctions as $choi)
                                            <option value="{{ $choi->id }}">{{ $choi->nom }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('fonction')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="departement" class="form-label text-muted fw-italic mb-0">Departement
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-building icnbgc"></i>
                                        </span>
                                        <select wire:model.defer="departement_id" class="form-select" id="departement">
                                            <option value="" selected>Select</option>
                                            @foreach ($departements as $choi)
                                            <option value="{{ $choi->id }}">{{ $choi->nom }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('departement')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="date_embauche" class="form-label text-muted fw-italic mb-0">Date
                                        d'embauche
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-calendar-days icnbgc"></i>
                                        </span>
                                        <input type="date" class="form-control " id="date_embauche"
                                            wire:model.defer="date_embauche" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('date_embauche')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="username" class="form-label text-muted fw-italic mb-0">Pseudo *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-font icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="username"
                                            wire:model.defer="username" placeholder="Le nom d'utilisateur" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('username')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="password" class="form-label text-muted fw-italic mb-0">Password
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-lock  icnbgc"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password"
                                            wire:model.defer="password" placeholder="Le mot de passe" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('password')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
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
                <form wire:submit.prevent="update">

                    <div class="modal-header bg-dark text-white d-flex ">
                        <div class="col-6 text-end">
                            <h3 class="fw-bold">Modication d'un utilisateur</h3>
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
                        <div class="row me-1 ">
                            <div class="col-md-6 ">

                                <div class=" mt-2 d-flex justify-content-center align-items-center position-relative">
                                    <x-loading-indicator2 />
                                    <a id="imgupload" class="" onclick="$('#imginput2').trigger('click'); return false;"
                                        role="button" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                        title="Clicker pour ajouter la photo du personnel ">
                                        <img alt="Photo du personnel" hover="Photo du personnel" src="{{ asset($url) }}"
                                            class="avatar border border-1 " id="avatar" height="150">
                                    </a>
                                    <input type="file" wire:model="filename2" id="imginput2" class="dimage"
                                        style="display: none;" onchange="readURL(this);" accept="image/*">
                                    <span class="text-danger">
                                        @error('photo')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12">
                                    <label for="nom" class="form-label text-muted fw-italic mb-0">Nom *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fas fa-user icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="nom" wire:model.defer="nom"
                                            placeholder="Nom de l'employé " required>
                                    </div>
                                    <span class="text-danger">
                                        @error('nom')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="date_naissance" class="form-label text-muted fw-italic mb-0">Date de
                                        naissance
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-calendar-days icnbgc"></i>
                                        </span>
                                        <input type="date" class="form-control " id="date_naissance"
                                            wire:model="date_naissance" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('date_naissance')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12">
                                    <label for="adresse" class="form-label text-muted fw-italic mb-0">Adresse *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-location-dot icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="adresse" wire:model.defer="adresse"
                                            placeholder="Adresse de l'employé" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('adresse')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="telephone" class="form-label text-muted fw-italic mb-0">Telephone
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-phone icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="telephone"
                                            wire:model.defer="telephone" placeholder="ex: 77123456 " required>
                                    </div>
                                    <span class="text-danger">
                                        @error('telephone')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="mt-2 col-12 ">
                                    <label for="email" class="form-label text-muted fw-italic mb-0">Email *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-at icnbgc"></i>
                                        </span>
                                        <input type="email" class="form-control" id="email" wire:model.defer="email"
                                            placeholder="L'email de l'employé" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('email')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>



                            </div>

                            <div class="col-md-6 row ">

                                <div class="mt-2 col-6 ">
                                    <label for="matricule" class="form-label text-muted fw-italic mb-0">Matricule
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-minus icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="matricule"
                                            wire:model.defer="matricule" placeholder="ex: 25/5d54" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('matricule')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>


                                <div class="mt-2 col-6 ">
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

                                <div class="mt-2 col-12 ">
                                    <label for="grade" class="form-label text-muted fw-italic mb-0">Grade *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-star icnbgc"></i>
                                        </span>
                                        <select wire:model.defer="grade_id" class="form-select" id="grade">
                                            <option value="" selected>Select</option>
                                            @foreach ($grades as $choi)
                                            <option value="{{ $choi->id }}">{{ $choi->nom }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('grade')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="fonction" class="form-label text-muted fw-italic mb-0">Fonction
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-cog icnbgc"></i>
                                        </span>
                                        <select wire:model.defer="fonction_id" class="form-select" id="fonction">
                                            <option value="" selected>Select</option>
                                            @foreach ($fonctions as $choi)
                                            <option value="{{ $choi->id }}">{{ $choi->nom }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('fonction')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="departement" class="form-label text-muted fw-italic mb-0">Departement
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-building icnbgc"></i>
                                        </span>
                                        <select wire:model.defer="departement_id" class="form-select" id="departement">
                                            <option value="" selected>Select</option>
                                            @foreach ($departements as $choi)
                                            <option value="{{ $choi->id }}">{{ $choi->nom }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <span class="text-danger">
                                        @error('departement')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="date_embauche" class="form-label text-muted fw-italic mb-0">Date
                                        d'embauche
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-calendar-days icnbgc"></i>
                                        </span>
                                        <input type="date" class="form-control " id="date_embauche"
                                            wire:model.defer="date_embauche" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('date_embauche')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="username" class="form-label text-muted fw-italic mb-0">Pseudo *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-font icnbgc"></i>
                                        </span>
                                        <input type="text" class="form-control" id="username"
                                            wire:model.defer="username" placeholder="Le nom d'utilisateur" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('username')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="mt-2 col-12 ">
                                    <label for="password" class="form-label text-muted fw-italic mb-0">Password
                                        *</label>
                                    <div class="input-group">
                                        <span class="input-group-text txt fw-bold  text-white">
                                            <i class="fa-solid fa-lock  icnbgc"></i>
                                        </span>
                                        <input type="password" class="form-control" id="password"
                                            wire:model.defer="password" placeholder="Le mot de passe" required>
                                    </div>
                                    <span class="text-danger">
                                        @error('password')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="perm" tabindex="-1" aria-hidden="true" wire:ignore.self>

        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content ">
                <form wire:submit.prevent="attach">

                    <div class="modal-header bg-dark text-white d-flex ">
                        <div class="col-6 text-end">
                            <h3 class="fw-bold">Permissions de l'utilisateur</h3>
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

                    <div class="modal-body px-3 h-100">
                        <div class="row my-2">
                            <div class="col-12">
                                <div class="d-grid  dropdown-center btn align-middle">
                                    <button class="btn btn-secondary dropdown-toggle " type="button"
                                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                        Afficher les permissions
                                    </button>
                                    <div class="dropdown-menu" wire:ignore>
                                        @php
                                        $cntcb = 1;
                                        $cbidedit = 'cbidedit' . $cntcb;
                                        @endphp
                                        @foreach ($allPermissions as $choi)
                                        <div class="form-check mx-3 py-1">
                                            <input type="checkbox" class="form-check-input" id="{{ $cbidedit }}"
                                                value="{{ $choi->id }}" wire:model="selected_permisions">
                                            <label class="form-check-label" for="{{ $cbidedit }}">{{ $choi->groupe }} |
                                                {{ $choi->nom }} | {{ $choi->description }} </label>
                                        </div>
                                        @unless($loop->last)
                                        <hr class="dropdown-divider">
                                        @endunless
                                        @php
                                        $cntcb += 1;
                                        $cbidedit = 'cbidedit' . $cntcb;
                                        @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="accordion" id="accordionExample" wire:ignore.self>
        @php
        $cntac = 1;
        $fh = 'fh' . $cntac;
        $fc = 'fc' . $cntac;
        @endphp
        @foreach ($groupes as $groupe)

        <div class="accordion-item" wire:ignore.self>
            <h2 class="accordion-header" id="{{ $fh }}">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $fc }}"
                    aria-expanded="true" aria-controls="{{ $fc }}">
                    {{ $groupe }}
                </button>
            </h2>
            <div id="{{ $fc }}" class="accordion-collapse collapse @if($loop->first) show @endif "
                aria-labelledby="{{ $fh }}" data-bs-parent="#accordionExample" wire:ignore.self>
                <div class="accordion-body" wire:ignore.self>
                    @php
                    $cntcb = 1;
                    $cbidedit = 'cbidedit' . $cntcb. $groupe;
                    @endphp
                    @foreach ($allPermissions as $choi)
                    @if($choi->groupe == $groupe)
                    <ul class="list-group">
                        <li class="list-group-item">
                            <input type="checkbox" class="form-check-input" id="{{ $cbidedit }}" value="{{ $choi->id }}"
                                wire:model="selected_permisions">
                            <label class="form-check-label" for="{{ $cbidedit }}">{{ $choi->nom }} | {{
                                $choi->description
                                }} </label>
                        </li>
                    </ul>
                    @endif
                    @php
                    $cntcb += 1;
                    $cbidedit = 'cbidedit' . $cntcb. $groupe;
                    @endphp
                    @endforeach
                </div>
            </div>
        </div>

        @php
        $cntac += 1;
        $fh = 'fh' . $cntac;
        $fc = 'fc' . $cntac;
        @endphp
        @endforeach


    </div>

    <table class="table table-bordered border-dark table-striped table-hover table-sm align-middle " id="">
        <thead class="bg-dark text-white text-center">
            <th scope="col">#</th>
            <th scope="col">Photo</th>
            <th scope="col">Matricule</th>
            <th scope="col">Nom</th>
            <th scope="col">Telephone</th>
            <th scope="col">Fonction</th>
            <th scope="col">Departement</th>
            <th scope="col">Action</th>
        </thead>
        <tbody class="text-center">
            @if ($personnel->isNotEmpty())
            @php
            $cnt = 1;
            $editmodal = 'edit' . $cnt;
            $delmodal = 'delete' . $cnt;
            @endphp

            @foreach ($personnel as $key => $user)
            @php
            if($user->filename){
            $pprofil = $user->storage_path;
            } else {
            $pprofil = 'https://ui-avatars.com/api/?size=235&name=' . $user->nom;
            }
            @endphp
            <tr>
                <td>{{ $cnt }}</td>
                <td><img style="width: 60px; height: 60px; oject-fit: cover;" src="{{ asset($pprofil) }}" alt="Photo"
                        role="button" {{-- wire:click="showImg('{{ $materiel->id }}')" data-bs-toggle="modal"
                        data-bs-target="#imgmodal" --}}> </td>
                <td>{{ $user->matricule }}</td>
                <td>{{ $user->nom }}</td>
                <td>{{ $user->telephone }}</td>
                <td>{{ $user->fonction->nom }}</td>
                <td>{{ $user->departement->nom }}</td>
                <td class="td-actions ">
                    <a class="btn  " data-bs-toggle="modal" data-bs-target="#edit"
                        wire:click="loadid('{{ $user->id }}')">
                        <i class="fas fa-edit" data-bs-toggle="tooltip" data-bs-placement="left"
                            title="Modifier l'utilisateur "></i>
                    </a>
                    <a class="btn  " data-bs-toggle="modal" data-bs-target="#perm"
                        wire:click="getPermissions('{{ $user->id }}')">
                        <i class="fas fa-pen-ruler" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Modifier les permissions l'utilisateur "></i>
                    </a>
                    <a class="btn  " data-bs-toggle="modal" data-bs-target="#delete"
                        wire:click="loadid('{{ $user->id }}')">
                        <i class="fas fa-trash-alt" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Supprimer l'utilisateur "></i>
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