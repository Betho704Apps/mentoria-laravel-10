<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use GuzzleHttp\Client;

class ClientesController extends Controller
{
    public function __construct(Cliente $cliente)
    {
         $this->cliente = $cliente;
    }
 
     public function index(Request $request){
      
         $pesquisar = $request->pesquisar;
 
         $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
 
         return view ('pages.clientes.paginacao', compact('findCliente'));
     }
 
     public function delete(Request $request){
     
         $id = $request->id;
         $buscaRegistro = Cliente::find($id);
         $buscaRegistro->delete();
         Toastr::warning('Cadastro excluido com sucesso','Deletado',["positionClass"=>"toast-top-right","progressBar" => true]);
         return response()->json(['success'=>true]);
 
     }
 
     
 
     public function cadastrarCliente(FormRequestClientes $request){
 
         if($request->method() == 'POST'){
 
             $data = $request->all();
            //  dd($data);
             Cliente::create($data);
             Toastr::success('Cadsatro realizado com Sucesso','Cadastro',["positionClass"=>"toast-top-right","progressBar" => true]);
             
             return redirect()->route('clientes.index');
         };
         
         return view('pages.clientes.create');
 
     }
 
     public function atualizarCliente(Request $request, $id){
        if($request->method() === "PUT"){
            $data = $request->all();
            $data['valor'] = formatarComoMoedaAmericana($request->valor);
            $registro = Cliente::find($id);
            $registro->update($data);
            Toastr::success('Dados atualizadso com sucesso');
            return redirect()->route('produto.index');
 
        };
             
          $findProduto = Cliente::where('id', '=', $id)->first();
         return view('pages.clientes.atualiza', compact('findProduto'));
     }
 
}
