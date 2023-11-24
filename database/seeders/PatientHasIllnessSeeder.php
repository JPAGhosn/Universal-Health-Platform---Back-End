<?php

namespace Database\Seeders;

use App\Models\PatientHasIllness;
use Illuminate\Database\Seeder;

class PatientHasIllnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 50 ; $i++)
        {
            try {
                PatientHasIllness::factory()->create();
            }
            catch (\Exception $e)
            {
                // pass
            }
        }
    }
}
