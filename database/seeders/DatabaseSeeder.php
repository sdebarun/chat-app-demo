<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RolesSeeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\StatesTableSeeder;
use Database\Seeders\CountriesTableSeeder;
use Database\Seeders\CitiesTableChunkOneSeeder;
use Database\Seeders\CitiesTableChunkTwoSeeder;
use Database\Seeders\CitiesTableChunkFiveSeeder;
use Database\Seeders\CitiesTableChunkFourSeeder;
use Database\Seeders\CitiesTableChunkThreeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     ''
        // ]);

        $this->runSeeder();
    }


    protected function runSeeder(){
        $this->call([
            //MessageSeeder::class,
            CountriesTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableChunkOneSeeder::class,
            CitiesTableChunkTwoSeeder::class,
            CitiesTableChunkThreeSeeder::class,
            CitiesTableChunkFourSeeder::class,
            CitiesTableChunkFiveSeeder::class,
            RolesSeeder::class,
            AdminUserSeeder::class,
        ]);
    }
}
