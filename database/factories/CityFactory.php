<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    public function definition()
    {
        return [
/* Creating a fake city with fake data. */
            'name' => fake()->city(),
            'latitude' => fake()->latitude($min = -90, $max = 90),
            'longitude' => fake()->longitude($min = -180, $max = 180),
            'state_code' => fake()->stateAbbr(),
            'state_name' => fake()->state(),
            'country_code' => fake()->countryCode(),
            'timezone' => fake()->timezone(),
        ];
    }
}
