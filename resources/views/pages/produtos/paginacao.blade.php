{{-- extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produto</h1>
    </div>
    <div >
        <form action="{{ route('produto.index')}}" method="get" >
            <input type="text" name="pesquisar" placeholder="Digite o nome"  style="max-width:300px;">
            <button class="btn btn-info">Pesquisar</button>
            <a href="{{ route('cadastrar.produtos')}}" type="button" class="btn btn-success float-end" >Adicionar novo produto</a>
        </form>
       
        <div class="table-responsive mt-4">
            @if ($findProduto->isEmpty())
            <hr>
            <p>Não existe dados</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($findProduto as $produto)
                        <tr>
                            <td>{{ $produto->id}}-{{ $produto->nome}}</td>
                            <td>{{ 'R$ ' . number_format($produto->valor, 2, ',','.') }}</td>
                            <td>
                                <a href="{{ route('atualizar.produtos', $produto->id)}}"  class="btn btn-light btn-sm">Editar</a>
                                <meta name='csrf-token' content=" {{ csrf_token() }}">
                                <a onclick="deleteRegistroPaginacao('{{ route('produto.delete')}}', {{$produto->id}})"  class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr> 
                        @endforeach
                
                    </tbody>
                </table>
          @endif
        </div>
        

    </div>
    {!! Toastr::message() !!} 

@endsection