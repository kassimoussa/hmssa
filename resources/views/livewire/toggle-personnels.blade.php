<div>
    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3">
        <h3 class="over-title ">Gestion du personnels</h3>

        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" wire:click="focus('1')" class="btn @if ($sbtn == 1) btn-dark  @else btn-outline-dark @endif">Liste</button>
            <button type="button" wire:click="focus('2')" class="btn @if ($sbtn == 2) btn-dark  @else btn-outline-dark @endif">Ajouter</button>
        </div>

    </div>

    @if ($sbtn == 1)
    <livewire:personnels-liste />
    @elseif ($sbtn == 2)
    <livewire:personnels-ajout />
    @endif

</div>