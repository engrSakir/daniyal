<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed2Soup extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //8-16
        $c = Category::create([
            'name' => 'SOUP',
            'has_sub_category' => true,
            'has_sub_item' => false,
        ]);
        $sc = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:1'
        ]);
        $sc2 = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:3'
        ]);

        $i = Item::create(['name' => 'Daniyal Special Soup']);
        CategoryWiseItem::insert([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 550,
        ]);

        $i = Item::create(['name' => 'Thai Soup (Thick/Clear])']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 180,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 440,
        ]]);

        $i = Item::create(['name' => 'Chicken Corn Soup']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 140,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 320,
        ]]);

        $i = Item::create(['name' => 'Top yum Soup']);
        CategoryWiseItem::insert([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 500,
        ]);

        $i = Item::create(['name' => 'Clear vegetable Soup']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 120,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 300,
        ]]);

        $i = Item::create(['name' => 'Sea Food Soup']);
        CategoryWiseItem::insert([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 460,
        ]);
        $i = Item::create(['name' => 'Crispy Rice Soup']);
        CategoryWiseItem::insert([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 550,
        ]);
        $i = Item::create(['name' => 'Coconut Milk Soup']);
        CategoryWiseItem::insert([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 380,
        ]);

        $i = Item::create(['name' => 'Hot & Sour Soup']);
        CategoryWiseItem::insert([[
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 150,
        ], [
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc2->id,
            'price' => 370,
        ]]);
    }
}
