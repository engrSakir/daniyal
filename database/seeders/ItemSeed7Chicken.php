<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
class ItemSeed7Chicken extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //47-57
         $c = Category::create([
            'name' => 'CHICKEN',
            'sub_category_required' => true,
            'child_required' => false,
        ]);
        $sc = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:3'
        ]);
        $i = Item::create(['name' => 'Chinese Fried Chicken (Local 6P)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 480,
        ]);
        $i = Item::create(['name' => 'Thai Fried Chicken (Boiler 6p)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 440,
        ]);
        $i = Item::create(['name' => 'Chicken Sizzling']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 530,
        ]);
        $i = Item::create(['name' => 'Chicken Red curry']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 440,
        ]);
        $i = Item::create(['name' => 'Chicken Chili Onion']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 350,
        ]);
        $i = Item::create(['name' => 'Kung pao Chicken']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 450,
        ]);
        $i = Item::create(['name' => 'Szechuan Chicken (Greve)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 390,
        ]);
        $i = Item::create(['name' => 'Lemon Chicken']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 440,
        ]);
        $i = Item::create(['name' => 'Chicken Hot Sauce']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 390,
        ]);
        $i = Item::create(['name' => 'Fried Chicken Chili']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 340,
        ]);
        $i = Item::create(['name' => 'Chicken Basil Leaf']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 390,
        ]);
    }
}