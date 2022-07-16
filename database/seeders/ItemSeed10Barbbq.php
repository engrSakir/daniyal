<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed10Barbbq extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //72-80
         $c = Category::create([
            'name' => 'BAR-B-Q',
            'sub_category_required' => true,
            'child_required' => false,
        ]);
        $sc = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:3'
        ]);
        $i = Item::create(['name' => 'Grilled Red Snapper Fish (per 100gm)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 150,
        ]);
        $i = Item::create(['name' => 'Steam Red Snapper Fish (per 100gm)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 180,
        ]);
        $i = Item::create(['name' => 'Grilled Lobster (per 100gm)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 200,
        ]);
        $i = Item::create(['name' => 'Hot Sauce Lobster (per 100gm)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 220,
        ]);
        $i = Item::create(['name' => 'Grilled Pomfret (1pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 400,
        ]);
        $i = Item::create(['name' => 'Fried Pomfret (1pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 380,
        ]);
        $i = Item::create(['name' => 'Fish Chili']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 400,
        ]);
        $i = Item::create(['name' => 'Fish Garlic waster Sauce (1:3)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 430,
        ]);
        $i = Item::create(['name' => 'Fish Dry Red chili (1:3)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 390,
        ]);
    }
}