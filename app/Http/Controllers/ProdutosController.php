<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

function formatarComoMoedaAmericana($valor) {
    // Remover todos os caracteres não numéricos.
    $valorLimpo = preg_replace('/[^0-9]/', '', $valor);

    // Converter o valor limpo em float
    $valorFloat = floatval($valorLimpo) / 100;

    // Formatá-lo para o padrão americano.
    return number_format($valorFloat, 2, '.', ',');
}

class ProdutosController extends Controller
{

   public function __construct(Produto $produto)
   {
        $this->produto = $produto;
   }

    public function index(Request $request){
     
        $pesquisar = $request->pesquisar;

        $findProduto = $this->produto->getProdutosPEsquisarIndex(search: $pesquisar ?? '');

        return view ('pages.produtos.paginacao', compact('findProduto'));
    }

    public function delete(Request $request){
        $id = $request->id;
        $buscaRegistro = Produto::find($id);
        $buscaRegistro->delete();
        return response()->json(['success'=>true]);

    }

    

    public function cadastrarProduto(Request $request){

        
        
        if($request->method() == 'POST'){

            $data = $request->all();
            $valorValidado = formatarComoMoedaAmericana($request->valor);
            $data['valor']=$valorValidado;
            
            Produto::create($data);
            return redirect()->route('produto.index');
        };
        
        return view('pages.produtos.create');

    }

    public function atualizarProduto(Request $request, $id){
       if($request->method() === "PUT"){
           $data = $request->all();
           $data['valor'] = formatarComoMoedaAmericana($request->valor);
           $registro = Produto::find($id);
           $registro->update($data);
           return redirect()->route('produto.index');

       };

         $findProduto = Produto::where('id', '=', $id)->first();
        return view('pages.produtos.atualiza', compact('findProduto'));
    }

    
}
