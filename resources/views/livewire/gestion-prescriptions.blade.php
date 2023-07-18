<div class="py-3 ">

    @php
    use Carbon\Carbon;
    @endphp

    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3 ">
        <div class="col-6">
            <div class="input-group">
                <span class="btn btn-dark square">Rechercher</span>
                <input type="search" class="form-control square" wire:model="search" placeholder="Rechercher une prescription"
                    value="{{ $search }}">
            </div>
        </div>
    </div>

    <div class="col ">

        <table class="table table-bordered border-dark table-striped table-hover table-sm align-middle " id=""
            wire:poll>
            <thead class="bg-dark text-white text-center">
                <th scope="col">#</th>
                <th scope="col">Patient</th>
                <th scope="col">Medecin</th>
                <th scope="col">Consultation</th>
                <th scope="col">Medicament</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </thead>
            <tbody class="text-center">
                @if ($prescriptions->isNotEmpty())
                @php
                $cnt = 1;
                $editmodal = 'edit' . $cnt;
                $delmodal = 'delete' . $cnt;
                @endphp

                @foreach ($prescriptions as $key => $row)
                @php
                $btnshow = $btndelete = $btnadd = $txt = $bg = " ";

                if($row->status == "NON")
                {
                $btnshow = "disabled";
                $txt = "En cours";
                $bg = "bg-primary";
                } else {
                $btnadd = "disabled";
                $btndelete = "disabled";
                $txt = "Remplie";
                $bg = "bg-success";
                }
                @endphp

                <tr>
                    <td>{{ $cnt }}</td>
                    <td>{{ $row->patient->nom }}</td>
                    <td>{{ $row->medecin->nom }}</td>
                    <td>{{ Carbon::parse($row->created_at)->format('d/m/Y à H:i:s') }} </td>
                    <td>{{ $row->medicament->nom }}</td>
                    <td><span class="badge rounded-pill {{ $bg }}">{{ $txt }}</span> </td>
                    <td class="td-actions ">
                        @if (session('level') == "4")
                        <button class="btn  "
                            wire:click="remplir('{{ $row->id }}')" title="Remplir la prescription" {{ $btnadd}} >
                            <i class="fas fa-check"></i>
                        </button>
                        @endif
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

            </tbody>
        </table>
    </div>

    <div class="modal fade" id="pres_verif" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-md " role="document">
            <div class="modal-content">
                <form wire:submit.prevent="store">
                    <div class="modal-header d-flex justify-content-between">
                        <h3>Remplir la prescription </h3>
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
                                <div class="input-group mb-3 ">
                                    <span class="input-group-text txt fw-bold text-dark">
                                        Résultats
                                    </span>
                                    <textarea class="form-control " wire:model="resultats" id="" cols="30"
                                        rows="3"> </textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" wire:model="filename" id="radio_file">
                                    <label class="input-group-text" for="radio_file">Charger</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
  

</div>