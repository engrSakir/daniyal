<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed11FrideRice extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $c = Category::create([
            'name' => 'FRIDE-RICE',
            'has_sub_category' => true,
            'has_sub_item' => false,
        ]);
        $sc = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:3'
        ]);
        $i = Item::create(['name' => 'Daniyal Special Fried Rice Chicken/Beef/Prawn']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 450,
        ]);
        $i = Item::create(['name' => 'Special Fried Rice Chicken & Prawn']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 400,
        ]);
        $i = Item::create(['name' => 'Yang Chow Fried Rice Chicken/Beef/Prawn ']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 420,
        ]);
        $i = Item::create(['name' => 'Vegetable Fried Rice only Vegetable']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 300,
        ]);
        $i = Item::create(['name' => 'Egg Fried Rice']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 310,
        ]);
        $i = Item::create(['name' => 'Basil Leaf Fried Rice']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 340,
        ]);
        $i = Item::create(['name' => 'Schezwan Fried Rice']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 380,
        ]);
        $i = Item::create(['name' => 'Mix Fried Rice']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 370,
        ]);
        $i = Item::create(['name' => 'Chicken Fried Rice']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 360,
        ]);
        $i = Item::create(['name' => 'Beef Fried Rice']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 370,
        ]);
        $i = Item::create(['name' => 'Prawn Fried Rice']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 390,
        ]);
        $i = Item::create(['name' => 'Garlic Mushroom Rice']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 450,
        ]);
    }
}