<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => "Debarun Admin",
            'email' => 'sdebarun04@gmail.com',
            'phone_number' => '9038679075',
            'password' => Hash::make('password'),
            'country_id' => 101,
            'state_id' => 4853,
        ]);

        $admin->assignRole(['admin']);


    }
}
