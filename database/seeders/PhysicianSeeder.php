<?php

namespace Database\Seeders;

use App\Models\Physician;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PhysicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->jean();
        for ($i=1; $i<=50; $i++)
        {
            $user = User::factory()->create();
            $physician = Physician::create([
                "user_id" => $user->id
            ]);
        }
    }

    public function jean()
    {
        $user = User::query()->create([
            'first_name' => "Jean",
            'last_name' => "Abi Ghosn",
            'email' => "jean@gmail.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        Physician::query()->create([
            "user_id" => $user->id
        ]);
    }
}
