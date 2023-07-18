<div wire:poll>
    <x-loading-indicator />

    <div class="card my-3">
        <div class="card-header  bg-cp d-flex justify-content-center">
            <h3 class="fw-bold text-white">Partie Médécin </h3>
        </div>

        <div class="card-body">

            <div class="card ">
                <div class="card-header">
                    <ul class="nav nav-tabs nav-justified card-header-tabs" id="partie_medecin" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link fw-bold @if ($sbtn == 1) active @endif " wire:click="focus('1')"
                                role="button">Observation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold @if ($sbtn == 2) active @endif " wire:click="focus('2')"
                                role="button">Prescription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold @if ($sbtn == 3) active @endif " wire:click="focus('3')"
                                role="button">Radiologie </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bold @if ($sbtn == 4) active @endif " wire:click="focus('4')"
                                role="button">Laboratoire </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    @if ($sbtn == 1)
                    <livewire:obs-medecin :consultation_id='$consid' >
                    @elseif ($sbtn == 2)
                    <livewire:add-prescription1 :consultation_id='$consid' >
                    @elseif ($sbtn == 3)
                    <livewire:add-radio1 :consultation_id='$consid' >
                    @elseif ($sbtn == 4)
                    <livewire:add-examens1 :consultation_id='$consid' >
                    @endif
                </div>

            </div>


        </div>

    </div>

</div>