<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween($min = 1, $max = 100),
            'updated_by' => fake()->numberBetween($min = 1, $max = 100),         //` BIGINT NOT NULL,
            'title' => fake()->sentence($nbWords = 6, $variableNbWords = true),         //` VARCHAR(512) NOT NULL,
            'description' => fake()->text($maxNbChars = 500),          //` VARCHAR(2048) DEFAULT NULL,
            'status' => fake()->numberBetween($min = 1, $max = 3),         //` SMALLINT NOT NULL DEFAULT 0,
            'hours' => fake()->numberBetween($min = 1, $max = 24),         //` FLOAT NOT NULL DEFAULT 0,
            'planned_start_date' => fake()->dateTime($max = 'now', $timezone = null),         //` DATETIME NULL DEFAULT NULL,
            'planned_end_date' => fake()->dateTime($max = 'now', $timezone = null),         //` DATETIME NULL DEFAULT NULL,
            'actual_start_date' => fake()->dateTime($max = 'now', $timezone = null),         //` DATETIME NULL DEFAULT NULL,
            'actual_end_date' => fake()->dateTime($max = 'now', $timezone = null),         //` DATETIME NULL DEFAULT NULL,
            'content' => fake()->text($maxNbChars = 248),         //` TEXT NULL DEFAULT NULL,
        ];
    }
}
