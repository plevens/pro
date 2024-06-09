<?php

use App\Livewire\Action\Jeux;
use App\Livewire\Action\Listes;
use App\Livewire\Friend\Friend;
use App\Livewire\Match\JeuPerso;
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

//  team root 
Route::view('/team/game', 'jeux')
    ->middleware(['auth', 'verified'])
    ->name('gameTeam');
// Activation d'un jeux 
Route::get('/Change/jeux/{id}', [Listes::class, 'activeJeux'])
    ->middleware(['auth', 'verified'])
    ->name('update.jeux');
// Bloquer un jeux 
Route::get('/bloquer/jeux/{id}', [Listes::class, 'bloqueJeux'])
    ->middleware(['auth', 'verified'])
    ->name('bloque.jeux');
// Modification du jeux non choisi 
Route::get('/modification/jeux/{id}', [Listes::class, 'modifJeux'])
    ->middleware(['auth'], 'verified')
    ->name('moification.jeux');
Route::put('/updated/{id}', [Listes::class, 'updated'])
    ->middleware(['auth', 'verified'])
    ->name('updated.jeux');

Route::view('/seen/game/team', 'seengame')
    ->middleware(['auth', 'verified'])
    ->name('seengame');

Route::view('/jeu/bloquer/team', 'jeubloquer')
    ->middleware(['auth', 'verified'])
    ->name('blockjeu');

Route::get('/supprimer/team/{id}', [Macth::class, 'suppression'])
    ->middleware(['auth', 'verified'])
    ->name('supprimeJeu');

Route::get('/modifier/{id}', function () {
    return view('modifgameTeam');
})
    ->middleware(['auth', 'verified'])
    ->name('modifierJeu');


Route::get('/deletejeu/team/{id}', [Macth::class, 'suppdefinitive'])
    ->middleware(['auth', 'verified'])
    ->name('deletejeu');

Route::get('/restaurejeu/team{id}', [Macth::class, 'restaurejeu'])
    ->middleware(['auth', 'verified'])
    ->name('restaurejeu');

Route::view('/jeu/importation', 'importationGame')
    ->middleware(['auth', 'verified'])
    ->name('importJeu');

Route::view('/team/notre jeu', 'seengame_user')
    ->middleware(['auth', 'verified'])
    ->name('seengameUser');





// Jeu perso 

Route::view('/parametre/jeu personnel', 'jeu_perso')
    ->middleware(['auth', 'verified'])
    ->name('jeuPerso');

Route::view('/ajouter/jeu personnel', '_jeuPerso')
    ->middleware(['auth', 'verified'])
    ->name('addjeuPerso');

Route::view('/voir/jeu personnel', 'seen_jeuPerso')
    ->middleware(['auth', 'verified'])
    ->name('voirjeuPerso');

Route::view('/jeu personnel/bloquer', 'gamePersoblock')
    ->middleware(['auth', 'verified'])
    ->name('bloqueJeuPerso');

//menu   jeux

Route::view('jeu', 'jeu')
    ->middleware(['auth', 'verified'])
    ->name('jeu');

// ajouter un jeux  

Route::view('/ajouter/jeu', 'jeuAdd')
    ->middleware(['auth', 'verified'])
    ->name('addjeu');

// voir les jeux 

Route::view('jeux/list', 'listes')
    ->middleware(['auth', 'verified'])
    ->name('voirjeu');

Route::get('/supprimer/jeu pesonnel/{id}', [JeuPerso::class, 'suppressionPerso'])
    ->middleware(['auth', 'verified'])
    ->name('supprimeJeuP');

Route::get('/restaurer/jeu pesonnel{id}', [JeuPerso::class, 'restaurerPerso'])
    ->middleware(['auth', 'verified'])
    ->name('restaurejeuP');

Route::get('/deletejeu/jeu pesonnel{id}', [JeuPerso::class, 'suppdefinitiveP'])
    ->middleware(['auth', 'verified'])
    ->name('deletejeuP');

Route::view('/modification/jeu personnel{id}', 'modifgamePerso')
    ->middleware(['auth', 'verified'])
    ->name('modifJeuP');




















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

Route::get('/deletes/member/{id}', [DeleteGame::class, 'supprim'])
    ->middleware(['auth', 'verified'])
    ->name('deletes.member');

// supplementaire 

Route::view('/ajouter/membre', 'membre_sup')
    ->middleware(['auth', 'verified'])
    ->name('membre.sup');
//pseudo members 
Route::view('/pseudo', 'pseudo')
    ->middleware(['auth', 'verified'])
    ->name('avatar.pseudo');

require __DIR__ . '/auth.php';
