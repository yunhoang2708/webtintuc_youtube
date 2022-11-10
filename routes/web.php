<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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


Route::get('/login', [UserController::class,'getLogin']);
Route::post('/login', [UserController::class,'postLogin']);
Route::get('/logout', [UserController::class, 'getLogout']);

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function()  {
    Route::get('/home', [BackController::class, 'home']); //admin
    //staff
    Route::group(['prefix' => 'staff'], function() {
        Route::get('list', [BackController::class, 'staff']);
        Route::get('add', [BackController::class, 'staff_add']);
        Route::post('add', [BackController::class, 'staff_add_post']);
        Route::get('edit/{id}', [BackController::class, 'staff_edit']);
        Route::post('edit/{id}', [BackController::class, 'staff_edit_post']);
        Route::post('delete', [BackController::class, 'staff_delete']);
        Route::post('filter', [BackController::class, 'staff_filter']);
    });
});