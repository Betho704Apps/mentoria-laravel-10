<?php

use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Echo_;

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
Route::get('/teste', function () {
    return view('teste');
});

Route::get('/', function () {
    return view('index');
});



Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    //cadastro create
    Route::get('/cadastrarProduto',[ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produtos');
    Route::post('/cadastrarProduto',[ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produtos');
    //atualizar updade
    Route::get('/atualizarProduto/{id}',[ProdutosController::class, 'atualizarProduto'])->name('atualizar.produtos');
    Route::put('/atualizarProduto/{id}',[ProdutosController::class, 'atualizarProduto'])->name('atualizar.produtos');

    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');

});
