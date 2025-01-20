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

//Nessa parte de create, eu estabeleci uma regra de que essa parte só irá aparecer para usuarios que estiverem logados(middleware), ou seja um ghost não poderá criar um evento impedindo de possiveis bugs futuros e erros de lógica
Route::get('/events/create', [EventController::class, 'create'])->middleware('auth');

//Aqui eu estou passando o id do evento para que mostre as informações sobre esse evento
Route::get('/events/{id}', [EventController::class, 'show']);

Route::post("/events", [EventController::class, 'store']);

//Criação da parte que envia para a tela de Dashboard para caso o usuario esteja logado
Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

//Rota de controle para apaga um evento da tabela events
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');

//Rota de controle para editar um evento da tabela events
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');

//Passando os dados para o banco de dados
Route::put('/update/{id}', [EventController::class, 'update'])->name('event.update');

use Inertia\Inertia;

Route::get('/login', function () {
    return Inertia::render('Login');
});
