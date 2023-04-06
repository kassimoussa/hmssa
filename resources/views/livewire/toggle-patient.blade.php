<div>
    {{-- <x-loading-indicator />  --}}

    <div class="d-flex justify-content-around mb-5">
        <div class="border-bottom border-4 w-50 @if ($sbtn == 1) border-info text-info   @else border-secondary  text-secondary @endif " wire:click="focus('1')" role="button">
            <h2 class=" text-center @if ($sbtn == 1) fw-bold   @else fw-normal  @endif">Informations </h2>
        </div>
        <div class="border-bottom border-4 w-50 @if ($sbtn == 2) border-info text-info   @else border-secondary  text-secondary @endif " wire:click="focus('2')" role="button">
            <h2 class=" text-center @if ($sbtn == 2) fw-bold   @else fw-normal  @endif">Documents</h2>
        </div>
        <div class="border-bottom border-4 w-50 @if ($sbtn == 3) border-info text-info   @else border-secondary  text-secondary @endif " wire:click="focus('3')" role="button">
            <h2 class=" text-center @if ($sbtn == 3) fw-bold   @else fw-normal  @endif">Consultations</h2>
        </div>
    </div>

    @if ($sbtn == 1)

        <livewire:fiche-patient :patient_id='$patient_id' />

    @elseif ($sbtn == 2)

        <livewire:docs-patient :patient_id='$patient_id' />

    @elseif ($sbtn == 3)

        <livewire:consultations-patient :patient_id='$patient_id' />

    @endif

</div>
