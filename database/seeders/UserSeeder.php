<?php

namespace Database\Seeders; 

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            User::create([
                'user_id' => 'user_' . $index,
                'name' => $faker->name,
                'email' => str_replace(' ', '_', $faker->name) . '@gmail.com',
                'password' => bcrypt('password'),
                'role' => $faker->randomElement(['user', 'admin']),
            ]);
        }
    }
}
