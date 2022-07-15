<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\SetMenu;
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

        //58-65
        $category = Category::create([
            'type' => 'Item',
            'name' => 'BEEF 1:3',
        ]);

        //66-71
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PRAWN 1:3',
        ]);

        //72-80
        $category = Category::create([
            'type' => 'Item',
            'name' => 'BAR-B-Q 1:3',
        ]);
        
        //81-92
        $category = Category::create([
            'type' => 'Item',
            'name' => 'FRIDE-RICE 1:3',
        ]);

        //93-97
        $category = Category::create([
            'type' => 'Item',
            'name' => 'NOODLES & CHOWMEIN 1:3',
        ]);

        //98-100
        $category = Category::create([
            'type' => 'Item',
            'name' => 'CHAOP SUEY 1:3',
        ]);

        //101-103
        $category = Category::create([
            'type' => 'Item',
            'name' => 'VEGETABLE 1:3',
        ]);

        //104-108
        $category = Category::create([
            'type' => 'Item',
            'name' => 'DESSERT',
        ]);

        //109-125
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SEASONAL JUICE & DRINKS',
        ]);



// @@@@@@ Set Menu @@@@@@@@@@@    

        $category = Category::create([
            'type' => 'Set Menu',
            'name' => 'Set Menu',
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '126',
            'price' => 420,
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '127',
            'price' => 360,
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '128',
            'price' => 380,
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '129',
            'price' => 450,
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '130',
            'price' => 290,
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '131',
            'price' => 550,
        ]);

        $category = Category::create([
            'type' => 'Set Menu',
            'name' => 'Platter Menu',
        ]);
        $platter_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '132',
            'price' => 350,
        ]);
        $platter_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '133',
            'price' => 320,
        ]);
        $platter_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '134',
            'price' => 490,
        ]);
        $platter_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '135',
            'price' => 540,
        ]);
        $platter_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '136',
            'price' => 220,
        ]);
    }
}
