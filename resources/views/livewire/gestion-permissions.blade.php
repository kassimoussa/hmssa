<div class="py-3 ">
    
    <x-loading-indicator />

    <div class="d-flex justify-content-end mb-3 ">
        {{-- <div class="col-6">
            <div class="input-group">
                <span class="btn btn-dark square">Rechercher</span>
                <input type="search" class="form-control square" wire:model="search" placeholder="Rechercher par nom ou categorie du grade "
                    value="{{ $search }}">
            </div>
        </div> --}}
        <div class="">
            <a class="btn btn-primary bg-cp square border-0 fw-bold" data-bs-toggle="modal"
                data-bs-target="#newpermission">
                <i class="fa-solid fa-plus"></i> Ajouter
            </a>
        </div>
    </div>

    <div class="modal fade" id="newpermission" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl " role="document">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Ajout une permission </h3>
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
                            <div class="col-4 ">
                                <label for="groupe" class="form-label">Groupe *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <select wire:model.defer="groupe" class="form-select" id="groupe">
                                        <option value="" selected>Select</option>
                                        <option value="Personnel">Personnel</option>
                                        <option value="Patients">Patients</option>
                                        <option value="Pharmacie">Pharmacie</option>
                                        <option value="Laboratoire">Laboratoire</option>
                                        <option value="Radiologie">Radiologie</option>
                                        <option value="Administration">Administration</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 ">
                                <label for="nom" class="form-label">Nom *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nom" wire:model="nom"
                                        placeholder="Ex: Ajout, Modif, ... etc" required>
                                </div>
                            </div>
                            <div class="col-4 ">
                                <label for="description" class="form-label">Description *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <input type="text" class="form-control" id="description" wire:model="description"
                                        placeholder="Description de la permission" required>
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
        <div class="modal-dialog modal-xl " role="document">
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
                            <div class="col-4 ">
                                <label for="groupe" class="form-label">Groupe *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <select wire:model.defer="groupe" class="form-select" id="groupe">
                                        <option value="" selected>Select</option>
                                        <option value="Personnel">Personnel</option>
                                        <option value="Patients">Patients</option>
                                        <option value="Pharmacie">Pharmacie</option>
                                        <option value="Laboratoire">Laboratoire</option>
                                        <option value="Radiologie">Radiologie</option>
                                        <option value="Administration">Administration</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4 ">
                                <label for="nom" class="form-label">Nom *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nom" wire:model="nom"
                                        placeholder="Ex: Ajout, Modif, ... etc" required>
                                </div>
                            </div>
                            <div class="col-4 ">
                                <label for="description" class="form-label">Description *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <input type="text" class="form-control" id="description" wire:model="description"
                                        placeholder="Description de la permission" required>
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
                <th scope="col">Groupe</th>
                <th scope="col">Nom</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </thead>
            <tbody class="text-center">
                @if ($permissions->isNotEmpty())
                @php
                $cnt = 1;
                $editmodal = 'edit' . $cnt;
                $delmodal = 'delete' . $cnt;
                @endphp

                @foreach ($permissions as $key => $permission)

                <tr>
                    <td>{{ $cnt }}</td>
                    <td>{{ $permission->groupe }}</td>
                    <td>{{ $permission->nom }}</td>
                    <td>{{ $permission->description }}</td>
                    <td class="td-actions ">
                        <a class="btn  " data-bs-toggle="modal" data-bs-target="#edit"
                            wire:click="loadid('{{ $permission->id }}')" title="Modifier la permission">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="btn  " data-bs-toggle="modal" data-bs-target="#delete"
                            wire:click="loadid('{{ $permission->id }}')" title="Supprimer la permission">
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