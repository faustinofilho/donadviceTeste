<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\FornecedorController;
use App\Http\Controllers\Admin\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum']], function() {   
    Route::get('/categoria', [CategoriaController::class, 'index']);
    Route::get('/categoria/create', [CategoriaController::class, 'create']);
    Route::post('/categoria/create', [CategoriaController::class, 'store']);
    Route::get('/categoria/edit/{id}', [CategoriaController::class, 'edit']);
    Route::delete('/categoria/destroy/{id}', [CategoriaController::class, 'destroy']);

    Route::get('/fornecedor', [FornecedorController::class, 'index']);
    Route::get('/fornecedor/create', [FornecedorController::class, 'create']);
    Route::post('/fornecedor/create', [FornecedorController::class, 'store']);
    Route::get('/fornecedor/edit/{id}', [FornecedorController::class, 'edit']);
    Route::delete('/fornecedor/destroy/{id}', [FornecedorController::class, 'destroy']);

    Route::get('/produto', [ProdutoController::class, 'index']);
    Route::get('/produto/create', [ProdutoController::class, 'create']);
    Route::post('/produto/create', [ProdutoController::class, 'store']);
    Route::get('/produto/edit/{id}', [ProdutoController::class, 'edit']);
    Route::delete('/produto/destroy/{id}', [ProdutoController::class, 'destroy']);

    Route::post('/produto/fornecedor/create', [ProdutoController::class, 'storeFornecedor']);
    Route::delete('/fornecedor/produto/destroy/{id}', [ProdutoController::class, 'destroyProdutoFornecedor']);
});