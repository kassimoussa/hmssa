<div class="py-3 ">

    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3 ">
        <div class="col-6">
            <div class="input-group">
                <span class="btn btn-dark square">Rechercher</span>
                <input type="search" class="form-control square" wire:model="search" placeholder="Rechercher un type "
                    value="{{ $search }}">
            </div>
        </div>
        <div class="">
            <a class="btn btn-primary bg-cp square border-0 fw-bold" data-bs-toggle="modal" data-bs-target="#newtype">
                <i class="fa-solid fa-plus"></i> Ajouter
            </a>
        </div>
    </div>

    <div class="modal fade" id="newtype" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Ajout d'un type d'examens </h3>
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
                            <div class="col-12 ">
                                <label for="nom" class="form-label">Type *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nom" wire:model="nom"
                                        placeholder="Ex: Bras " required>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <label for="description" class="form-label">Description *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <textarea class="form-control" wire:model="description" id="description" cols="30"
                                        rows="5"></textarea>
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
                        <h3>Modification de la fonction </h3>
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
                            <div class="col-12 ">
                                <label for="nom2" class="form-label">Type *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <input type="text" class="form-control" id="nom2" wire:model="nom2"
                                        placeholder="Ex: Bras " required>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <label for="description2" class="form-label">Description *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-tools"></i>
                                    </span>
                                    <textarea class="form-control" wire:model="description2" id="description2" cols="30"
                                        rows="5"></textarea>
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
                <th scope="col">Type</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </thead>
            <tbody class="text-center">
                @if ($types->isNotEmpty())
                @php
                $cnt = 1;
                $editmodal = 'edit' . $cnt;
                $delmodal = 'delete' . $cnt;
                @endphp

                @foreach ($types as $key => $row)

                <tr>
                    <td>{{ $cnt }}</td>
                    <td>{{ $row->nom }}</td>
                    <td>{{ $row->description }}</td>
                    <td class="td-actions ">
                        <div class="dropdown dropstart">
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false" id="dropdownMenu2">
                                <span class="badge rounded-pill  bg-cp"><i class="fas fa-ellipsis-h"></i></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="btn btn-transparent btn-xs dropdown-item  " data-bs-toggle="modal"
                                    data-bs-target="#edit" wire:click="loadid('{{ $row->id }}')"
                                    title="Modifier le type">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <a class="btn btn-transparent btn-xs dropdown-item  " data-bs-toggle="modal"
                                    data-bs-target="#delete" wire:click="loadid('{{ $row->id }}')"
                                    title="Supprimer le type">
                                    <i class="fas fa-trash-alt"></i> Supprimer
                                </a>
                            </div>
                        </div>
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