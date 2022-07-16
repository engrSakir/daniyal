<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class ItemSeed1Salad extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //1-7
        $c = Category::create([
            'name' => 'SALAD',
            'sub_category_required' => true,
            'child_required' => false,
        ]);
        $sc = SubCategory::create([
            'category_id' => $c->id,
            'name' => '1:3'
        ]);
        $i = Item::create(['name' => 'Daniyal Special Salad (Chicken, Prawn & Beef)']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 450,
        ]);
        
        $i = Item::create(['name' => 'Chicken Prawn Cashew Nut Salad']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 420,
        ]);
       
        $i = Item::create(['name' => 'Grilled Chicken Salad']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 350,
        ]);
        $i = Item::create(['name' => 'Chicken Lub Gai Salad']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 370,
        ]);
        $i = Item::create(['name' => 'Prawn Cashew Nut Salad']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 400,
        ]);
        $i = Item::create(['name' => 'Chicken Cashew Nut Salad']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 350,
        ]);
        $i = Item::create(['name' => 'Green Salad']);
        CategoryWiseItem::create([
            'item_id' => $i->id,
            'category_id' => $c->id,
            'sub_category_id' => $sc->id,
            'price' => 180,
        ]);

    }
}
