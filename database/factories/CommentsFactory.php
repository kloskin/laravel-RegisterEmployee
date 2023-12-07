<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // Data dzisiejsza
        $currentDate = now();

        // Data dwóch dni wstecz
        $pastDate = $currentDate->subDays(2);

        // Data dwóch dni w przód
        $futureDate = $currentDate->addDays(2);

        // Wybierasz losową datę z zakresu między 2 dni wstecz a 2 dni w przód

        $date = fake()->dateTimeBetween('-2 days', '+2 days');

        return [
            'content' => fake()->text(300),
            'created_at' => $date->format('Y-m-d h:i:s'),
            'updated_at' => $date->format('Y-m-d h:i:s'),
        ];
    }
}
