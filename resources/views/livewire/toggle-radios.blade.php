<div>
    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title ">Radiologie</h3> 

        <div class="btn-group" role="group"> 
            <a wire:click="focus('1')" class="btn @if ($sbtn == 1) btn-dark  @else btn-outline-dark @endif square fw-bold" >
                <i class="fa-solid fa-plus"></i> Radios
            </a>
            <a wire:click="focus('2')" class="btn @if ($sbtn == 2) btn-dark  @else btn-outline-dark @endif square fw-bold" >
                <i class="fa-solid fa-plus"></i> Types
            </a> 
        </div>

    </div>

    @if ($sbtn == 1)
    <livewire:gestion-radios />
    @elseif ($sbtn == 2)
    <livewire:gestion-radios-type /> 
    @endif

</div>