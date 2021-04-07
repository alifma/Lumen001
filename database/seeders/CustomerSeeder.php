<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 50; $i++) {
            // Initialize Faker
            $faker = Faker::create();
            // Define data that will be used for seeding
            $data = [
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber
            ];
            // Insert data into models
            Customer::create($data);
        }
    }
}
