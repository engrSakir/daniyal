<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed3Appetizers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //17-30
        $c = Category::create([
            'name' => 'APPETIZERS',
            'sub_category_required' => true,
            'child_required' => false,
        ]);
        $sc = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:3'
        ]);
        $i = Item::create(['name' => 'Daniyal Special Mixed Appetizer (Springroll-3, Wonton-3, Wings-3,Fish Finger-3)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 550,
        ]);
        $i = Item::create(['name' => 'Fried Panko Prawn (6 Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 350,
        ]);
        $i = Item::create(['name' => 'Shrimp Toast (8Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 410,
        ]);
        $i = Item::create(['name' => 'Butter Deep Fried Prawn (6Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 350,
        ]);
        $i = Item::create(['name' => 'Wonthon Normal (6 Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 290,
        ]);
        $i = Item::create(['name' => 'Special Wonthon (6 Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 350,
        ]);
        $i = Item::create(['name' => 'Vegetable Spring Roll (6 Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 270,
        ]);
        $i = Item::create(['name' => 'French Fry']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 150,
        ]);
        $i = Item::create(['name' => 'Bar-B-Q Chicken Wings (9 Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 380,
        ]);
        $i = Item::create(['name' => 'Chicken Lollipop (6 Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 260,
        ]);
        $i = Item::create(['name' => 'Fried Chicken Wings (6 Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 270,
        ]);
        $i = Item::create(['name' => 'Fish Finger (6 pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 340,
        ]);
        $i = Item::create(['name' => 'Fish Cake (9 pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 410,
        ]);
        $i = Item::create(['name' => 'Fish Cutlet']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 330,
        ]);
    }
}