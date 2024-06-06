<?php

use App\Livewire\Friend\Friend;
use App\Livewire\Nav\Navigate;
use App\Livewire\Notification\Notification;
use App\Livewire\Team\DeleteGame;
use App\Livewire\Match\Macth;
use App\Livewire\Team\NameUpdate;
use App\Livewire\TeamAction\Membre;
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

Route::get('/updates/{id}', [Navigate::class, 'changed'])
    ->middleware(['auth', 'verified'])
    ->name('changed');

// mise a jour du profil du groupe 

Route::put('/update/name/{id}', [NameUpdate::class, 'updateName'])
    ->middleware(['auth', 'verified'])
    ->name('update.name');

// mise a jour du profil des utilisateur

Route::put('/update/profil/{id}', [NameUpdate::class, 'updateProfile'])
    ->middleware(['auth', 'verified'])
    ->name('update.utilisateur');

// quitter le groupe 

Route::get('/team/quitter/{id}', [DeleteGame::class, 'suppression'])
    ->middleware(['auth', 'verified'])
    ->name('exit.team');

//supprimer le groupe

Route::get('/delete/{id}', [DeleteGame::class, 'supprimer'])
    ->middleware(['auth', 'verified'])
    ->name('supprime.game');

Route::view('/team', 'listeTeam')
    ->middleware(['auth', 'verified'])
    ->name('team');

// Jeux team root 
Route::view('/team/game', 'jeux')
    ->middleware(['auth', 'verified'])
    ->name('gameTeam');

Route::view('/seen/game', 'seengame')
    ->middleware(['auth', 'verified'])
    ->name('seengame');

Route::view('/jeu/bloquer', 'jeubloquer')
    ->middleware(['auth', 'verified'])
    ->name('blockjeu');

Route::get('/supprimer/jeux{id}', [Macth::class, 'suppression'])
    ->middleware(['auth', 'verified'])
    ->name('supprimeJeu');

Route::get('/deletejeu{id}', [Macth::class, 'suppdefinitive'])
    ->middleware(['auth', 'verified'])
    ->name('deletejeu');

Route::get('/restaurejeu{id}', [Macth::class, 'restaurejeu'])
    ->middleware(['auth', 'verified'])
    ->name('restaurejeu');





// Message root 

Route::view('/team/message', 'sms')
    ->middleware(['auth', 'verified'])
    ->name('smsTeam');


//notification root 
Route::get('/notification/{id}', [Notification::class, 'accepteInvitation'])
    ->middleware(['auth', 'verified'])
    ->name('accepte.team');

//dashboard team 

Route::view('/membres', 'member')
    ->middleware(['auth', 'verified'])
    ->name('member.team');
// bloquer un utilisateur du groupe 
Route::get('/bloquer/{id}', [NameUpdate::class, 'bloquer'])
    ->middleware(['auth', 'verified'])
    ->name('bloc.member');
// debloquer un utilisateur du groupe 
Route::get('/debloquer/{id}', [NameUpdate::class, 'debloquer'])
    ->middleware(['auth', 'verified'])
    ->name('debloc.member');

// supprimer definitif un membre 

Route::get('/delete/member/{id}', [DeleteGame::class, 'suppressions'])
    ->middleware(['auth', 'verified'])
    ->name('delete.member');

// ajouter un membre supplementaire 

Route::view('/ajouter/membre', 'membre_sup')
    ->middleware(['auth', 'verified'])
    ->name('membre.sup');
//pseudo members 
Route::view('/pseudo', 'pseudo')
    ->middleware(['auth', 'verified'])
    ->name('avatar.pseudo');

require __DIR__ . '/auth.php';
