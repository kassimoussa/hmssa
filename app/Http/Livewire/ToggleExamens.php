<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ToggleExamens extends Component
{
    public $sbtn = 1;

    public function focus($i)
    {
        $this->sbtn = $i;
    }
    
    public function render()
    {
        return view('livewire.toggle-examens');
    }
}
