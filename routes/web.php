<?php

use App\Livewire\Nav\Navigate;
use App\Livewire\Notification\Notification;
use App\Livewire\Team\DeleteGame;
use App\Livewire\Match\Macth;
use App\Livewire\Team\NameUpdate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('/team/create', 'team')
    ->middleware(['auth', 'verified'])
    ->name('addTeam');

Route::view('/setup', 'setup')
    ->middleware(['auth', 'verified'])
    ->name('setup');

Route::view('/teams', 'team_blog')
    ->middleware(['auth', 'verified'])
    ->name('teams');

Route::view('/notification', 'notification')
    ->middleware(['auth', 'verified'])
    ->name('notification');

Route::get('/update/{id}', [Navigate::class, 'change'])
    ->middleware(['auth', 'verified'])
    ->name('change');

Route::get('/update/name/{id}', [NameUpdate::class, 'updateName'])
    ->middleware(['auth', 'verified'])
    ->name('update.name');

Route::get('/delete/{id}', [DeleteGame::class, 'supprimer'])
    ->middleware(['auth', 'verified'])
    ->name('supprime.game');

Route::view('/team', 'listeTeam')
    ->middleware(['auth', 'verified'])
    ->name('team');

Route::view('/team/game', 'jeux')
    ->middleware(['auth', 'verified'])
    ->name('gameTeam');

//notification root 
Route::get('/notification/{id}', [Notification::class, 'accepteInvitation'])
    ->middleware(['auth', 'verified'])
    ->name('accepte.team');

require __DIR__ . '/auth.php';
