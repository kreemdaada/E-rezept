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
        'doctor_id',
        'qr_code_path',
    ];


    public function patient()
{
    return $this->hasOne(Patient::class);
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}


}
