<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $TotalDeProdutoCadastrado = $this->buscaTotalProdutosCadastrados();
        $TotalClientesCadastrados = $this->buscaTotalClientesCadastrados();
        $TotalVendasCadastrados = $this->buscaTotalVendasCadastrados();
        $TotalUsuariosCadastrados = $this->buscaTotalUsuariosCadastrados();
        return view('pages.dashboard.dashboard', compact('TotalDeProdutoCadastrado', 'TotalClientesCadastrados','TotalVendasCadastrados','TotalUsuariosCadastrados'));



    }

    public function buscaTotalProdutosCadastrados(){
        $findProdutos = Produto::all()->count();
        return $findProdutos;
    }

    public function buscaTotalClientesCadastrados(){
        $findProdutos = Cliente::all()->count();
        return $findProdutos;
    }

    public function buscaTotalVendasCadastrados(){
        $findProdutos = Venda::all()->count();
        return $findProdutos;
    }

    public function buscaTotalUsuariosCadastrados(){
        $findProdutos = User::all()->count();
        return $findProdutos;
    }
    
}


