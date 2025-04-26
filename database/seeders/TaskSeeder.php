<?php
namespace Database\Seeders; 
use Illuminate\Database\Seeder;
use App\Models\Task;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Task::create([
                'task_id' => 'task_' . $index,
                'title' => $faker->sentence,
                'start_date' => $faker->date(),
                'end_date' => $faker->date(),
                'user_id' => 'user_' . $faker->numberBetween(1, 20),
                'status' => $faker->randomElement(['pending', 'completed', 'in-progress']),
                'contact_id' => 'c' . str_pad($faker->numberBetween(1, 20), 3, '0', STR_PAD_LEFT),
            ]);
        }
    }
}
