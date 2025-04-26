<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\TaskSeeder;
use Database\Seeders\OpportunitySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ContactSeeder::class,
            TaskSeeder::class,
            OpportunitySeeder::class,
        ]);
    }
}
