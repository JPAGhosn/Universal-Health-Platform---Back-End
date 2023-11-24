<?php

namespace Database\Seeders;

use App\Models\Illness;
use App\Models\PhysicianHasPatient;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PatientSeeder::class,
            PhysicianSeeder::class,
            IllnessSeeder::class,
            PhysicianHasPatientSeeder::class,
            PatientHasIllnessSeeder::class
        ]);
    }
}
