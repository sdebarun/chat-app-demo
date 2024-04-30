<?php

namespace Database\Seeders;

use App\Models\AstrologyCategory;
use Database\Factories\AstrologyCategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AstrologyCategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AstrologyCategory::factory()->count(10)->create();
    }
}
