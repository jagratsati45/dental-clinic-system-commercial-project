<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [

        'appointment_no',

        'patient_id',

        'appointment_date',

        'appointment_time',

        'chief_complaint',

        'status',

        'remarks',

    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}