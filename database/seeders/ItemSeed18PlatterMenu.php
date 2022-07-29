<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use App\Models\SubItem;
use Illuminate\Database\Seeder;

class ItemSeed18PlatterMenu extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = Category::create([
            'name' => 'Platter Menu',
            'has_sub_category' => false,
            'has_sub_item' => true,
        ]);

        $i = Item::create(['name' => 'Thai Soup (1:1)']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Wonton (1pcs)'],
            ['item_id' => $i->id, 'name' => 'Veg. Spring Roll (2pcs)'],
            ['item_id' => $i->id, 'name' => 'Fried Chicken (1pcs)'],
            ['item_id' => $i->id, 'name' => 'Water(500ml)'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 350,
        ]);

        $i = Item::create(['name' => 'Clear Vegetable Soup/Corn Soup (1:1)']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Special Wonton (2pcs)'],
            ['item_id' => $i->id, 'name' => 'Fried Chicken Wings (2pcs)'],
            ['item_id' => $i->id, 'name' => 'French Fries'],
            ['item_id' => $i->id, 'name' => 'Water(500ml)'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 320,
        ]);

        $i = Item::create(['name' => 'Special Noodles (1:1)']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Bar.B.Q. Wings (3pcs)'],
            ['item_id' => $i->id, 'name' => 'Club Sandwich'],
            ['item_id' => $i->id, 'name' => 'French Fries (1:1)'],
            ['item_id' => $i->id, 'name' => 'Water(500ml)'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 490,
        ]);

        $i = Item::create(['name' => 'Alfredo Pasta (1:1)']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Fish Finger (2pcs)'],
            ['item_id' => $i->id, 'name' => 'Fried Chicken (1pcs)'],
            ['item_id' => $i->id, 'name' => 'French Fries (1:1)'],
            ['item_id' => $i->id, 'name' => 'Juice (Seasonal)'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 540,
        ]);
        $i = Item::create(['name' => 'Chicken Corn Soup (1:1)']);
        SubItem::insert([
            ['item_id' => $i->id, 'name' => 'Chicken Soumai (1 pcs)'],
            ['item_id' => $i->id, 'name' => 'Special Wonton (1 pcs)'],
            ['item_id' => $i->id, 'name' => 'Vegetable Spring Roll (1pcs)'],
            ['item_id' => $i->id, 'name' => 'French Fries (1:1) '],
            ['item_id' => $i->id, 'name' => 'Water (500ml)'],
        ]);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 220,
        ]);
    }
}