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
        //1-7
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SALAD 1:3',
        ]);

        //8-16
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SOUP 1:1',
        ]);

        //8-16
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SOUP 1:3',
        ]);

        //17-30
        $category = Category::create([
            'type' => 'Item',
            'name' => 'APPETIZERS 1:3',
        ]);

        //31-36
        $category = Category::create([
            'type' => 'Item',
            'name' => 'CONTINENTAL/FAST FOOD',
        ]);

        //37-40
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PASTA 1:1',
        ]);

        //37-40
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PASTA 1:3',
        ]);

        //41-46
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PIZZA 6"',
        ]);

        //41-46
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PIZZA 9"',
        ]);

        //41-46
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PIZZA 13"',
        ]);

        //47-57
        $category = Category::create([
            'type' => 'Item',
            'name' => 'CHICKEN 1:3',
        ]);
    }
}
