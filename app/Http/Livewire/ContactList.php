<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ContactList extends Component
{
    public function render()
    {
        $contacts = User::query()->where('id', '<>', auth()->id())->get();
        return view('livewire.contact-list', ['contacts' => $contacts]);
    }
}
