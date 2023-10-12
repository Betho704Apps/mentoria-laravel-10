<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Echo_;
use Brian2694\Toastr\Facades\Toastr;
use Brian2694\Toastr\Toastr as ToastrToastr;

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
    Toastr::info("message");
    return view('teste');
});

Route::get('/', function () {
    return view('index');
});

Route::prefix('clientes')->group(function () {
    Route::get('/', [ClientesController::class, 'index'])->name('clientes.index');
    //cadastro create
    Route::get('/cadastrarCliente',[ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente',[ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    //atualizar updade
    Route::get('/atualizarCliente/{id}',[ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}',[ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    //Deleta produto
    Route::delete('/delete', [ClientesController::class, 'delete'])->name('cliente.delete');
});


Route::prefix('produtos')->group(function () {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    //cadastro create
    Route::get('/cadastrarProduto',[ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produtos');
    Route::post('/cadastrarProduto',[ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produtos');
    //atualizar updade
    Route::get('/atualizarProduto/{id}',[ProdutosController::class, 'atualizarProduto'])->name('atualizar.produtos');
    Route::put('/atualizarProduto/{id}',[ProdutosController::class, 'atualizarProduto'])->name('atualizar.produtos');
    //Deleta produto
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});
