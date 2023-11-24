<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\Physician;
use App\Models\PhysicianHasPatient;
use App\Models\User;
use Database\Factories\PhysicianHasPatientFactory;
use Illuminate\Database\Seeder;

class PhysicianHasPatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jean = User::query()->where("first_name", "=", "Jean")->first();
        $jp = User::query()->where("first_name", "=", "Jean Paul")->first();

        PhysicianHasPatient::query()->create([
            "physician_id" => $jean->id,
            "patient_id" => $jp->id
        ]);

        try {
            PhysicianHasPatient::factory()->count(50)->create();
        }
        catch (\Exception $e)
        {

        }
    }
}
