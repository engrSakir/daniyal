<?php

namespace Database\Seeders;

use App\Models\StaticOption;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaticOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StaticOption::insert([
            ['option_name' => 'website notice', 'option_value' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi ...... !'],
            ['option_name' => 'logo', 'option_value' => 'assets/images/no-logo.png'],
            ['option_name' => 'website cover image', 'option_value' => 'assets/images/no-cover.png'],
            ['option_name' => 'bin_number', 'option_value' => null],
            ['option_name' => 'vat_percentage', 'option_value' => 0],
            ['option_name' => 'vat_activation', 'option_value' => 1],
            ['option_name' => 'membership_activation', 'option_value' => 0],
            ['option_name' => 'delivery_charge_in_business', 'option_value' => 0],
            ['option_name' => 'online_delivery_charge', 'option_value' => 50],
            
            
            
            
            
            
        ]);
    }
}
