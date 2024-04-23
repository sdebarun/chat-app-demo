<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('roles')->insert([
                ['name' => 'admin', 'guard_name' => 'web'],
                ['name' => 'consultant',  'guard_name' => 'web'],
                ['name' => 'customer',  'guard_name' => 'web']
            ]
        );
    }
}
