<?php

namespace Database\Factories;

use App\Models\Illness;
use App\Models\Patient;
use App\Models\Physician;
use App\Models\PhysicianHasPatient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientHasIllnessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $physician_has_patient = PhysicianHasPatient::query()->inRandomOrder()->first();
        $patient_id = $physician_has_patient->patient_id;
        $physician_id = $physician_has_patient->physician_id;
        $illness_id = Illness::query()->inRandomOrder()->first()->id;

        return [
            "patient_id" => $patient_id,
            "illness_id" => $illness_id,
            "physician_id" => $physician_id
        ];
    }
}
