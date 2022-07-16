<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use App\Models\SubItem;
use Illuminate\Database\Seeder;

class ItemSeed17SetMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = Category::create([
            'name' => 'Set Menu',
            'has_sub_category' => false,
            'has_sub_item' => true,
        ]);

        $i = Item::create(['name' => 'Set Menu 126']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Thai Special Fried Rice'],
            ['item_id' => $i->id, 'name' => 'Mongolian Beef'],
            ['item_id' => $i->id, 'name' => 'Fried Chicken(2pcs)'],
            ['item_id' => $i->id, 'name' => 'Mix Vegetable'],
            ['item_id' => $i->id, 'name' => 'Drink/Water'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 420,
        ]);

        $i = Item::create(['name' => 'Set Menu 127']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Egg Fried Rice'],
            ['item_id' => $i->id, 'name' => 'Chicken Chili Onion'],
            ['item_id' => $i->id, 'name' => 'Mix Vegetable'],
            ['item_id' => $i->id, 'name' => 'Fried Chicken(2pcs)'],
            ['item_id' => $i->id, 'name' => 'Drink/Water'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 360,
        ]);

        $i = Item::create(['name' => 'Set Menu 128']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Garlic Mushroom Rice'],
            ['item_id' => $i->id, 'name' => 'Prawn Masala'],
            ['item_id' => $i->id, 'name' => 'Fried Chicken(2pcs)'],
            ['item_id' => $i->id, 'name' => 'Mix Vegetable'],
            ['item_id' => $i->id, 'name' => 'Drink/Water'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 380,
        ]);

        $i = Item::create(['name' => 'Set Menu 129']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Schezwan Fried Rice'],
            ['item_id' => $i->id, 'name' => 'Red Chili Fish Fry'],
            ['item_id' => $i->id, 'name' => 'Beef with Mushroom Oyster'],
            ['item_id' => $i->id, 'name' => 'Fried Chicken(2pcs)'],
            ['item_id' => $i->id, 'name' => 'Mix Vegetable'],
            ['item_id' => $i->id, 'name' => 'Drink/Water'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 450,
        ]);
        $i = Item::create(['name' => 'Set Menu 130']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Egg Fried Rice'],
            ['item_id' => $i->id, 'name' => 'Fried Chicken(1 pcs)'],
            ['item_id' => $i->id, 'name' => 'Chinese Vegetable'],
            ['item_id' => $i->id, 'name' => 'Chicken Chili'],
            ['item_id' => $i->id, 'name' => 'Drink/Water'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 290,
        ]);
        $i = Item::create(['name' => 'Set Menu 131']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Vegetable Fried Rice'],
            ['item_id' => $i->id, 'name' => 'Red Chili Panner Carry'],
            ['item_id' => $i->id, 'name' => 'Mix Vegetable'],
            ['item_id' => $i->id, 'name' => 'Dry Chili Mushroom'],
            ['item_id' => $i->id, 'name' => 'Drink/Water'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 550,
        ]);
    }
}