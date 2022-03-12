<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $searchText;
    public function updated()
    {
        $this->emit('search',$this->searchText);
    }
    public function render()
    {
        return view('livewire.search');
    }
}
