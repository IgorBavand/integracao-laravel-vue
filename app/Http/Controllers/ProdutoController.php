<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;

class ProdutoController extends Controller
{
    public function listarProdutos(Request $request){
        $query = Produtos::query();

        if($request->has('tipo')){
            $query->where('tipo', 'LIKE', '%' . $request->tipo . '%');
        }

        if($request->has('nome')){
            $query->where('nome', 'LIKE', '%' . $request->nome. '%');
        }
        $produtos = $query->paginate();

        return $produtos;
    }
    
    public function cadastrarProduto(Request $request){
        $produto = new Produtos;
        $produto->tipo = $request->input('tipo');
        $produto->nome = $request->input('nome');
        
        if( $produto->save() ){
            return  $produto;
          }
    }

    public function atualizarProduto(Request $request){
        $produto = Produtos::findOrFail( $request->id );
        $produto->tipo = $request->input('tipo');
        $produto->nome = $request->input('nome');
    
        if( $produto->save() ){
          return $produto;
        }
      } 

    public function excluirProduto($id){
        $produto = Produtos::findOrFail( $id );
        if( $produto->delete() ){
          return $produto;
        }
    }

    public function buscarProduto($id){
        $produto = Produtos::findOrFail( $id );
        return $produto;
    }
}
