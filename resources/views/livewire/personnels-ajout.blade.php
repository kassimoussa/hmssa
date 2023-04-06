<div class="modal fade" id="newpersonnel" tabindex="-1" aria-hidden="true" wire:ignore.self>

    <div class="modal-dialog modal-fullscreen " role="document">
        <div class="modal-content ">
            <form wire:submit.prevent="submit">

                <div class="modal-header bg-dark text-white d-flex ">
                    <div class="col-6 text-end">
                        <h3 class="fw-bold">Ajout d'un personnel</h3>
                    </div>

                    <div class="col-6 text-end pe-3">
                        <div class="row">
                            <div class="">
                                <button type="submit" name="submit"
                                    class="btn btn-success btn-square border-0  fw-bold">Enregistrer</button>
                                <button type="reset" class="btn btn-danger btn-square fw-bold"
                                    data-bs-dismiss="modal">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-body px-3"> 
                        <div class="row me-1 ">
                            <div class="col-md-6 ">

                                <div class=" mt-2 text-center">
                                    <a role="button" id="imgupload" class=""
                                        onclick="$('#dimage').trigger('click'); return false;">
                                        <img alt="Image de profile" hover="Image de profile"
                                            src="{{ asset('images/addphoto.png') }}" class="avatar border border-1 "
                                            height="150" id="avatar">
                                    </a>
                                    <input type="file" name="photo" id="dimage" class="dimage" style="display: none;"
                                        onchange="readURL(this);" accept="image/*">
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
                                        <input type="text" class="form-control flatpickr" id="date_naissance"
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
                                        <select wire:model.defer="grade" class="form-select" id="grade">
                                            <option value="" selected>Select</option>
                                            <option value="Caporal">Caporal</option>
                                            <option value="Colonel">Colonel</option>
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
                                        <select wire:model.defer="fonction" class="form-select" id="fonction">
                                            <option value="" selected>Select</option>
                                            <option value="Medecin">Medecin</option>
                                            <option value="Radilogue">Radilogue</option>
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
                                        <select wire:model.defer="departement" class="form-select" id="departement">
                                            <option value="" selected>Select</option>
                                            <option value="Radiologie">Radiologie</option>
                                            <option value="Medecine Generale">Medecine Generale</option>
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
                                        <input type="text" class="form-control flatpickr" id="date_embauche"
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