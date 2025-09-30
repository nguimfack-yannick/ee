<?php

// app/Models/Don.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    protected $fillable = [
        'nature',
        'country_code',
        'currency_code',
        'phone',
        'montant',
        'donateur',
        'email',
        'service',
        'statut',
        'date_don',
    ];
}