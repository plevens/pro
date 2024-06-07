<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobbies_perso extends Model
{
    use HasFactory;
    protected $fillable = [
        'auth_id',
        'nom',
        'icon',
        'description',
        'banniere',
        'status',
    ];
}
