<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed5 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //37-40
        $c = Category::create([
            'name' => 'PASTA',
            'sub_category_required' => true,
            'child_required' => false,
        ]);
        $sc = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:1'
        ]);
        $sc2 = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:2'
        ]);

        $i = Item::create(['name' => 'Pasta Alfredo']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 210,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 330,
        ]]);
        $i = Item::create(['name' => 'Oven Baked chicken Pasta']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 190,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 300,
        ]]);
        $i = Item::create(['name' => 'Oven Baked Beef Pasta']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 220,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 350,
        ]]);
        $i = Item::create(['name' => 'Oven Baked B-B-Q Pasta']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 240,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 400,
        ]]);
    }
}