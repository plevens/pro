<?php

use App\Livewire\Team\NameUpdate;
use Livewire\Volt\Component;

new class extends Component
{
    public NameUpdate $it;
}

?>

<div>
    <center>
        <h2>Modifier le nom du groupe</h2>
        <br>
        @foreach($game as $games)
        @if($games->auth_id == Auth::user()->id)
        <form action="{{route('update.name',['id'=>$games->id])}}" method="get">
            <input type="text" name="name" value="{{$games->nom}}" id="">
            <input type="hidden" name="id" value="{{$games->id}}" id="">
            <br>
            <br>
            <x-primary-button>Modifier</x-primary-button>
        </form>
        @endif
        @endforeach
    </center>
</div>