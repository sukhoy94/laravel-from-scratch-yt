<?php

use App\Http\Controllers\HelloWorldController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/hello-world/{userName}', [HelloWorldController::class, 'index']);
//Route::get('/hello-world-two', [HelloWorldController::class, 'two']);

Route::controller(HelloWorldController::class)->group(function() {
    Route::get('/hello-world/{userName}', 'index');
    Route::get('/hello-world-two', 'two');
});




Route::view('/about', 'about', ['name' => 'Andrew']);

Route::prefix('administrator')->group(function() {
    Route::name('users.')->group(function() {
        Route::get('/user/{name}', function (string $name) {
            return 'route for letters';
        })->where('name', '[A-Za-z]+')->name('user-with-letters');

        Route::get('/user/{id}', function (string $id) {
            return 'route for numbers';
        })->where('id', '[0-9]+')->name('user-with-numeric-id');
    });
});


Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index']);
Route::resource('photos', \App\Http\Controllers\PhotoController::class);



