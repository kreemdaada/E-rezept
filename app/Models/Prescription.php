<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'vorname',
        'versicherungsnummer',
        'img',
        'krankenkasse',
        'neue_termin',
        'medikament',
        'diagnose',
        'patient_id',
    ];


    public function patient()
{
    return $this->hasOne(Patient::class);
}

}
