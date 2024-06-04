<?php
use App\Livewire\Sms\Message;
use Livewire\Volt\Component;

new class extends Component
{
    public Message $msg;
}

?>

<div>
    <form wire:submit="texto">
        <textarea wire:model="text"  name="text" id="" cols="10" rows="1"></textarea>
        <x-input-error :messages="$errors->get('text')" class="mt-2" />
        <br>
         <button>
             Envoyer
         </button>
    </form>
</div>
