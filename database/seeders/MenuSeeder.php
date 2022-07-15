<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use App\Models\SetMenu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //1-7
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SALAD 1:3',
        ]);
        Item::insert([
            [
                'category_id' => $category->id,
                'name' => 'Daniyal Special Salad (Chicken, Prawn & Beef)',
                'price' => 450
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Prawn Cashew Nut Salad',
                'price' => 420
            ],
            [
                'category_id' => $category->id,
                'name' => 'Grilled Chicken Salad',
                'price' => 350
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Lub Gai Salad',
                'price' => 370
            ],
            [
                'category_id' => $category->id,
                'name' => 'Prawn Cashew Nut Salad',
                'price' => 400
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Cashew Nut Salad',
                'price' => 350
            ],
            [
                'category_id' => $category->id,
                'name' => 'Green Salad',
                'price' => 180
            ],
        ]);

        //8-16
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SOUP 1:1',
        ]);
        Item::insert([
            [
                'category_id' => $category->id,
                'name' => 'Thai Soup (Thick/Clear]',
                'price' => 180
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Corn Soup',
                'price' => 140
            ],
            [
                'category_id' => $category->id,
                'name' => 'Clear vegetable Soup',
                'price' => 120
            ],
            [
                'category_id' => $category->id,
                'name' => 'Hot & Sour Soup',
                'price' => 150
            ],
        ]);
        //8-16
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SOUP 1:3',
        ]);
        Item::insert([
            [
                'category_id' => $category->id,
                'name' => 'Daniyal Special Soup',
                'price' => 550
            ],
            [
                'category_id' => $category->id,
                'name' => 'Thai Soup (Thick/Clear]',
                'price' => 440
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Corn Soup',
                'price' => 320
            ],
            [
                'category_id' => $category->id,
                'name' => 'Top yum Soup',
                'price' => 500
            ],
            [
                'category_id' => $category->id,
                'name' => 'Clear vegetable Soup',
                'price' => 300
            ],
            [
                'category_id' => $category->id,
                'name' => 'Sea Food Soup',
                'price' => 460
            ],
            [
                'category_id' => $category->id,
                'name' => 'Crispy Rice Soup',
                'price' => 550
            ],
            [
                'category_id' => $category->id,
                'name' => 'Coconut Milk Soup',
                'price' => 380
            ],
            [
                'category_id' => $category->id,
                'name' => 'Hot & Sour Soup',
                'price' => 370
            ],
        ]);

        //17-30
        $category = Category::create([
            'type' => 'Item',
            'name' => 'APPETIZERS 1:3',
        ]);
        Item::insert([
            [
                'category_id' => $category->id,
                'name' => 'Daniyal Special Mixed Appetizer (Springroll-3, Wonton-3, Wings-3,Fish Finger-3)',
                'price' => 550
            ],
            [
                'category_id' => $category->id,
                'name' => 'Fried Panko Prawn (6 Pcs)',
                'price' => 350
            ],
            [
                'category_id' => $category->id,
                'name' => 'Shrimp Toast (8Pcs)',
                'price' => 410
            ],
            [
                'category_id' => $category->id,
                'name' => 'Butter Deep Fried Prawn (6Pcs)',
                'price' => 350
            ],
            [
                'category_id' => $category->id,
                'name' => 'Wonthon Normal (6 Pcs)',
                'price' => 290
            ],
            [
                'category_id' => $category->id,
                'name' => 'Special Wonthon (6 Pcs)',
                'price' => 350
            ],
            [
                'category_id' => $category->id,
                'name' => 'Vegetable Spring Roll (6 Pcs)',
                'price' => 270
            ],
            [
                'category_id' => $category->id,
                'name' => 'French Fry',
                'price' => 150
            ],
            [
                'category_id' => $category->id,
                'name' => 'Bar-B-Q Chicken Wings (9 Pcs)',
                'price' => 380
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Lollipop (6 Pcs)',
                'price' => 260
            ],
            [
                'category_id' => $category->id,
                'name' => 'Fried Chicken Wings (6 Pcs)',
                'price' => 270
            ],
            [
                'category_id' => $category->id,
                'name' => 'Fish Finger (6 pcs)',
                'price' => 340
            ],
            [
                'category_id' => $category->id,
                'name' => 'Fish Cake (9 pcs)',
                'price' => 410
            ],
            [
                'category_id' => $category->id,
                'name' => 'Fish Cutlet',
                'price' => 330
            ],
        ]);

        //31-36
        $category = Category::create([
            'type' => 'Item',
            'name' => 'CONTINENTAL/FAST FOOD',
        ]);
        Item::insert([
            [
                'category_id' => $category->id,
                'name' => 'Daniyal Special Burger',
                'price' => 180
            ],
            [
                'category_id' => $category->id,
                'name' => 'Bar.B.Q Roasted Burger',
                'price' => 240
            ],
            [
                'category_id' => $category->id,
                'name' => 'Beef Burger',
                'price' => 150
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Burger',
                'price' => 130
            ],
            [
                'category_id' => $category->id,
                'name' => 'Club Sandwich With French Fry',
                'price' => 190
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Sandwich with French Fry',
                'price' => 150
            ],
        ]);

        //37-40
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PASTA 1:1',
        ]);
        Item::insert([
            [
                'category_id' => $category->id,
                'name' => 'Pasta Alfredo',
                'price' => 210
            ],
            [
                'category_id' => $category->id,
                'name' => 'Oven Baked chicken Pasta',
                'price' => 190
            ],
            [
                'category_id' => $category->id,
                'name' => 'Oven Baked Beef Pasta',
                'price' => 220
            ],
            [
                'category_id' => $category->id,
                'name' => 'Oven Baked B-B-Q Pasta',
                'price' => 240
            ],
        ]);

        //37-40
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PASTA 1:2',
        ]);
        Item::insert([
            [
                'category_id' => $category->id,
                'name' => 'Pasta Alfredo',
                'price' => 330
            ],
            [
                'category_id' => $category->id,
                'name' => 'Oven Baked chicken Pasta',
                'price' => 300
            ],
            [
                'category_id' => $category->id,
                'name' => 'Oven Baked Beef Pasta',
                'price' => 350
            ],
            [
                'category_id' => $category->id,
                'name' => 'Oven Baked B-B-Q Pasta',
                'price' => 400
            ],
        ]);

        //41-46
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PIZZA 6"',
        ]);
        Item::insert([
            [
                'category_id' => $category->id,
                'name' => 'Daniyal Special Pizza',
                'price' => 420
            ],
            [
                'category_id' => $category->id,
                'name' => 'Beef Pizza',
                'price' => 430
            ],
            [
                'category_id' => $category->id,
                'name' => 'Mexican Pizza Hot',
                'price' => 480
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chef Special Pizza',
                'price' => 580
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Pizza',
                'price' => 380
            ],
            [
                'category_id' => $category->id,
                'name' => 'Bar-B-Q Pizza',
                'price' => 490
            ],
        ]);

        //41-46
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PIZZA 9"',
        ]);
        Item::insert([
            [
                'category_id' => $category->id,
                'name' => 'Daniyal Special Pizza',
                'price' => 530
            ],
            [
                'category_id' => $category->id,
                'name' => 'Beef Pizza',
                'price' => 560
            ],
            [
                'category_id' => $category->id,
                'name' => 'Mexican Pizza Hot',
                'price' => 580
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chef Special Pizza',
                'price' => 680
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Pizza',
                'price' => 510
            ],
            [
                'category_id' => $category->id,
                'name' => 'Bar-B-Q Pizza',
                'price' => 590
            ],
        ]);
        //41-46
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PIZZA 13"',
        ]);
        Item::insert([
            [
                'category_id' => $category->id,
                'name' => 'Daniyal Special Pizza',
                'price' => 680
            ],
            [
                'category_id' => $category->id,
                'name' => 'Beef Pizza',
                'price' => 780
            ],
            [
                'category_id' => $category->id,
                'name' => 'Mexican Pizza Hot',
                'price' => 720
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chef Special Pizza',
                'price' => 810
            ],
            [
                'category_id' => $category->id,
                'name' => 'Chicken Pizza',
                'price' => 670
            ],
            [
                'category_id' => $category->id,
                'name' => 'Bar-B-Q Pizza',
                'price' => 730
            ],
        ]);
        //47-57
        $category = Category::create([
            'type' => 'Item',
            'name' => 'CHICKEN 1:3',
        ]);

        //58-65
        $category = Category::create([
            'type' => 'Item',
            'name' => 'BEEF 1:3',
        ]);

        //66-71
        $category = Category::create([
            'type' => 'Item',
            'name' => 'PRAWN 1:3',
        ]);

        //72-80
        $category = Category::create([
            'type' => 'Item',
            'name' => 'BAR-B-Q 1:3',
        ]);
        
        //81-92
        $category = Category::create([
            'type' => 'Item',
            'name' => 'FRIDE-RICE 1:3',
        ]);

        //93-97
        $category = Category::create([
            'type' => 'Item',
            'name' => 'NOODLES & CHOWMEIN 1:3',
        ]);

        //98-100
        $category = Category::create([
            'type' => 'Item',
            'name' => 'CHAOP SUEY 1:3',
        ]);

        //101-103
        $category = Category::create([
            'type' => 'Item',
            'name' => 'VEGETABLE 1:3',
        ]);

        //104-108
        $category = Category::create([
            'type' => 'Item',
            'name' => 'DESSERT',
        ]);

        //109-125
        $category = Category::create([
            'type' => 'Item',
            'name' => 'SEASONAL JUICE & DRINKS',
        ]);



// @@@@@@ Set Menu @@@@@@@@@@@    

        $category = Category::create([
            'type' => 'Set Menu',
            'name' => 'Set Menu',
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '126',
            'price' => 420,
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '127',
            'price' => 360,
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '128',
            'price' => 380,
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '129',
            'price' => 450,
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '130',
            'price' => 290,
        ]);
        $set_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '131',
            'price' => 550,
        ]);

        $category = Category::create([
            'type' => 'Set Menu',
            'name' => 'Platter Menu',
        ]);
        $platter_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '132',
            'price' => 350,
        ]);
        $platter_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '133',
            'price' => 320,
        ]);
        $platter_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '134',
            'price' => 490,
        ]);
        $platter_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '135',
            'price' => 540,
        ]);
        $platter_menu = SetMenu::create([
            'category_id' => $category->id,
            'name' => '136',
            'price' => 220,
        ]);
    }
}

/**
 * 
 * Daniyal
Daniya!
- Restaurant
- Restaurant
SALAD
1:3 01 Daniyal Special Salad (Chicken, Prawn & Beef) 450/02 Chicken Prawn Cashew Nut Salad 420/03 Grilled Chicken Salad
350/04 Chicken Lub Gai Salad
370/05 Prawn Cashew Nut Salad 400/06 Chicken Cashew Nut Salad 350/07 Green Salad
180/
CONTINENTAL/FAST FOOD 31 Daniyal Special Burger
180/32 Bar.B.Q Roasted Burger
240/33 Beef Burger
150/34 Chicken Burger
130/35 Club Sandwich With French Fry 190/36 Chicken Sandwich with French Fry 150/
1:3
APPETIZERS 17 Daniyal Special Mixed Appetizer
550/
1:1
1:3
SOUP 08 Daniyal Special Soup 09 Thai Soup (Thick/Clear] 10 Chicken Corn Soup 11 Tom yum Soup 12 Clear vegetable Soup 13 Sea Food Soup 14 Crispy Rice Soup 15 Coconut Milk Soup
550/180/- 440/140/- 320/
500/120/- 300/
PASTA 37 Pasta Alfredo 38 Oven Baked chicken Pasta 39 Oven Baked Beef Pasta 40 Oven Baked B-B-Q Pasta
1:1 1:2 210/- 330/190/- 300/220/- 350/240/- 400/
CHICKEN
1:3 47 Chinese Fried Chicken (Local 6P) 480/48 Thai Fried Chicken (Boiler 6p) 440/49 Chicken Sizzling
530/50 Chicken Red curry
440/51 Chicken Chili Onion
350/52 Kung pao Chicken
450/53 Szechuan Chicken (Greve) 390/54 Lemon Chicken
440/
(Springroll-3, Wonton-3, Wings-3,Fish Finger-3) 18 Fried Panko Prawn (6 Pcs) 350/19 Shrimp Toast (8Pcs)
410/20 Butter Deep Fried Prawn (6Pcs) 350/21 Wonthon Normal (6 Pcs) 290/22 Special Wonthon (6 Pcs) 350/23 Vegetable Spring Roll (6 Pcs) 270/24 French Fry
150/25 Bar-B-Q Chicken Wings (9 Pcs) 380/26 Chicken Lollipop (6 Pcs) 260/27 Fried Chicken Wings (6 Pcs) 270/28 Fish Finger (6 pcs)
340/29 Fish Cake (9 pcs)
410730 Fish Cutlet
330/
460/
55 Chicken Hot Sauce
390/
550/
380/150/- 370/
340/
56 Fried Chicken Chili 57 Chicken Basil Leaf
16 Hot & Sour Soup
390/-)
PIZZA
6" 9" 13" 41 Daniyal Special Pizza 420/- 530/- 680/42 Beef Pizza 430/- 560/- 780/43 Mexican Pizza Hot 480/- 580/- 720/44 Chef Special Pizza 580/- 680/- 810/45 Chicken pizza 380/- 510/- 670/46 Bar-B-Q Pizza 490/- 590/- 730/
Find on us facebook/daniyalrestaurant
 * 
 */