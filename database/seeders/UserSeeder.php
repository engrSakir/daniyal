<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'type' => 'Admin',
            'name' => 'Md. Sakir Ahmed',
            'phone' => '01304734623',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'type' => 'Manager',
            'name' => 'Ismath Jahn',
            'phone' => '01304734624',
            'password' => bcrypt('password'),
        ]);
    }
}
