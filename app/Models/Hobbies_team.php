<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobbies_team extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_id',
        'auth_id',
        'nom',
        'icon',
        'description',
        'banniere',
        'status',
    ];
}
