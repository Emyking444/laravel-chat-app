<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Message;


class Chat extends Component
{
    public $message;
    protected $listeners = ['echo-private:chat,MessageSent' => 'render'];

    public function sendMessage()
    {
        $newMessage = Message::create([
            'user_id' => auth()->id(),
            'message' => $this->message,
        ]);

        $this->message = '';

        // Broadcast the event
        broadcast(new \App\Events\MessageSent($newMessage))->toOthers();
        
    }

    public function render()
    {
        $messages = Message::with('user')->latest()->take(10)->get()->reverse();
        return view('livewire.chat', compact('messages'));
    }
}