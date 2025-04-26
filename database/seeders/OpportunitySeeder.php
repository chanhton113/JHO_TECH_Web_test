<?php
namespace Database\Seeders; 
use Illuminate\Database\Seeder;
use App\Models\Opportunity;
use Faker\Factory as Faker;

class OpportunitySeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Opportunity::create([
                'opportunitie_id' => 'o' . str_pad($index, 3, '0', STR_PAD_LEFT),
                'phase' => $faker->randomElement(['Prospecting', 'Qualification', 'Proposal', 'Negotiation', 'Closing']),
                'organisation' => $faker->company,
                'contact_id' => 'c' . str_pad($faker->numberBetween(1, 20), 3, '0', STR_PAD_LEFT),
                'name' => $faker->sentence,
                'value' => $faker->randomFloat(2, 100000, 1000000),
                'closing_date' => $faker->date(),
            ]);
        }
    }
}
