<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'patient_id',
        'full_name',
        'mobile',
        'gender',
        'dob',
        'age',
        'address',
        'blood_group',
        'allergies',
        'medical_history',
        'emergency_contact',
        'emergency_phone',
        'status',
    ];
}