<div>
    <div>
        @foreach ($messages as $message)
            <div>
                <strong>{{ $message->user->name }}:</strong>
                <span>{{ $message->message }}</span>
            </div>
        @endforeach
    </div>
    <input wire:model="message" type="text" placeholder="Type a message...">
    <button wire:click="sendMessage">Send</button>
</div>