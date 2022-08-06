<?php

use App\Http\Controllers\PosController;
use App\Http\Controllers\PrintController;
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
    Route::get('manager', Admin\Manager::class)->name('manager');
});

Route::group(['middleware' => ['manager','auth'], 'as' => 'manager.', 'prefix' => 'manager/'], function (){
    Route::get('dashboard', Manager\Dashoard::class)->name('dashboard');
    Route::get('order', Manager\Order::class)->name('order');
    Route::get('category', Manager\Category::class)->name('category');
    Route::get('category-details/{category}', Manager\CategoryDetails::class)->name('category_details');
    Route::get('item', Manager\Item::class)->name('item');
    Route::get('offer', Manager\Offer::class)->name('offer');
    Route::get('table', Manager\Table::class)->name('table');
    Route::get('waiter', Manager\Waiter::class)->name('waiter');
    Route::get('menu', Manager\Menu::class)->name('menu');
    Route::get('report', Manager\Report::class)->name('report');
    Route::get('profile', Manager\Profile::class)->name('profile');
    Route::get('expense', Manager\Expense::class)->name('expense');

    Route::get('pos', [PosController::class, 'index'])->name('pos');
    Route::get('/pos/save/{item_list}', [PosController::class, 'save']);





    Route::get('invoice/{order}', [PrintController::class, 'invoice'])->name('invoice');
    Route::get('report/daily/{date}', [PrintController::class, 'daily_report'])->name('daily_report');

});
