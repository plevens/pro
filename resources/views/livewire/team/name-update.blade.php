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
        <form action="{{route('update.name',['id'=>$games->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if(strlen($games->icon) == 1)
            <label for="img">{{$games->icon}}</label>
            <br>
            @else
            <label for="img"><img src="{{asset('storage/'.$games->icon)}}" width="50cm" alt=""></label>
            @endif
            <input type="file" name="file" id="img" hidden>
            <input type="text" name="image" value="{{$games->icon}}" hidden>
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