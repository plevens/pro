<?php

namespace App\Mail;

use App\Models\Game;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class Invitation extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;


    public $team;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = url('/register');
        $team = Game::get()->where('status', 'true');
        foreach ($team as $key) {
            if ($key->auth_id == Auth::user()->id) {
                $team_name = $key->nom;
            }
        }
        return $this->view('email.invitation')
            ->with([
                'url' => $url,
                'nom' => $team_name
            ]);
    }
}
