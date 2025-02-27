<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'imgUrl' => $this->faker->imageUrl(),
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'price' =>fake()->numberBetween(5000,10000)
        ];
    }
}
