<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed6Pizza extends Seeder
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
            'name' => 'PIZZA',
            'has_sub_category' => true,
            'has_sub_item' => false,
        ]);
        $sc = SubCategory::create([
            'category_id' => $c->id,
            'name' => '6 inch'
        ]);
        $sc2 = SubCategory::create([
            'category_id' => $c->id,
            'name' => '9 inch'
        ]);
        $sc3 = SubCategory::create([
            'category_id' => $c->id,
            'name' => '13 inch'
        ]);

        $i = Item::create(['name' => 'Daniyal Special Pizza']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 420,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 530,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc3->id,
            'price' => 680,
        ]]);
        $i = Item::create(['name' => 'Beef Pizza']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 430,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 560,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc3->id,
            'price' => 780,
        ]]);
        $i = Item::create(['name' => 'Mexican Pizza Hot']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 480,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 580,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc3->id,
            'price' => 720,
        ]]);
        $i = Item::create(['name' => 'Chef Special Pizza']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 580,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 680,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc3->id,
            'price' => 810,
        ]]);
        $i = Item::create(['name' => 'Chicken Pizza']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 380,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 510,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc3->id,
            'price' => 670,
        ]]);
        $i = Item::create(['name' => 'Bar-B-Q Pizza']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 490,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 590,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc3->id,
            'price' => 730,
        ]]);
    }
}