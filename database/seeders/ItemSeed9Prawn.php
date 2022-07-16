<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed9Prawn extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = Category::create([
            'name' => 'PRAWN',
            'has_sub_category' => true,
            'has_sub_item' => false,
        ]);
        $sc = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:3'
        ]);
        $i = Item::create(['name' => 'Prawn Hot Sauce']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 420,
        ]);
        $i = Item::create(['name' => 'Prawn chili']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 380,
        ]);
        $i = Item::create(['name' => 'Hunan Prawn']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 390,
        ]);
        $i = Item::create(['name' => 'Prawn Mushroom']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 380,
        ]);
        $i = Item::create(['name' => 'Prawn Sizzling']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 560,
        ]);
        $i = Item::create(['name' => 'Sweet & Sour Prawn']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 410,
        ]);
    }
}