<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(UserSeeder::class);
        $this->call(ItemSeed1Salad::class);
        $this->call(ItemSeed2Soup::class);
        $this->call(ItemSeed3Appetizers::class);
        $this->call(ItemSeed4Continental::class);
        $this->call(ItemSeed5Pasta::class);
        $this->call(ItemSeed6Pizza::class);
        $this->call(ItemSeed7Chicken::class);
        $this->call(ItemSeed8Beef::class);
        $this->call(ItemSeed9Prawn::class);
        $this->call(ItemSeed10Barbbq::class);
        $this->call(ItemSeed11FrideRice::class);
        $this->call(ItemSeed12Noodles::class);
        $this->call(ItemSeed13Chaop::class);
        $this->call(ItemSeed14Vegetable::class);
        $this->call(ItemSeed15Dessert::class);
        $this->call(ItemSeed16Juice::class);
        $this->call(ItemSeed17SetMenu::class);
        $this->call(ItemSeed18PlatterMenu::class);
        $this->call(TableSeeder::class);
        $this->call(WaiterSeeder::class);
        $this->call(ExpenseCategorySeeder::class);
        $this->call(PurchaseCategorySeeder::class);
    }
}
