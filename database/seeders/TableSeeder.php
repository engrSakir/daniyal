<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Table::insert([
            ['name' => 1],
            ['name' => 2],
            ['name' => 3],
            ['name' => 4],
            ['name' => 5],
            ['name' => 6],
            ['name' => 7],
            ['name' => 8],
            ['name' => 9],
            ['name' => 10],
        ]);
    }
}
