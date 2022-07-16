<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed8Beef extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //58-65
        $c = Category::create([
            'name' => 'BEEF',
            'has_sub_category' => true,
            'has_sub_item' => false,
        ]);
        $sc = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:3'
        ]);
        $i = Item::create(['name' => 'Mongolian Beef']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 740,
        ]);
        $i = Item::create(['name' => 'Beef Sizzling']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 550,
        ]);
        $i = Item::create(['name' => 'Beef Chili Onion']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 390,
        ]);
        $i = Item::create(['name' => 'Beef Oyster sauce']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 490,
        ]);
        $i = Item::create(['name' => 'Beef chili Dry']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 460,
        ]);
        $i = Item::create(['name' => 'Beef Hot Sauce']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 390,
        ]);
        $i = Item::create(['name' => 'Szechuan Beef']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 380,
        ]);
        $i = Item::create(['name' => 'Beef with Mushroom']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 450,
        ]);
    }
}