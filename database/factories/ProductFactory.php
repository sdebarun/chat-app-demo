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
    public function definition(): array
    {
        return [
            'product_name' => fake()->word,
            'sku' => fake()->ean13,
            'original_price' => fake()->randomFloat(2, 10, 1000),
            'selling_price' => fake()->randomFloat(2, 10, 1000),
            'product_description' => fake()->paragraph,
            'quantity' => fake()->numberBetween(0, 100),
            'is_active' => fake()->boolean,
            'is_gift' => fake()->boolean,
            'tax_code' => fake()->randomElement(['GST', 'VAT', 'None']),
            'created_at' => fake()->dateTimeBetween('-2 years', 'now'),
            'updated_at' => fake()->dateTimeBetween('-2 years', 'now'),
        ];
    }
}
