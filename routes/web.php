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
// use App\Http\Controllers\ProdutoController;

// Route::resource('produto', ProdutoController::class);


Route::get('/', function () {
    return view('site/index');
});

Auth::routes();

Route::get('produtos', function(){
    return view('app.produtos');
})->name('produtos')->middleware('auth');

Route::get('fornecedores', function(){
    return view('app.fornecedores');
})->name('fornecedores')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('produto', [App\Http\Controllers\ProdutoController::class, 'index'])->name('produto');

// Route::get('fornecedor', [App\Http\Controllers\FornecedorController::class, 'index'])->name('fornecedor');


