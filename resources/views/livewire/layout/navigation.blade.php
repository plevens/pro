<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 fixed-top bg-white">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        <input type="image" src="{{asset('icons/house-fill.svg')}}" style="width:1cm" alt="">
                    </x-nav-link>
                    <x-nav-link :href="route('notification')" :active="request()->routeIs('notification')" wire:navigate>
                        <input type="image" src="{{asset('icons/bell.svg')}}" style="width:1cm" alt="">

                        <sup>
                            @livewire('notification.pop-notif')
                        </sup>
                    </x-nav-link>
                    <x-nav-link :href="route('jeu')" :active="request()->routeIs('jeu')" wire:navigate>
                        <input type="image" src="{{asset('icons/controller.svg')}}" style="width:1cm" alt="">
                    </x-nav-link>

                </div>


            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                <livewire:nav.jeu />

                <livewire:nav.navigate />
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <b class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150" style="cursor: pointer;">
                            @if(strlen(Auth::user()->avatar) == 1)
                            <img src="{{asset('icons/person-circle.svg')}}" width="40cm" style="border-radius:50%;height:1cm" alt="" srcset="">
                            @else
                            <img src="{{asset('storage/'.Auth::user()->avatar)}}" width="40cm" style="border-radius:50%;height:1cm" alt="" srcset="">
                            @endif
                        </b>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">

            <br>
            <br>
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                <input type="image" src="{{asset('icons/house-fill.svg')}}" style="width:0.5cm" alt="">
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('notification')" :active="request()->routeIs('notification')" wire:navigate>
                <input type="image" src="{{asset('icons/bell.svg')}}" style="width:0.5cm" alt="">
                <sup>
                    @livewire('notification.pop-notif')
                </sup>
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('jeu')" :active="request()->routeIs('jeu')" wire:navigate>
                <input type="image" src="{{asset('icons/controller.svg')}}" style="width:0.5cm" alt="">
            </x-responsive-nav-link>
            <livewire:nav.navigate />

        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile')" wire:navigate>
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <button wire:click="logout" class="w-full text-start">
                    <x-responsive-nav-link>
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </button>
            </div>
        </div>
    </div>
</nav>