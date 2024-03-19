<?php

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

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventControllerBD;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PesquisarController;

Route::get('/', [EventController::class, 'index']);
Route::get('/meditar', [EventController::class, 'indexMeditar']);
Route::get('/eventos', [EventController::class, 'eventos']);
Route::get('/eventos/meditar/{id}', [EventController::class, 'show']);

Route::controller(PesquisarController::class)->group(function(){
    Route::get('/pesquisar', 'index')->name('pesquisar.index');
    Route::post('/pesquisar','pesquisar')->name('pesquisar.pesquisar');
});

Route::post('/enviarComentario{id_audio}', [EventControllerBD::class, 'avaliacao']);
Route::get('/eventos/meditar/comentarios/{id}', [EventControllerBD::class, 'comentarios']);

Route::controller(UserController::class)->group(function(){
    Route::get('/cadastrar','index')->name('cadastrar.index');
    Route::post('/cadastrar','store')->name('cadastrar.store');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('/login','login')->name('login.login');
    Route::post('/login','loginValidate')->name('login.loginValidate');
    Route::get('/logout','destroy')->name('login.destroy');
});
