<?php

use App\Model\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {
            Product::create([
                'name' => $faker->sentence(4),
                'subtitle' => $faker->sentence(5),
                'description' => $faker->text,
                'price' => $faker->numberBetween(15, 200) * 100,
                'status' => 0,
                'range' => 1,
                'in_stock' => 10,
                'category_id' => round(1, 4),
                'photo_principale' => 'https://via.placeholder.com/200x250',
            ]);
        }
    }
}
