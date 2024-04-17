<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'name',
        'vorname',
        'versicherungsnummer',
        'img',
        'krankenkasse',
        'neue_termin',
        'medikament',
        'diagnose',
    ];
}
