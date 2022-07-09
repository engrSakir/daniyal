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
        Schema::create('set_menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->boolean('offline_active')->default(true);
            $table->boolean('online_active')->default(false);
            $table->string('slug')->nullable();
            $table->string('name');
            $table->integer('shortcut_number')->nullable();
            $table->double('price')->default(0);
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('set_menus');
    }
};
