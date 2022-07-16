<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed15Dessert extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = Category::create([
            'name' => 'DESSERT',
            'has_sub_category' => false,
            'has_sub_item' => false,
        ]);

        $i = Item::create(['name' => 'Cup Cake (1 Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 80,
        ]);
        $i = Item::create(['name' => 'Yogurt 1 Cup']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 50,
        ]);
        $i = Item::create(['name' => 'Pudding (1 Pcs)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 80,
        ]);
        $i = Item::create(['name' => 'Ice Cream (per cup any flavor)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 120,
        ]);
        $i = Item::create(['name' => 'Kulfi']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => null,
            'price' => 120,
        ]);
    }
}