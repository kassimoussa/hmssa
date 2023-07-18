@php
use Carbon\Carbon;
@endphp

<div class="" wire:poll>
    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title ">Les Consultations de {{ $patient->nom }} </h3>
    </div>

    <div class="col ">

        <table class="table table-bordered border-dark table-striped table-hover table-sm align-middle " id="">
            <thead class="bg-dark text-white text-center">
                <th scope="col">#</th>
                <th scope="col">Infirmier</th>
                <th scope="col">Medecin</th>
                <th scope="col">Date</th>
                <th scope="col">Motif</th> 
                <th scope="col">Action</th>
            </thead>
            <tbody class="text-center">
                @if ($consultations->isNotEmpty())
                @php
                $cnt = 1;
                @endphp

                @foreach ($consultations as $key => $row) 

                <tr>
                    <td>{{ $cnt }}</td> 
                    <td>{{ $row->infirmier->nom }}</td>
                    <td>{{ $row->medecin->nom }}</td>
                    <td>{{ Carbon::parse($row->date)->format('d/m/Y à H:i:s') }}</td>
                    <td>{{ $row->motif }}</td>
                    <td class="td-actions ">
                        <a class="btn  " href="{{ url("/visites/consultation", $row->id ) }}" title="Voir la consultaion">
                            <i class="fas fa-eye"></i>
                        </a> 
                    </td>
                </tr>

                @php
                $cnt += 1; 
                @endphp
                @endforeach
                @else
                <tr>
                    <td colspan="10">Pas de consultation pour ce patient.</td>
                </tr>
                @endif 

            </tbody>
        </table>
    </div>
 
</div>

 