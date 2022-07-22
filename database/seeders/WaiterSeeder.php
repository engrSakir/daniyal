<?php

namespace Database\Seeders;

use App\Models\Waiter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Waiter::insert([
            ['name' => 'Waiter-1'],
            ['name' => 'Waiter-2'],
            ['name' => 'Waiter-3'],
            ['name' => 'Waiter-4'],
            ['name' => 'Waiter-5']
        ]);
    }
}
