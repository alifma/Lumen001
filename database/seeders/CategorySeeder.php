<?php

namespace Database\Seeders;

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Loop Fungsi Faker
        for ($i=0; $i < 10; $i++) {
            // Initialize Faker
            $faker = Faker::create();
            // Define data that will be used for seeding
            $data = [
                'category' => $faker->colorName,
                'desc' => $faker->text(30)
            ];
            // Insert data into models
            Category::create($data);
        }
    }
}
