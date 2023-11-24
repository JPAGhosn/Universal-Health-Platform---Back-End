<?php

namespace Database\Factories;

use App\Models\Patient;
use App\Models\Physician;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhysicianHasPatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $physician_id = Physician::query()->inRandomOrder()->first()->user_id;
        $patient_id = Patient::query()->inRandomOrder()->first()->user_id;

        return [
            "physician_id" => $physician_id,
            "patient_id" => $patient_id
        ];
    }
}
