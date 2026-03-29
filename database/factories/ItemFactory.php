<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Item>
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
             'code_no' => $this->faker->unique()->numerify('CODE-###'), // Add this line
            'name' => $this->faker->word(),
            'image' => $this->faker->imageUrl(640, 480),
            'price' => $this->faker->randomFloat(2, 10, 100),
            'discount' => $this->faker->numberBetween(0, 50),
            'in_stock' => $this->faker->numberBetween(1, 20),
            'description' => $this->faker->sentence(),
            'category_id' => 1, // adjust as needed
        ];
    }
}