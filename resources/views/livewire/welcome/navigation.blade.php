<div class="sm:fixed sm:top-0 sm:right-0 p-6 text-end z-10" id="barnav">
       <img src="{{asset('images/logo3.png')}}" alt="logo" width="70px" height="70px" id="logo">
    @auth
    <a href="{{ url('/dashboard') }}"
        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        wire:navigate>Dashboard</a>
    @else
    <a href="{{ route('login') }}"
        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        wire:navigate>Log in</a>

    @if (Route::has('register'))
    <a href="{{ route('register') }}"
        class="ms-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
        wire:navigate>Register</a>
    @endif
    @endauth
</div>