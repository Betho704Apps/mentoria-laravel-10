{{-- extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Vendas</h1>
    </div>
    <div >
        <form action="{{ route('vendas.index') }}" method="get" >
            <input type="text" name="pesquisar" placeholder="Digite número da venda"  style="max-width:300px;">
            <button class="btn btn-info">Pesquisar</button>
            <a href="{{ route('cadastrar.venda') }}" type="button" class="btn btn-success float-end" >Adicionar nova Venda</a>
        </form>
       
        <div class="table-responsive mt-4">
            @if ($findVenda->isEmpty())
            <hr>
            <p>Não existe dados</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Número Venda</th>
                        <th>Produto</th>
                        <th>Cliente</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($findVenda as $venda)
                        <tr>
                            <td>{{ $venda->numero_da_venda}}</td>
                            <td>{{ $venda->produto->nome}}</td>
                            <td>{{ $venda->cliente->nome}}</td>
                            <td>
                                <a href="">Enviar e-mail</a>
                            </td>
                            <td>
                               
                            </td>
                        </tr> 
                        @endforeach
                
                    </tbody>
                </table>
          @endif
        </div>
        

    </div>

@endsection