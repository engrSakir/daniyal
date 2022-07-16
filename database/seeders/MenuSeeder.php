<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\CategoryWiseItem;
use App\Models\Item;
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








//         //41-46
//         $category = Category::create([
//             'name' => 'PIZZA 6"',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Daniyal Special Pizza',
//                 'price' => 420
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Beef Pizza',
//                 'price' => 430
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Mexican Pizza Hot',
//                 'price' => 480
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chef Special Pizza',
//                 'price' => 580
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chicken Pizza',
//                 'price' => 380
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Bar-B-Q Pizza',
//                 'price' => 490
//             ],
//         ]);

//         //41-46
//         $category = Category::create([
//             'name' => 'PIZZA 9"',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Daniyal Special Pizza',
//                 'price' => 530
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Beef Pizza',
//                 'price' => 560
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Mexican Pizza Hot',
//                 'price' => 580
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chef Special Pizza',
//                 'price' => 680
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chicken Pizza',
//                 'price' => 510
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Bar-B-Q Pizza',
//                 'price' => 590
//             ],
//         ]);
//         //41-46
//         $category = Category::create([
//             'name' => 'PIZZA 13"',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Daniyal Special Pizza',
//                 'price' => 680
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Beef Pizza',
//                 'price' => 780
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Mexican Pizza Hot',
//                 'price' => 720
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chef Special Pizza',
//                 'price' => 810
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chicken Pizza',
//                 'price' => 670
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Bar-B-Q Pizza',
//                 'price' => 730
//             ],
//         ]);
//         //47-57
//         $category = Category::create([
//             'name' => 'CHICKEN 1:3',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chinese Fried Chicken (Local 6P)',
//                 'price' => 480
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Thai Fried Chicken (Boiler 6p)',
//                 'price' => 440
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chicken Sizzling',
//                 'price' => 530
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chicken Red curry',
//                 'price' => 440
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chicken Chili Onion',
//                 'price' => 350
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Kung pao Chicken',
//                 'price' => 450
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Szechuan Chicken (Greve)',
//                 'price' => 390
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Lemon Chicken',
//                 'price' => 440
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chicken Hot Sauce',
//                 'price' => 390
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Fried Chicken Chili',
//                 'price' => 340
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chicken Basil Leaf',
//                 'price' => 390
//             ],
//         ]);

//         //58-65
//         $category = Category::create([
//             'name' => 'BEEF 1:3',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Mongolian Beef',
//                 'price' => 740
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Beef Sizzling',
//                 'price' => 550
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Beef Chili Onion',
//                 'price' => 390
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Beef Oyster sauce',
//                 'price' => 490
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Beef chili Dry',
//                 'price' => 460
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Beef Hot Sauce',
//                 'price' => 390
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Szechuan Beef',
//                 'price' => 380
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Beef with Mushroom',
//                 'price' => 450
//             ],
//         ]);

//         //66-71
//         $category = Category::create([
//             'name' => 'PRAWN 1:3',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Prawn Hot Sauce',
//                 'price' => 420
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Prawn chili',
//                 'price' => 380
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Hunan Prawn',
//                 'price' => 390
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Prawn Mushroom',
//                 'price' => 380
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Prawn Sizzling',
//                 'price' => 560
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Sweet & Sour Prawn',
//                 'price' => 410
//             ],
//         ]);
//         //72-80
//         $category = Category::create([
//             'name' => 'BAR-B-Q 1:3',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Grilled Red Snapper Fish (per 100gm)',
//                 'price' => 150
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Steam Red Snapper Fish (per 100gm)',
//                 'price' => 180
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Grilled Lobster (per 100gm)',
//                 'price' => 200
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Hot Sauce Lobster (per 100gm)',
//                 'price' => 220
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Grilled Pomfret (1pcs)',
//                 'price' => 400
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Fried Pomfret (1pcs)',
//                 'price' => 380
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Fish Chili',
//                 'price' => 400
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Fish Garlic waster Sauce (1:3)',
//                 'price' => 430
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Fish Dry Red chili (1:3)',
//                 'price' => 390
//             ],
//         ]);

//         //81-92
//         $category = Category::create([
//             'name' => 'FRIDE-RICE 1:3',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Daniyal Special Fried Rice Chicken/Beef/Prawn',
//                 'price' => 450
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Special Fried Rice Chicken & Prawn',
//                 'price' => 400
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Yang Chow Fried Rice Chicken/Beef/Prawn ',
//                 'price' => 420
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Vegetable Fried Rice only Vegetable',
//                 'price' => 300
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Egg Fried Rice',
//                 'price' => 310
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Basil Leaf Fried Rice',
//                 'price' => 340
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Schezwan Fried Rice',
//                 'price' => 380
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Mix Fried Rice',
//                 'price' => 370
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chicken Fried Rice',
//                 'price' => 360
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Beef Fried Rice',
//                 'price' => 370
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Prawn Fried Rice',
//                 'price' => 390
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Garlic Mushroom Rice',
//                 'price' => 450
//             ],
//         ]);

//         //93-97
//         $category = Category::create([
//             'name' => 'NOODLES & CHOWMEIN 1:3',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Daniyal Special Chowmein',
//                 'price' => 480
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Pad Thai Noodles',
//                 'price' => 450
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Hakka Noodles',
//                 'price' => 410
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Vegetable Chowmein',
//                 'price' => 340
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chicken Chowmein',
//                 'price' => 360
//             ]
//         ]);

//         //98-100
//         $category = Category::create([
//             'name' => 'CHAOP SUEY 1:3',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Daniyal Special ChaopSuey',
//                 'price' => 450
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'American ChaopSuey',
//                 'price' => 390
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chinese Chaop Suey',
//                 'price' => 350
//             ]
//         ]);

//         //101-103
//         $category = Category::create([
//             'name' => 'VEGETABLE 1:3',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Daniyal Special Vegetable (with Chicken & Prawn)',
//                 'price' => 400
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Thai mix Vegetable',
//                 'price' => 340
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Chinese Vegetable',
//                 'price' => 320
//             ]
//         ]);

//         //104-108
//         $category = Category::create([
//             'name' => 'DESSERT',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Cup Cake (1 Pcs)',
//                 'price' => 80
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Yogurt 1 Cup',
//                 'price' => 50
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Pudding (1 Pcs)',
//                 'price' => 80
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Ice Cream (per cup any flavor)',
//                 'price' => 120
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Kulfi',
//                 'price' => 120
//             ]
//         ]);

//         //109-125
//         $category = Category::create([
//             'name' => 'SEASONAL JUICE & DRINKS',
//         ]);
//         Item::insert([
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Coke, Sprite, Pepsi, 7up',
//                 'price' => 20
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Hot Coffee',
//                 'price' => 120
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Cold Coffee',
//                 'price' => 150
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Ice Coffee',
//                 'price' => 150
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Pineapple',
//                 'price' => 120
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Orange',
//                 'price' => 150
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Malta',
//                 'price' => 150
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Watermelon',
//                 'price' => 120
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Apple',
//                 'price' => 150
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Mango',
//                 'price' => 130
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Strawberry',
//                 'price' => 150
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Green Mango',
//                 'price' => 100
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Papaya',
//                 'price' => 120
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Milk Shake (Strawberry)',
//                 'price' => 150
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Milk Shake (Vanilla)',
//                 'price' => 140
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Milk Shake (Chocolate)',
//                 'price' => 160
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Water (500ml)',
//                 'price' => 15
//             ],
//             [
//                 'category_id' => $category->id,
//                 'name' => 'Water (1Ltr)',
//                 'price' => 25
//             ],
//         ]);


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


//          // @@@@@@ Platter Menu @@@@@@@@@@@  
//         $platter_menu = PlatterMenu::create([
//             'name' => '132',
//             'price' => 350,
//         ]);
//         $platter_menu = PlatterMenu::create([
//             'name' => '133',
//             'price' => 320,
//         ]);
//         $platter_menu = PlatterMenu::create([
//             'name' => '134',
//             'price' => 490,
//         ]);
//         $platter_menu = PlatterMenu::create([
//             'name' => '135',
//             'price' => 540,
//         ]);
//         $platter_menu = PlatterMenu::create([
//             'name' => '136',
//             'price' => 220,
//         ]);
    }
}

// /**
//  * 
//  * Daniyal
// Daniya!
// - Restaurant
// - Restaurant
// SALAD
// 1:3 01 Daniyal Special Salad (Chicken, Prawn & Beef) 450/02 Chicken Prawn Cashew Nut Salad 420/03 Grilled Chicken Salad
// 350/04 Chicken Lub Gai Salad
// 370/05 Prawn Cashew Nut Salad 400/06 Chicken Cashew Nut Salad 350/07 Green Salad
// 180/
// CONTINENTAL/FAST FOOD 31 Daniyal Special Burger
// 180/32 Bar.B.Q Roasted Burger
// 240/33 Beef Burger
// 150/34 Chicken Burger
// 130/35 Club Sandwich With French Fry 190/36 Chicken Sandwich with French Fry 150/
// 1:3
// APPETIZERS 17 Daniyal Special Mixed Appetizer
// 550/
// 1:1
// 1:3
// SOUP 08 Daniyal Special Soup 09 Thai Soup (Thick/Clear] 10 Chicken Corn Soup 11 Tom yum Soup 12 Clear vegetable Soup 13 Sea Food Soup 14 Crispy Rice Soup 15 Coconut Milk Soup
// 550/180/- 440/140/- 320/
// 500/120/- 300/
// PASTA 37 Pasta Alfredo 38 Oven Baked chicken Pasta 39 Oven Baked Beef Pasta 40 Oven Baked B-B-Q Pasta
// 1:1 1:2 210/- 330/190/- 300/220/- 350/240/- 400/
// CHICKEN
// 1:3 47 Chinese Fried Chicken (Local 6P) 480/48 Thai Fried Chicken (Boiler 6p) 440/49 Chicken Sizzling
// 530/50 Chicken Red curry
// 440/51 Chicken Chili Onion
// 350/52 Kung pao Chicken
// 450/53 Szechuan Chicken (Greve) 390/54 Lemon Chicken
// 440/
// (Springroll-3, Wonton-3, Wings-3,Fish Finger-3) 18 Fried Panko Prawn (6 Pcs) 350/19 Shrimp Toast (8Pcs)
// 410/20 Butter Deep Fried Prawn (6Pcs) 350/21 Wonthon Normal (6 Pcs) 290/22 Special Wonthon (6 Pcs) 350/23 Vegetable Spring Roll (6 Pcs) 270/24 French Fry
// 150/25 Bar-B-Q Chicken Wings (9 Pcs) 380/26 Chicken Lollipop (6 Pcs) 260/27 Fried Chicken Wings (6 Pcs) 270/28 Fish Finger (6 pcs)
// 340/29 Fish Cake (9 pcs)
// 410730 Fish Cutlet
// 330/
// 460/
// 55 Chicken Hot Sauce
// 390/
// 550/
// 380/150/- 370/
// 340/
// 56 Fried Chicken Chili 57 Chicken Basil Leaf
// 16 Hot & Sour Soup
// 390/-)
// PIZZA
// 6" 9" 13" 41 Daniyal Special Pizza 420/- 530/- 680/42 Beef Pizza 430/- 560/- 780/43 Mexican Pizza Hot 480/- 580/- 720/44 Chef Special Pizza 580/- 680/- 810/45 Chicken pizza 380/- 510/- 670/46 Bar-B-Q Pizza 490/- 590/- 730/
// Find on us facebook/daniyalrestaurant
//  * 
//  */
