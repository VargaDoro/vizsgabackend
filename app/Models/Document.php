<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    // Mivel nincs updated_at mező
    public const UPDATED_AT = null;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'type',
        'file_path',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * Kapcsolat: dokumentumhoz tartozó beteg
     */
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'user_id');
    }

    /**
     * Kapcsolat: dokumentumot feltöltő orvos
     */
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'user_id');
    }
}
