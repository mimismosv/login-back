<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
/* Creating 50 cities and 100 users. */

        \App\Models\City::factory()->create([
            'name' => 'Santa Ana',
            'latitude' => 13.983333,
            'longitude' => -89.533333,
            'state_code' => 'SA',
            'state_name' => 'Santa Ana',
            'country_code' => 'SV',
            'timezone' => 'America/El_Salvador',
        ]);
        \App\Models\User::factory()->create([
            'username' => 'Oscar Ivan Cervantes Guevara',
            'email' => 'oicguevara@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'city_id' => 1,
        ]);

        \App\Models\City::factory(49)->create();
        \App\Models\User::factory(99)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
