<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'name' => 'Cash',
            'active_to_outlet' => true,
            'active_to_online' => false,
        ]);
        
        PaymentMethod::create([
            'name' => 'Card',
            'active_to_outlet' => true,
            'active_to_online' => false,
        ]);
       
        PaymentMethod::create([
            'name' => 'bKash',
            'active_to_outlet' => true,
            'active_to_online' => false,
        ]);
        
        PaymentMethod::create([
            'name' => 'Rocket',
            'active_to_outlet' => true,
            'active_to_online' => false,
        ]);
    }
}
