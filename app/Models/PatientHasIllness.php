<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientHasIllness extends Model
{
    use HasFactory;

    protected $table = "patient_has_illness";

    protected $guarded = [];

    protected $primaryKey = ["patient_id", "illness_id"];

    public $incrementing = false;

    public function patient()
    {
        return $this->belongsTo(Patient::class, "patient_id");
    }

    public function illness()
    {
        return $this->belongsTo(Illness::class, "illness_id");
    }

    public function physician()
    {
        return $this->belongsTo(Physician::class, "physician_id");
    }
}
