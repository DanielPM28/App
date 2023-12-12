<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'DanielPardo',
            'email' => 'daniel_pardo_murcia@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Solomillos14'),
            'remember_token' => '123456',
            'cedula' => '1022431461',
            'address' => 'Cra.117',
            'role' =>'admin',
        ]);
        User::factory()
            ->count(10)
            ->create();
    }
}
