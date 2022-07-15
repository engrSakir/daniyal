<?php

use App\Http\Livewire\Login;
use App\Http\Livewire\SuperAdmin;
use App\Http\Livewire\Admin;
use App\Http\Livewire\Manager;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Login::class)->name('login')->middleware('guest');

Route::group(['middleware' => ['admin', 'auth'], 'as' => 'admin.', 'prefix' => 'admin/'], function (){
    Route::get('dashboard', Admin\Dashoard::class)->name('dashboard');

});

Route::group(['middleware' => ['manager','auth'], 'as' => 'manager.', 'prefix' => 'manager/'], function (){
    Route::get('dashboard', Manager\Dashoard::class)->name('dashboard');
    Route::get('pos', Manager\POS::class)->name('pos');
    Route::get('category', Manager\Category::class)->name('category');
    Route::get('item', Manager\Item::class)->name('item');
    Route::get('set-menu', Manager\SetMenu::class)->name('set_menu');
    Route::get('platter-menu', Manager\PlatterMenu::class)->name('platter_menu');
    Route::get('offer', Manager\Offer::class)->name('offer');
    Route::get('menu', Manager\Menu::class)->name('menu');


});
