<div {{-- wire:poll --}}>
    @unless($level != "1")
    <div class="text-end my-2 ">
        <a class="btn btn-primary bg-cp square border-0 fw-bold" data-bs-toggle="modal" data-bs-target="#new_pres">
            <i class="fa-solid fa-plus"></i> Ajouter
        </a>
    </div>
    @endunless



    <div class="col ">

        <table class="table table-bordered border-dark table-striped table-hover table-sm align-middle " id="">
            <thead class="bg-dark text-white text-center">
                <th scope="col">#</th>
                <th scope="col">Medicament</th>
                <th scope="col">Quantité</th>
                <th scope="col">Status</th>
                @unless($level != "1") <th scope="col">Action</th> @endunless
            </thead>
            <tbody class="text-center">
                @if ($prescriptions->isNotEmpty())
                @php
                $cnt = 1;
                @endphp

                @foreach ($prescriptions as $key => $row)
                @php
                $btnshow = $btndelete = $txt = $bg = " ";
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
                    <td>{{ $row->medicament->nom }}</td>
                    <td>{{ $row->quantite }}</td>
                    <td><span class="badge rounded-pill {{ $bg }}">{{ $txt }}</span> </td>
                    @unless($level != "1")
                    <td class="td-actions ">
                        <button class="btn  " data-bs-toggle="modal" data-bs-target="#delete"
                            wire:click="loadid('{{ $row->id }}')" title="Supprimer l'examens" {{ $btndelete }}>
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



    <div class="modal fade" id="new_pres" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-xl " role="document">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Ajout d'une prescription </h3>
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
                            <div class="col-9 ">
                                <label for="search" class="form-label">Medicament *</label>
                                <div class="col  position-relative" x-data="{ isOpen: true, search: '' }"
                                    @click.away="isOpen = false">
                                    <div class=" input-group ">
                                        {{-- <span class="input-group-text  fw-bold bg-primary text-white">
                                            <i class="fas fa-capsules"></i>
                                        </span> --}}
                                        <input class="form-control input-group-text" type="search"
                                            placeholder="Recherche" aria-label="Search" wire:model="search" id="search"
                                            x-ref="search" x-model="search" @keydown.window="
                                            if (event.keyCode === 191) {
                                                event.preventDefault();
                                                $refs.search.focus();
                                            }
                                        " @keydown="isOpen = true" @keydown.escape.window="isOpen = false"
                                            @keydown.shift.tab="isOpen = false" @focus="isOpen = true">
                                    </div>

                                    @if (strlen($search) >= 2)
                                    <div class="z-index-2 position-absolute top-1 start-1 mt-2 w-100 rounded "
                                        x-show.transition.opacity="isOpen">
                                        @if ($medicaments->isNotEmpty())
                                        @foreach ($medicaments as $row)
                                        <a wire:click="loadmid('{{ $row->id }}')" x-on:click="search ='{{ $row->nom }}'"
                                            @click="isOpen=false" role="button">
                                            <div
                                                class="bg-white text-dark d-flex justify-content-start  py-1 border-bottom border-2 ">
                                                <div class="mx-3 py-1 fs-6">
                                                    {{ $row->nom }}
                                                </div>
                                            </div>
                                        </a>
                                        @endforeach
                                        @else
                                        <div class="bg-white text-dark p-2 ">
                                            Aucun medicament trouvé pour "{{ $search }}" !!
                                        </div>
                                        @endif


                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-3 ">
                                <label for="quantite" class="form-label">Quantité *</label>
                                <div class="input-group mb-3 ">
                                    {{-- <span class="input-group-text fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span> --}}
                                    <input type="text" class="form-control" id="quantite" wire:model="quantite"
                                        placeholder="Quantité " required>
                                </div>
                            </div>

                            <div class="col-4 ">
                                <label for="dose" class="form-label">Dose *</label>
                                <div class="input-group mb-3 ">
                                    {{-- <span class="input-group-text fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span> --}}
                                    <input type="text" class="form-control" id="dose" wire:model="dose"
                                        placeholder="Ex: 2 par répas" required>

                                    {{-- <select wire:model.defer="dose" class="form-select" id="dose">
                                        <option value="" selected>Select</option>
                                        <option value=""></option>
                                    </select> --}}
                                </div>
                            </div>

                            <div class="col-4 ">
                                <label for="frequence_admin" class="form-label">Fréquence d'administration*</label>
                                <div class="input-group mb-3 ">
                                    {{-- <span class="input-group-text fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span> --}}
                                    <input type="text" class="form-control" id="duree" wire:model="duree"
                                        placeholder="Ex: 2 fois par jour " required>

                                    {{-- <select wire:model.defer="frequence_admin" class="form-select" id="frequence_admin">
                                        <option value="" selected>Select</option>
                                        <option value="1 fois par jour">1 fois par jour</option>
                                        <option value="2 fois par jour">2 fois par jour</option>
                                        <option value="3 fois par jour">3 fois par jour</option>
                                    </select> --}}
                                </div>
                            </div>

                            <div class="col-4 ">
                                <label for="duree" class="form-label">Durée *</label>
                                <div class="input-group mb-3 ">
                                    {{-- <span class="input-group-text fw-bold bg-primary text-white">
                                        <i class="fas fa-pen"></i>
                                    </span> --}}
                                    <input type="text" class="form-control" id="duree" wire:model="duree"
                                        placeholder="Ex: Pendant 2 semaine " required>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>

</div>