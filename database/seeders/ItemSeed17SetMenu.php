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
        
    }
}



//         // @@@@@@ Set Menu @@@@@@@@@@@    
//         $set_menu = SetMenu::create([
//             'name' => '126',
//             'price' => 420,
//         ]);
//         $set_menu = SetMenu::create([
//             'name' => '127',
//             'price' => 360,
//         ]);
//         $set_menu = SetMenu::create([
//             'name' => '128',
//             'price' => 380,
//         ]);
//         $set_menu = SetMenu::create([
//             'name' => '129',
//             'price' => 450,
//         ]);
//         $set_menu = SetMenu::create([
//             'name' => '130',
//             'price' => 290,
//         ]);
//         $set_menu = SetMenu::create([
//             'name' => '131',
//             'price' => 550,
//         ]);

