<?php

use App\Livewire\Nav\Jeu;
use Livewire\Volt\Component;

new class extends Component
{
    public Jeu $i;
}
?>
<div>

    <x-drop>
        <x-slot name="triggers">

            @if($nbr >= 1)
            <b id="ban" class="btn btn-dark">
                <input type="image" src="{{asset('icons/controller.svg')}}" alt="">
                {{$nom}}
                <input type="image" src="{{asset('storage/'.$icon)}}" width="25cm" height="25cm" style="border-radius:50%" alt="">
            </b>
            @else

            @endif

        </x-slot>
        <x-slot name="contents" style="width: 20cm;">
            @foreach ($jeu as $keys)
            @if ($keys->auth_id == Auth::user()->id && $keys->status =='false')
            <x-dropdown-link :href="route('update.jeux',['id'=>$keys->id])" wire:navigate>{{$keys->nom}}</x-dropdown-link>
            @endif
            @endforeach
        </x-slot>
    </x-drop>
</div>