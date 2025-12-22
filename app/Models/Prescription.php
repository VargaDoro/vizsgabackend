<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'doctor_id',
        'patient_id',
        'medicine_name',
        'dosage',
        'issued_at',
        'valid_until',
    ];
}
