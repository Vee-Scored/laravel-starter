<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "Name" => fake()->name(),
            "Stock" => fake()->numberBetween(1,100),
            "Price" => fake()->numberBetween(100,1000),
            "Description" => fake()->word(),

            "category_id" => fake()->numberBetween(1,4)
            
        ];
    }
}
