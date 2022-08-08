<?php

namespace Database\Seeders;

use App\Models\PurchaseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PurchaseCategory::insert([
            ['name' => 'Chill Sauce'],
            ['name' => 'Oyster Sauce'],
            ['name' => 'Fish Sauce'],
            ['name' => 'MAGI Sauce'],
            ['name' => 'Hakka Sauce'],
            ['name' => 'Soya Sauce'],
            ['name' => 'Sweet Chill Sauce'],
            ['name' => 'Mongolian Sauce'],
            ['name' => 'Chicken Powder'],
            ['name' => 'Sesame oil'],
            ['name' => 'Mustard Paste'],
            ['name' => 'Mozzarella cheese'],
            ['name' => 'Slice Cheese'],
            ['name' => 'Mayonnaise'],
            ['name' => 'Mushroom Can'],
            ['name' => 'Coconut Milk'],
            ['name' => 'Wonton Patti'],
            ['name' => 'French Fry'],
            ['name' => 'Rice'],
            ['name' => 'Moyda'],
            ['name' => 'Noodles'],
            ['name' => 'Ararot Powder'],
            ['name' => 'Butter(Bar)'],
            ['name' => 'Butter(Oil)'],
            ['name' => 'Egg C/D'],
            ['name' => 'Chicken'],
            ['name' => 'Chicken Boneless'],
            ['name' => 'Fish'],
            ['name' => 'Fish Boneless'],
            ['name' => 'Prawn'],
            ['name' => 'Lobster'],
            ['name' => 'Undercut Beef'],
            ['name' => 'Yeast'],
            ['name' => 'Green Peas'],
            ['name' => 'Baby Corn'],
            ['name' => 'Connection milk'],
            ['name' => 'Tomato Paste'],
            ['name' => 'Kashmiri Chili'],
            ['name' => 'Cashew Nut'],
            ['name' => 'Vinegar'],
            ['name' => 'Dish wash'],
            ['name' => 'Salt'],
            ['name' => 'Oil (5 LT)'],
            ['name' => 'Sweet Corn'],
            ['name' => 'Pasta'],
            ['name' => 'Bar B.Q. Sauce'],
        ]);
    }
}
