<?php

namespace Database\Factories;

use App\Models\AstrologyCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AstrologyCategory>
 */
class AstrologyCategoryFactory extends Factory
{
    protected $model = AstrologyCategory::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => fake()->word(),
            "description" => fake()->paragraph(),
        ];
    }
}
