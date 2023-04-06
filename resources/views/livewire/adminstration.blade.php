<div>
    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title ">Administration</h3> 

        <div class="btn-group" role="group"> 
            <a wire:click="focus('1')" class="btn @if ($sbtn == 1) btn-dark  @else btn-outline-dark @endif square fw-bold" >
                <i class="fa-solid fa-plus"></i> Fonction
            </a>
            <a wire:click="focus('2')" class="btn @if ($sbtn == 2) btn-dark  @else btn-outline-dark @endif square fw-bold" >
                <i class="fa-solid fa-plus"></i> Departement
            </a>
            <a wire:click="focus('3')" class="btn @if ($sbtn == 3) btn-dark  @else btn-outline-dark @endif square fw-bold" >
                <i class="fa-solid fa-plus"></i> Grade
            </a>
            <a wire:click="focus('4')" class="btn @if ($sbtn == 4) btn-dark  @else btn-outline-dark @endif square fw-bold" >
                <i class="fa-solid fa-plus"></i> Permissions
            </a>
        </div>

    </div>

    @if ($sbtn == 1)
    <livewire:gestion-fonction />
    @elseif ($sbtn == 2)
    <livewire:gestion-departement />
    @elseif ($sbtn == 3)
    <livewire:gestion-grade />
    @elseif ($sbtn == 4)
    <livewire:gestion-permissions />
    @endif

</div>