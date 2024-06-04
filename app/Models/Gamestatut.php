<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gamestatut extends Model
{
    use HasFactory;
    protected $fillable = [
        'auth_id',
        'user_id',
        'email',
        'activate',
        'role',
        'accepted',
        'avatar',
        'pseudo',
        'team_id'
    ];
}
