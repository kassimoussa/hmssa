<div wire:poll>
    @unless($level != "1") 
        <div class="text-end my-2 ">
            <a class="btn btn-primary bg-cp square border-0 fw-bold" data-bs-toggle="modal" data-bs-target="#new_labo">
                <i class="fa-solid fa-plus"></i> Ajouter
            </a>
        </div>
     @endunless

    <div class="col ">

        <table
            class="table table-bordered border-dark table-striped table-hover table-sm align-middle "
            id="">
            <thead class="bg-dark text-white text-center">
                <th scope="col">#</th>
                <th scope="col">Type d'examens</th>
                <th scope="col">Status</th>
                <th scope="col">Résultat</th>
                @unless($level != "1") <th scope="col">Action</th> @endunless
            </thead>
            <tbody class="text-center">
                @if ($examens->isNotEmpty())
                @php
                $cnt = 1; 
                @endphp

                @foreach ($examens as $key => $row)
                @php
                    $btnshow = $btndelete = $txt = $bg =  " ";
                    if($row->status == "NON")
                    {
                        $btnshow = "disabled"; 
                        $btndelete = " ";
                        $txt = "En cours";
                        $bg = "bg-primary";
                    } else {
                        $btnshow = " ";
                        $btndelete = "disabled";
                        $txt = "Réalisée";
                        $bg = "bg-success";
                    }
                @endphp
                <tr>
                    <td>{{ $cnt }}</td>
                    <td>{{ $row->type->nom }}</td>
                    <td><span class="badge rounded-pill {{ $bg }}">{{ $txt }}</span> </td>
                    <td >
                        <button class="btn btn-primary  bg-cp " data-bs-toggle="modal" data-bs-target="#show_resultats"
                            wire:click="loadid('{{ $row->id }}')" title="Voir les résultats" {{ $btnshow }}>
                            Voir les résultats
                        </button>
                    </td>
                    @unless($level != "1") 
                    <td class="td-actions "> 
                        <button class="btn  " data-bs-toggle="modal" data-bs-target="#delete"
                            wire:click="loadid('{{ $row->id }}')" title="Supprimer l'examens"  {{ $btndelete }}>
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                    @endunless
                </tr>

                @php
                $cnt += 1; 
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

    <div class="modal fade" id="new_labo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Demande d'un examens de laboratoire </h3>
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
                                <label for="examen_typeid" class="form-label">Type d'exmens *</label>
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold bg-primary text-white">
                                        <i class="fas fa-x-ray"></i>
                                    </span>
                                    <select wire:model.defer="examen_typeid" class="form-select" id="fa-x-ray">
                                        <option value="" selected>Select</option>
                                        @foreach ($examen_types as $choi)
                                        <option value="{{ $choi->id }}">{{ $choi->nom }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    
    <div class="modal fade" id="show_resultats" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between">
                    <h3>Résultats d'Examens </h3>
                    <div class="row" style="text-align: center;">
                        <div class=" form-group">
                            <button type="button" class="btn btn-danger fw-bold " wire:click="close_modal"
                                data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row my-2">
                        <div class="col-12 ">
                            <div class="input-group mb-3 ">
                                <span class="input-group-text txt fw-bold text-dark">
                                    Résultats
                                </span>
                                <textarea class="form-control " wire:model="resultats" id="" cols="30"
                                    rows="3"> </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>