<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /** @use HasFactory<\Database\Factories\DoctorFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'license_number',
        'specialization',
        'phone_number',
        'office_location',
    ];
}
