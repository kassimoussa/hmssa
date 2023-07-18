<div class="py-3 ">
    
    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3 ">
        <div class="col-6">
            <div class="input-group">
                <span class="btn btn-dark square">Rechercher</span>
                <input type="search" class="form-control square" wire:model="search" placeholder="Rechercher par nom ou categorie du grade "
                    value="{{ $search }}">
            </div>
        </div>
        <div class="">
            <a class="btn btn-primary bg-cp square border-0 fw-bold" data-bs-toggle="modal"
                data-bs-target="#newgrade">
                <i class="fa-solid fa-plus"></i> Ajouter
            </a>
        </div>
    </div>

    <div class="modal fade" id="newgrade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Ajout d'un grade </h3>
                        <div class="row" style="text-align: center;">
                            <div class=" form-group">
                                <button type="submit" name="submit" class="btn btn-primary fw-bold"
                                    data-bs-dismiss="modal">Enregistrer</button>
                                <button type="button" class="btn btn-danger fw-bold " wire:click="close_modal"
                                    data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row my-2">
                            <div class="col-6 ">
                                <label for="categorie" class="form-label">Categorie *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <select wire:model.defer="categorie" class="form-select" id="categorie">
                                        <option value="" selected>Select</option>
                                        <option value="Officier">Officier</option>
                                        <option value="Sous-Officer">Sous-Officer</option>
                                        <option value="Militaire du Rang">Militaire du Rang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <label for="nom" class="form-label">Nom *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nom" wire:model="nom"
                                        placeholder="Ex: Général, Sergent" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="modal fade" id="edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <form wire:submit.prevent="update">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Modification de grade </h3>
                        <div class="row" style="text-align: center;">
                            <div class=" form-group">
                                <button type="submit" name="submit" class="btn btn-primary fw-bold"
                                    data-bs-dismiss="modal">Enregistrer</button>
                                <button type="button" class="btn btn-danger fw-bold " wire:click="close_modal"
                                    data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="row my-2">
                            <div class="col-6 ">
                                <label for="categorie" class="form-label">Categorie *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <select wire:model.defer="categorie" class="form-select" id="categorie">
                                        <option value="" selected>Select</option>
                                        <option value="Officier">Officier</option>
                                        <option value="Sous-Officer">Sous-Officer</option>
                                        <option value="Militaire du Rang">Militaire du Rang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6 ">
                                <label for="nom" class="form-label">Nom *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nom" wire:model="nom"
                                        placeholder="Ex: Général, Sergent" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="col ">

        <table class="table table-bordered border-dark table-striped table-hover table-sm align-middle " id="" wire:poll>
            <thead class="bg-dark text-white text-center">
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Categorie</th>
                <th scope="col">Action</th>
            </thead>
            <tbody class="text-center">
                @if ($grades->isNotEmpty())
                @php
                $cnt = 1;
                $editmodal = 'edit' . $cnt;
                $delmodal = 'delete' . $cnt;
                @endphp

                @foreach ($grades as $key => $grade)

                <tr>
                    <td>{{ $cnt }}</td>
                    <td>{{ $grade->nom }}</td>
                    <td>{{ $grade->categorie }}</td>
                    <td class="td-actions ">
                        <a class="btn  " data-bs-toggle="modal" data-bs-target="#edit"
                            wire:click="loadid('{{ $grade->id }}')" title="Modifier la grade">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn  " data-bs-toggle="modal" data-bs-target="#delete"
                            wire:click="loadid('{{ $grade->id }}')" title="Supprimer la grade">
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