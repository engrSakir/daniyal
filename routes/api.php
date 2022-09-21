<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', [PosController::class, 'get_products']);
Route::get('/products2', [PosController::class, 'get_products2']);

Route::post('login', function (Request $request) {
    $this->validate([
        'phone' => 'required|string',
        'password' => 'required|string'
    ]);

    if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password, 'account_activation' => true])) {
        if (auth()->user()->manager()) {
            //delete old token
            auth()->user()->tokens()->delete();
            return [
                'status' => true,
                'token' => auth()->user()->createToken('API TOKEN')->plainTextToken, //generate new token
                'user' => auth()->user()
            ];
        } else {
            Auth::logout();
            return [
                'status' => false,
                'message' => 'You are not permitted',
            ];
        }
    } else {
        return [
            'status' => false,
            'message' => 'Phone number or password incorrect',
        ];
    }
});

Route::get('logout', function () {
    if (auth()->check()) {
        //delete all tokens
        auth()->user()->tokens()->delete();
        return [
            'status' => true,
            'message' => 'Successfully logout'
        ];
    } else {
        return [
            'status' => false,
            'message' => 'Auth failed'
        ];
    }
})->middleware('auth:sanctum');
