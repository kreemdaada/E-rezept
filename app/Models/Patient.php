<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'vorname',
        'email',
        'nachname',
        'geburtsdatum',
        'adresse',
        'versicherungsnummer',
        'krankenkasse',
        'prescription_id',
    ];

    protected $dates = ['geburtsdatum'];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
