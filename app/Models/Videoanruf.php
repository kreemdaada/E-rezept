<?php
// Videoanruf.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videoanruf extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'start_time',
        'end_time',
        'description',
    ];

    // Define the relationship with the Patient model
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
