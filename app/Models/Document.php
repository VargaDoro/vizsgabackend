<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory;
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'type',
        'file_path',
        'created_at',
    ];
}
