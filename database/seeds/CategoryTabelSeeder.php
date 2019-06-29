<?php

use Illuminate\Database\Seeder;

class CategoryTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        foreach (range(0, 50) as $index) {
            $image = $faker->image(public_path('/image'));
            $imagePath = str_replace(public_path() . '/', '', $image);
            \App\Category::create([
                'name' => $faker->name,
                'lang' => $faker->randomElement(['en', 'ar']),
                'image' => $imagePath

            ]);

        }
    }
}

