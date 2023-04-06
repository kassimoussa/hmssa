<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TogglePersonnels extends Component
{
    public $sbtn = 2;

    public function focus($i)
    {
        $this->sbtn = $i;
    }

    public function render()
    {
        return view('livewire.toggle-personnels');
    }
}
