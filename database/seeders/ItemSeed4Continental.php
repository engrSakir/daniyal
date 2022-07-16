<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
class ItemSeed4Continental extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //31-36
         $c = Category::create([
            'name' => 'CONTINENTAL/FAST FOOD',
            'has_sub_category' => false,
            'has_sub_item' => false,
        ]);
        $i = Item::create(['name' => 'Daniyal Special Burger']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 180,
        ]);
        $i = Item::create(['name' => 'Bar.B.Q Roasted Burger']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 240,
        ]);
        $i = Item::create(['name' => 'Beef Burger']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 150,
        ]);
        $i = Item::create(['name' => 'Chicken Burger']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 130,
        ]);
        $i = Item::create(['name' => 'Club Sandwich With French Fry']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 190,
        ]);
        $i = Item::create(['name' => 'Chicken Sandwich with French Fry']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 150,
        ]);
    }
}
