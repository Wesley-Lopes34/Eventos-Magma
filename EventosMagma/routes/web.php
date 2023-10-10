<?php

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

use App\Http\Controllers\EventController;

Route::get('/', [EventController::class, 'index']

);

Route::get('/about', function () {
    return view('about');
});

Route::get('/eventos/{id}', function ($id) {
    return view('eventos', ['id' => $id]);
});
Route::get('/eventos/create', [EventController::class, 'create']

);
