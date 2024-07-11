<?php

use App\Http\Controllers\CarteiraController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MeusProdutosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckEmail;

Route::view('/', 'home')->name('home');
Route::resource('/users', userController::class);
Route::resource('/produtos', ProdutosController::class)->middleware('auth');
Route::get('/afiliado', [ProdutosController::class,'afiliado'])->name('produtos.afiliado')->middleware('auth');
Route::view('/login', 'autenticacao.login')->name('autenticacao.login');
Route::post('/auth',[LoginController::class,'auth'])->name('autenticar.login');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/registro',[LoginController::class,'create'])->name('registro');
Route::get('/meusprodutos',[MeusProdutosController::class,'index'])->name('meusprodutos.index')->middleware('auth');
//Route::resource('/produtos',);
Route::get('/saldo',[CarteiraController::class,'saldo'])->name('saldo')->middleware('auth');
Route::get('/extrato',[CarteiraController::class,'extrato'])->name('extrato')->middleware('auth');
//Route::get('/saque',);
//Route::get('/extrato',);
