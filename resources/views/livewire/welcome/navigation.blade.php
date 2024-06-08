<div class=" bg-dark text-white fixed-top navbar-brand col " style="width: 100%;text-align:right;margin-right:1em">
    @auth
    <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Accueil</a>
    @else
    <a href="{{ route('login') }}" class="font-semibold text-white hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Connexion</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="ms-4 font-semibold text-white hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" wire:navigate>Inscription</a>
    @endif
    @endauth
</div>