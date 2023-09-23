<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{

   public function __construct(Produto $produto)
   {
        $this->produto = $produto;
   }

    public function index(Request $request){
     

        $pesquisar = $request->pesquisar;
        // dd($pesquisar);

        $findProduto = $this->produto->getProdutosPEsquisarIndex(search: $pesquisar ?? '');
        //$findProduto = Produto::all();

        return view ('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete(Request $request){
        
    }
}
