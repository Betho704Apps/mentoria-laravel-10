<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VendaController extends Controller
{
    public function __construct(Venda $venda)
    {
         $this->venda = $venda;
    }
 
    public function index(Request $request){
        $pesquisar = $request->pesquisar;
        $findVenda = $this->venda->getVendaPesquisarIndex(search: $pesquisar ?? '');
 
        return view ('pages.vendas.paginacao', compact('findVenda'));
    }
     
 
    public function cadastrarVenda(FormRequestVenda $request){

        $findNumeracao = Venda::max('numero_da_venda')+1;
        $findProduto = Produto::all();
        $findCliente = Cliente::all();

         if($request->method() == 'POST'){
            $data = $request->all();
            $data['numero_da_venda'] = $findNumeracao;
            Venda::create($data);
            Toastr::success('Venda realizada com sucesso!','Vendas',["positionClass"=>"toast-top-right","progressBar" => true]);
            return redirect()->route('vendas.index');
         };

   
        return view('pages.vendas.create', compact('findNumeracao','findProduto','findCliente'));
 
    }
    
    public function enviaComprovantePorEmail($id){

        $buscaVenda = Venda::where('id','=',$id)->first();

        $produtoNome = $buscaVenda->produto->nome;
        $clienteNome = $buscaVenda->cliente->nome;
        $clienteEmail = $buscaVenda->cliente->email;

        $sendMailData = [
            'produtoName' => $produtoNome,
            'clienteNome' => $clienteNome,
            'clienteMail' => $clienteEmail
        ];


        // Mail::raw('Este é um email de teste.', function ($message) {
        // $message->to('hgc.estudo@gmail.com');
        // $message->subject('Assunto do Email de Teste');
        // $message->from('confirmar.acesso@gmail.com', 'Nome do Remetente');
        // });

        // dd("enviou");
        Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($sendMailData));
         
        Toastr::success('Email enviado com Sucesso');
        
        return redirect()->route('vendas.index');
    }
    
}
