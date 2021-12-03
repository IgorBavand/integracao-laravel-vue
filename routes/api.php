<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/importador')->group(function(){
    Route::get('/teste', function(){
        echo 'teste';
    });
});

Route::prefix('/produto')->group(function(){
    Route::post('/filtrar-produtos', [ProdutoController::class, 'listarProdutos']);
    Route::post('/cadastar-produto', [ProdutoController::class, 'cadastrarProduto']);
    Route::delete('excluir-produto/{id}', [ProdutoController::class, 'excluirProduto']);
    Route::put('atualizar-produto/{id}', [ProdutoController::class, 'atualizarProduto']);
    Route::get('buscar-produto/{id}', [ProdutoController::class, 'buscarProduto']);
});



