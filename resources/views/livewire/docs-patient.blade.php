<div>
    <div class="card my-5 p-3" style="width: 100%; height: 300px;">

        <div class="d-flex justify-content-end mb-4">
            <button class="btn btn-primary fw-bolder" data-bs-toggle="modal" data-bs-target="#add_docs">
                <i class="fas fa-file-medical me-1 "></i> AJOUTER
            </button>

            <div class="modal fade" id="add_docs" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-hidden="true" wire:ignore.self>
                <div class="modal-dialog modal-dialog-centere modal-lg ">
                    <div class="modal-content">
                        <form wire:submit.prevent="submit">
                            <div class="modal-header d-flex justify-content-between">
                                <h1 class="modal-title fs-5">Ajout de document</h1>

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
                                <div class="row">

                                    <div class="mt-2 col-12 ">
                                        <label for="nom" class="form-label text-muted fw-italic mb-0">Nom *</label>
                                        <div class="input-group">
                                            <span class="input-group-text txt fw-bold  text-white">
                                                <i class="fa-solid fa-n icnbgc"></i>
                                            </span>
                                            <input type="text" class="form-control" id="nom" wire:model.defer="nom"
                                                placeholder="le nom du docment" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('nom')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>

                                    <div class="mt-2 col-12 ">
                                        <label for="description" class="form-label text-muted fw-italic mb-0">Description *</label>
                                        <div class="input-group">
                                            <span class="input-group-text txt fw-bold  text-white">
                                                <i class="fa-solid fa-d icnbgc"></i>
                                            </span>
                                            <textarea class="form-control" id="description" wire:model.defer="description" cols="5" rows="5">  </textarea>
                                        </div>
                                        <span class="text-danger">
                                            @error('description')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    
                                    <div class="mt-2 col-12 ">
                                        <label for="filename" class="form-label text-muted fw-italic mb-0">Document *</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="filename" wire:model.defer="filename" required>
                                            <span class="input-group-text txt fw-bold  text-white">
                                                <i class="fa-solid fa-file icnbgc"></i>
                                            </span>
                                        </div>
                                        <span class="text-danger">
                                            @error('filename')
                                            {{ $message }}
                                            @enderror
                                        </span>
                                    </div>
                                    
                                    <div class="mt-2 col-12 ">
                                        <label for="date" class="form-label text-muted fw-italic mb-0">Date *</label>
                                        <div class="input-group">
                                            <span class="input-group-text txt fw-bold  text-white">
                                                <i class="fa-solid fa-calendar-days icnbgc"></i>
                                            </span>
                                            <input type="date" class="form-control" id="date" wire:model.defer="date" required>
                                        </div>
                                        <span class="text-danger">
                                            @error('date')
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

        <table class="table table-bordered table-striped hover table-sm align-middle ">
            <thead class="bg-dark text-white text-center">
                <th>#</th>
                <th>Nom </th>
                <th>Actions</th>
            </thead>
            <tbody class="text-center">

                @if ($docs->isNotEmpty())
                    @php
                        $cnt = 1;
                        $editmodal = 'edit' . $cnt;
                        $delmodal = 'delete' . $cnt;
                        $showmodal = 'showmodal' . $cnt;
                    @endphp

                    @foreach ($docs as $doc)
                        <tr>
                            <td>{{ $cnt }}</td>
                            <td>{{ $doc->title }}</td>
                            <td>
                                <div class="dropdown dropstart">
                                    <button type="button" class="btn  dropdown-toggle" data-bs-toggle="dropdown"
                                        aria-expanded="false" id="dropdownMenu2">
                                        <span class="badge rounded-pill bg-primary"><i
                                                class="fas fa-ellipsis-h"></i></span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        
                                        <a class="btn btn-transparent btn-xs " data-bs-toggle="modal"
                                            data-bs-target="#{{ $showmodal }}">
                                            <i class="fas fa-eye"></i> Voir
                                        </a>

                                        <a class="btn btn-transparent btn-xs dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#{{ $editmodal }}"
                                            wire:click="edit('{{ $doc->id }}')">
                                            <i class="fas fa-edit"></i> Editer
                                        </a>

                                        <a wire:click="download('{{ $doc->storage_path }}')"
                                            class="btn btn-transparent btn-xs dropdown-item">
                                            <i class="fas fa-download "></i> Télécharger
                                        </a>

                                        <a class="btn btn-transparent btn-xs dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#{{ $delmodal }}"
                                            wire:click="delid('{{ $doc->id }}')">
                                            <i class="fas fa-trash-alt"></i> Supprimer
                                        </a>

                                    </div>
                                </div>
                            </td>
                        </tr>

                        {{-- <div class="modal fade" id="{{ $showmodal }}" tabindex="-1"
                            aria-labelledby="voirtoutrTitle" aria-hidden="true">
                            <div class="modal-dialog modal-fullscreen modal-dialog-centered modal-dialog-scrollable"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header d-flex justify-content-end">
                                        <button type="button" class="btn btn-danger fw-bold "
                                            data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <iframe width="100%" height="100%" style="border:none;"
                                            src="{{ asset($doc->storage_path) }}" ></iframe>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        @php
                            $cnt += 1;
                            $editmodal = 'edit' . $cnt;
                            $delmodal = 'delete' . $cnt;
                            $showmodal = 'showmodal' . $cnt;
                        @endphp
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Aucun documents trouvé .</td>
                    </tr>
                @endif
            </tbody>
        </table>


    </div>

</div>