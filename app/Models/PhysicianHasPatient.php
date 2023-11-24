<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PhysicianHasPatient extends Pivot
{
    use HasFactory;

    protected $table = "physician_has_patient";

    protected $guarded = [];

    public function physician()
    {
        return $this->belongsTo(Physician::class, "physician_id");
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, "patient_id");
    }
}
