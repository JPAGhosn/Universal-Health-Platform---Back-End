<?php

namespace Database\Seeders;

use App\Models\Illness;
use Illuminate\Database\Seeder;

class IllnessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Illness::factory()->count(50)->create();
    }
}
