<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SALAD 1:3',
        ]);
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SOUP 1:1',
        ]);
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SOUP 1:3',
        ]);
        $category = Category::create([
            'type' => 'Item',
            'name' => 'APPETIZERS 1:3',
        ]);
    }
}
