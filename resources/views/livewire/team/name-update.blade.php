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
        <h2 id="Modifier">Modifier le nom du groupe</h2>
        <br>
        @foreach($game as $games)
        @if($games->auth_id == Auth::user()->id)
        <form action="{{route('update.name',['id'=>$games->id])}}" method="get">
            <input type="text" name="name" value="{{$games->nom}}" id="Modifier_le_nom">
            <input type="hidden" name="id" value="{{$games->id}}" id="">
            <br>
            <br>
            <button id="mod">Modifier</button>
        </form>
        @endif
        @endforeach
    </center>
</div>