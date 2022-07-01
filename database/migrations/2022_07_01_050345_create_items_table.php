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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->boolean('offline_active')->default(true);
            $table->boolean('online_active')->default(false);
            $table->string('slug')->nullable();
            $table->string('name');
            $table->string('banglish_name')->nullable();//amar nam sakir
            $table->integer('product_number')->nullable();
            $table->double('price')->default(0);
            $table->string('image')->nullable();
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
        Schema::dropIfExists('items');
    }
};
