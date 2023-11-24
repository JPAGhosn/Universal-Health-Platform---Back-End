<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illness extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function creator()
    {
        return $this->belongsTo(User::class, "creator_id");
    }

    public function patients()
    {
        $this
            ->belongsToMany(Patient::class, "patient_has_illness", "illness_id", "patient_id");
    }
}
