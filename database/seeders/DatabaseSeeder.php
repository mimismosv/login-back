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
        $this->call(RoleSeeder::class);

/* Creating a city with the given data. */
        \App\Models\City::factory()->create([
            'name' => 'Santa Ana',
            'latitude' => 13.983333,
            'longitude' => -89.533333,
            'state_code' => 'SA',
            'state_name' => 'Santa Ana',
            'country_code' => 'SV',
            'timezone' => 'America/El_Salvador',
        ]);

/* Creating a user with the given data and assigning it the role of Admin. */
        \App\Models\User::factory()->create([
            'username' => 'oscar.guevara',
            'email' => 'oicguevara@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'city_id' => 1,
            'first_name' =>'Oscar',
            'middle_name' =>'Ivan',
            'last_name' =>'Cervantes Guevara',
            'intro' =>'Ing',
            'profile' =>fake()->text($maxNbChars = 200),
        ])->assignRole('Admin');

/* Creating 49 cities and 99 users. */
        \App\Models\City::factory(49)->create();
/* Creating 99 users and assigning them the role of User. */
        \App\Models\User::factory(99)->create()->each(function ($user) {
            $user->assignRole('User'); // assuming 'supscription' was a typo
        });
        \App\Models\Task::factory(1000)->create();
    }
}
