<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AirportsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->city,
            'countries_id' => $this->faker->numberBetween(1, 10),
            'code' => $this->faker->unique()->regexify('[A-Z]{3}'),
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude
        ];
    }
}
