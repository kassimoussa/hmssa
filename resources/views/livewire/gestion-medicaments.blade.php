<div class="py-3 ">

    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3 ">
        <div class="col-6">
            <div class="input-group">
                <span class="btn btn-dark square">Rechercher</span>
                <input type="search" class="form-control square" wire:model="search" placeholder="Rechercher un medicament"
                    value="{{ $search }}">
            </div>
        </div>
        <div class="">
            <a class="btn btn-primary bg-cp square border-0 fw-bold" data-bs-toggle="modal" data-bs-target="#newmedicament">
                <i class="fa-solid fa-plus"></i> Ajouter
            </a>
        </div>
    </div>

    <div class="modal fade" id="newmedicament" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Ajout d'un medicament </h3>
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
                                <label for="code" class="form-label">Code *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-barcode"></i>
                                    </span>
                                    <input type="number" class="form-control" id="code" wire:model="code"
                                        placeholder="Code du médicament " required>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <label for="nom" class="form-label">Nom *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-capsules"></i>
                                    </span>
                                    <textarea class="form-control" wire:model="nom" id="nom" cols="30"
                                        rows="2"></textarea>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <label for="forme" class="form-label">Forme *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <input type="text" class="form-control" id="forme" wire:model="forme"
                                        placeholder="Forme du médicament " required>
                                </div>
                            </div>

                            
                            <div class="col-12 ">
                                <label for="administration" class="form-label">Administration *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <input type="number" class="form-control" id="administration" wire:model="administration"
                                        placeholder="Administration du médicament " required>
                                </div>
                            </div>

                            <div class="col-12 ">
                                <label for="description" class="form-label">Description *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <textarea class="form-control" wire:model="description" id="description" cols="30"
                                        rows="3"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-12 ">
                                <label for="producteur" class="form-label">Producteur *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-industry"></i>
                                    </span>
                                    <input type="text" class="form-control" id="producteur" wire:model="producteur"
                                        placeholder="Ex: Sanofi " required>
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
        <div class="modal-dialog modal-fullscreen " role="document">
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

                            <div class="col-6 ">
                                <label for="code2" class="form-label">Code *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-barcode"></i>
                                    </span>
                                    <input type="number" class="form-control" id="code2" wire:model="code2"
                                        placeholder="Code du médicament " required>
                                </div>
                            </div>

                            <div class="col-6 ">
                                <label for="nom2" class="form-label">Nom *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <textarea class="form-control" wire:model="nom2" id="nom2" cols="30"
                                        rows="2"></textarea>
                                </div>
                            </div>

                            <div class="col-6 ">
                                <label for="forme2" class="form-label">Forme *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <input type="text" class="form-control" id="forme2" wire:model="forme2"
                                        placeholder="Forme du médicament " required>
                                </div>
                            </div>

                            
                            <div class="col-6 ">
                                <label for="administration2" class="form-label">Administration *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <input type="text" class="form-control" id="administration2" wire:model="administration2"
                                        placeholder="Administration du médicament " required>
                                </div>
                            </div>

                            <div class="col-6 ">
                                <label for="description2" class="form-label">Description *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span>
                                    <textarea class="form-control" wire:model="description2" id="description2" cols="30"
                                        rows="2"></textarea>
                                </div>
                            </div>
                            
                            <div class="col-6 ">
                                <label for="producteur2" class="form-label">Producteur *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-industry"></i>
                                    </span>
                                    <input type="text" class="form-control" id="producteur2" wire:model="producteur2"
                                        placeholder="Ex: Sanofi " required>
                                </div>
                            </div> 
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="col ">

        <table class="table table-bordered border-dark table-striped table-hover table-sm align-middle " id="" >
            <thead class="bg-dark text-white text-center">
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Forme</th>
                <th scope="col">Administration</th> 
                <th scope="col">Producteur</th> 
                <th scope="col">Action</th>
            </thead>
            <tbody class="text-center">
                @if ($medicaments->isNotEmpty())
                @php
                $cnt = 1;
                $editmodal = 'edit' . $cnt;
                $delmodal = 'delete' . $cnt;
                @endphp

                @foreach ($medicaments as $key => $row)

                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->nom }}</td>
                    <td>{{ $row->forme }}</td>
                    <td>{{ $row->producteur }}</td>
                    <td>{{ $row->administration }}</td>
                    <td class="td-actions ">
                        <div class="dropdown dropstart" wire:ignore.self>
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false" id="dropdownMenu2">
                                <span class="badge rounded-pill  bg-cp"><i class="fas fa-ellipsis-h"></i></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <a class="btn btn-transparent btn-xs dropdown-item  " data-bs-toggle="modal"
                                    data-bs-target="#edit" wire:click="loadid('{{ $row->id }}')"
                                    title="Modifier le medicament">
                                    <i class="fas fa-edit"></i> Modifier
                                </a>
                                <a class="btn btn-transparent btn-xs dropdown-item  " data-bs-toggle="modal"
                                    data-bs-target="#delete" wire:click="loadid('{{ $row->id }}')"
                                    title="Supprimer le medicament">
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
        
        <div class="d-flex justify-content-center">
            {{ $medicaments->links() }}
        </div>

    </div>



</div>