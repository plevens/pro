<?php

use App\Livewire\Action\Listes;
use Livewire\Volt\Component;

new class extends Component
{
    public Listes $list;
}

?>


<div>

    @foreach($jeux as $jeu)
    @if($jeu->status == 'true')
    {{$jeu->nom}}
    <br>
    @endif
    @if($jeu->status == 'false')
    <br>
    <b>Jeux non actif</b>
    <a href="{{route('update.jeux',['id'=>$jeu->id])}}" wire:navigate>{{$jeu->nom}}</a>
    <a href="{{route('bloque.jeux',['id'=>$jeu->id])}}" wire:navigate><input type="image" src="{{asset('icons/circle.svg')}}" alt="" srcset=""><input style="margin-left:-0.4cm" type="image" src="{{asset('icons/x.svg')}}" alt="" srcset=""></a>
    <a href="{{route('moification.jeux',['id'=>$jeu->id])}}" wire:navigate>
        <input type="image" src="{{asset('icons/pen.svg')}}" alt="" srcset="">
    </a>
    <br>
    @endif
    @endforeach

</div>