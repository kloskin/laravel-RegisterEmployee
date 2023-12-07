<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkedHours>
 */
class WorkedHoursFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $date = fake()->dateTimeBetween('-1 months', 'now');
        return [
            'hours_worked' => fake()->numberBetween(0, 16), // Przykładowa ilość godzin
            'date' => $date->format('Y-m-d'),
            // inne atrybuty WorkedHours
        ];
    }
}
