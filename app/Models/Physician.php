<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Physician extends Model
{
    use HasFactory;

    protected $primaryKey = "user_id";

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function patient_has_illness()
    {
        return $this->hasMany(PatientHasIllness::class, "physician_id");
    }

    public function patients()
    {
        return $this
            ->belongsToMany(Patient::class, "physician_has_patient", "physician_id", "patient_id");
    }
}
