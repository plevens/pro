<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;
    protected $fillable = [
        'game_id',
        'auth_id',
        'nom',
        'icon',
        'description',
        'banniere',
        'status',
    ];
}
