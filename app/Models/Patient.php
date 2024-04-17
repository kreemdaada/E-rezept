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
        'prescription_id',
    ];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
