<?php

namespace App\Http\Livewire;

use App\Models\User;
use \App\Models\Message;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class MessageBox extends Component
{
    public $messages ;
    public $selectedUser;
    public $text;

    public function mount()
    {
        $this->messages= Message::query()->messageList($this->selectedUser)->get();
    }

    protected $listeners = ['selectContact','search'];


    public function updated()
    {
        $this->validate(
            ['text'=>'required|min:5'],
            ['text'=>'text']
        );
    }

    public function sendMessage()
    {
        $this->validate(
            ['text'=>'required|min:5'],
            ['text'=>'text']
        );

         auth()->user()->sendMessages()->create([
            'receiver_id' => $this->selectedUser->id,
            'text' => $this->text
        ]);

        $this->text = null;
        $this->messages= Message::query()->messageList($this->selectedUser)->get();
    }


    public function selectContact(User $user)
    {
        $this->selectedUser = $user;
        $this->messages= Message::query()->messageList($this->selectedUser)->get();
        $this->seenMessages();
    }

    public function search($text)
    {
        $this->messages =  Message::query()->messageList($this->selectedUser)->search($text)->get();
    }

    public function render()
    {
        return view('livewire.message-box',['messages'=>$this->messages]);
    }

    private function seenMessages()
    {
        Message::query()->where('receiver_id', auth()->id())->where('sender_id', $this->selectedUser->id)->update([
            'is_deliver' => true
        ]);
    }
}
