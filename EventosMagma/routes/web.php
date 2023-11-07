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

//Nessa parte de create, eu estabeleci uma regra de que essa parte só irá aparecer para usuarios que estiverem logados, ou seja um ghost não poderá criar um evento impedindo de possiveis bugs futuros e erros de lógica
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');
Route::get('/events/{id}', [EventController::class, 'show']);
Route::post("/events", [EventController::class, 'store']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
