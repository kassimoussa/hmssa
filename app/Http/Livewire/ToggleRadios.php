<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToggleRadios extends Component
{
    public $sbtn = 1;

    public function focus($i)
    {
        $this->sbtn = $i;
    }
    
    public function render()
    {
        return view('livewire.toggle-radios');
    }
}
