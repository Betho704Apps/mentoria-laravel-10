<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $totalDeProdutoCadastrado = $this->buscaTotalProdutosCadastrados();
        $TotalClientesCadastrados = $this->buscaTotalClientesCadastrados();
        $TotalVendasCadastrados = $this->buscaTotalVendasCadastrados();
        // $totalDeProdutoCadastrado = $this->buscaTotalProdutosCadastrados();
        return view('pages.dashboard.dashboard', compact('totalDeProdutoCadastrado', 'TotalClientesCadastrados','TotalVendasCadastrados'));



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

    // public function buscaTotalProdutosCadastrados(){
    //     $findProdutos = Produto::all()->count();
    //     return $findProdutos;
    // }
    
}


