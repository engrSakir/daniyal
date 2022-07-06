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
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->nullable();
            $table->foreignId('set_menu_id')->nullable();
            $table->boolean('offline_active')->default(true);
            $table->boolean('online_active')->default(false);
            $table->string('slug')->nullable();
            $table->string('name');
            $table->string('banglish_name')->nullable();//amar nam sakir
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('issue_date')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->double('discount_percentage')->default(0);
            $table->double('discount_fixed_amount')->default(0);
            $table->double('buy_qty')->default(0);//example buy 1 get one ofer
            $table->double('get_qty')->default(0); //
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
        Schema::dropIfExists('offers');
    }
};
