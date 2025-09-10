<?php
// app/Models/Don.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    use HasFactory;

    // Champs remplissables pour le modèle
    protected $fillable = [
        'nature',
        'country',
        'currency',
        'phone',
        'amount',
        'name',
        'email',
        'service',
        'comment',
    ];
}