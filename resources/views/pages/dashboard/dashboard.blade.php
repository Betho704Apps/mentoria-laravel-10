@extends('index')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
</div>

<div class="row">
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total de Produtos cadastrados</h5>
          <p class="card-text">Total de produtos cadastrados no sistema apenas atuvos.</p>
          <a href="#" class="btn btn-primary">{{ $totalDeProdutoCadastrado }}</a>
        </div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Total de Clientes cadastrados</h5>
          <p class="card-text">Totalidade clientes cadastrados nos sistema, apenas ativos.</p>
          <a href="#" class="btn btn-primary">{{ $TotalClientesCadastrados}}</a>
        </div>
      </div>
    </div>
  </div>

  
<div class="row mt-5" >
    <div class="col-sm-6 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Vendas Cadastradas</h5>
          <p class="card-text">Total de vendas realizadas pelo sistama de modo geral</p>
          <a href="#" class="btn btn-primary">{{ $TotalVendasCadastrados }}</a>
        </div>

    </div>
    <div class="col-sm-6">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Usuários cadastados</h5>
          <p class="card-text">Total de usuários que tem acesso ao sistema</p>
          <a href="#" class="btn btn-primary">{{ $TotalUsuariosCadastrados }}</a>
        </div>
      </div>
    </div>
  </div>

@endsection