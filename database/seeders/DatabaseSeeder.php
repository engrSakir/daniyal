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
        $this->call(MenuSeeder::class);
        $this->call(ItemSeed2::class);
        $this->call(ItemSeed1::class);
        $this->call(ItemSeed3::class);
        $this->call(ItemSeed4::class);
        $this->call(ItemSeed5::class);
        $this->call(ItemSeed6::class);
        $this->call(ItemSeed7::class);
        $this->call(ItemSeed8::class);
        $this->call(ItemSeed9::class);
        $this->call(ItemSeed10::class);
    }
}
