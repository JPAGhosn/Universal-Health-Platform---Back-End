<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->jp();
        for ($i=1; $i<=50; $i++)
        {
            $user = User::factory()->create();
            $patient = Patient::query()->create([
                "user_id" => $user->id
            ]);
        }
    }

    private function jp()
    {
        $user = User::query()->create([
            'first_name' => "Jean Paul",
            'last_name' => "Abi Ghosn",
            'email' => "jp.abighosn.98@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        $patient = Patient::query()->create([
            "user_id" => $user->id
        ]);
    }
}
