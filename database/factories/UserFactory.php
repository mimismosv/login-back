<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition()
    {
        return [
/* Creating a user with a random name, email, password, and city_id. */
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
           /* Creating a random number between 1 and 50 and assigning it to the city_id. */
            'city_id' => fake()->numberBetween($min = 1, $max = 50),
            'first_name' =>fake()->firstName(),
            'middle_name' =>fake()->firstName(),
            'last_name' =>fake()->lastName(),
            'intro' =>fake()->suffix(),
            'profile' =>fake()->text($maxNbChars = 200),
        ];
    }

    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
