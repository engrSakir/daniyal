<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed16Juice extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = Category::create([
            'name' => 'SEASONAL JUICE & DRINKS',
            'has_sub_category' => false,
            'has_sub_item' => false,
        ]);

        $i = Item::create(['name' => 'Coke, Sprite, Pepsi, 7up']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 25,
        ]);
        $i = Item::create(['name' => 'Hot Coffee']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 120,
        ]);
        $i = Item::create(['name' => 'Cold Coffee']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 150,
        ]);
        $i = Item::create(['name' => 'Ice Coffee']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 150,
        ]);
        $i = Item::create(['name' => 'Pineapple']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 120,
        ]);
        $i = Item::create(['name' => 'Orange']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 150,
        ]);
        $i = Item::create(['name' => 'Malta']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 150,
        ]);
        $i = Item::create(['name' => 'Watermelon']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 120,
        ]);
        $i = Item::create(['name' => 'Apple']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 150,
        ]);
        $i = Item::create(['name' => 'Mango']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 130,
        ]);
        $i = Item::create(['name' => 'Strawberry']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 150,
        ]);
        $i = Item::create(['name' => 'Green Mango']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 100,
        ]);
        $i = Item::create(['name' => 'Papaya']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 120,
        ]);
        $i = Item::create(['name' => 'Milk Shake (Strawberry)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 150,
        ]);
        $i = Item::create(['name' => 'Milk Shake (Vanilla)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 140,
        ]);
        $i = Item::create(['name' => 'Milk Shake (Chocolate)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 160,
        ]);
        
        $i = Item::create(['name' => 'Water (500ml)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 15,
        ]);
        
        $i = Item::create(['name' => 'Water (1Ltr)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 30,
        ]);
        
    }
}

