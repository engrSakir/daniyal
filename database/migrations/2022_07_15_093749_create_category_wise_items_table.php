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
        Schema::create('category_wise_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id');
            $table->foreignId('category_id');
            $table->foreignId('sub_category_id')->nullable();
            $table->double('price')->default(0);
            $table->boolean('offline_active')->default(true);
            $table->boolean('online_active')->default(false);
            $table->integer('shortcut_number')->nullable();
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
        Schema::dropIfExists('category_wise_items');
    }
};
