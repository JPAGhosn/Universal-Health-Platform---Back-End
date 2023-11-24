<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $primaryKey = "user_id";

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function illnesses()
    {
        return $this->belongsToMany(Illness::class, "patient_has_illness", "patient_id", "illness_id")
            ->withPivot("physician_id");
    }

    public function physicians()
    {
        return $this->belongsToMany(Physician::class, "physician_has_patient", "patient_id", "physician_id");
    }
}
