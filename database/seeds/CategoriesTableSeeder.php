<?php

use App\Model\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Vaccsin',
            'slug' => 'Vaccsin'
        ]);

        Category::create([
            'name' => 'Vitamines',
            'slug' => 'Vitamines'
        ]);

        Category::create([
            'name' => 'Antiviraux',
            'slug' => 'Antiviraux'
        ]);

        Category::create([
            'name' => 'Antimycosiques',
            'slug' => 'Antimycosiques'
        ]);

        Category::create([
            'name' => 'Anti-inflammatoires',
            'slug' => 'Anti-inflammatoires'
        ]);
    }
}
