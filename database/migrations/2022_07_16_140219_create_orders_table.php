<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('creator_id');
            $table->foreignId('waiter_id')->nullable();
            $table->foreignId('table_id')->nullable();
            $table->string('serial_number');
            $table->string('status')->default('Pending'); //Pending, Reject, Cook, Serve, Complete
            $table->boolean('is_online')->default(false);
            $table->boolean('is_parcel')->default(false);
            $table->string('customer_phone')->nullable();
            $table->string('customer_address')->nullable();
            $table->double('paid_amount');
            $table->double('discount_fixed_amount')->default(0); // second
            $table->double('discount_percentage')->default(0); //first 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
