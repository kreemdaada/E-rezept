<?php

// Krankmeldung.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krankmeldung extends Model
{
    use HasFactory;

    protected $table = 'Krankmeldungen';

    
    protected $fillable = [
        'patient_id',
        'start_date',
        'end_date',
        'reason',
    ];

    // Define the relationship with the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
