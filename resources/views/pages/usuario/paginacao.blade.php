{{-- extends da index --}}
@extends('index')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuarios</h1>
    </div>
    <div >
        <form action="{{ route('usuarios.index')}}" method="get" >
            <input type="text" name="pesquisar" placeholder="Digite o nome"  style="max-width:300px;">
            <button class="btn btn-info">Pesquisar</button>
            <a href="{{ route('cadastrar.usuario')}}" type="button" class="btn btn-success float-end" >Adicionar novo produto</a>
        </form>
       
        <div class="table-responsive mt-4">
            @if ($findUsuario->isEmpty())
            <hr>
            <p>Não existe dados</p>
            @else
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($findUsuario as $usuarios)
                        <tr>
                            <td>{{ $usuarios->id}}-{{ $usuarios->name}}</td>
                            <td>{{ $usuarios->email}}</td>

                            <td>
                                <a href="{{ route('atualizar.usuario', $usuarios->id)}}"  class="btn btn-light btn-sm">Editar</a>
                                <meta name='csrf-token' content=" {{ csrf_token() }}">
                                <a onclick="deleteRegistroPaginacao('{{ route('usuario.delete')}}', {{$usuarios->id}})"  class="btn btn-danger btn-sm">Excluir</a>
                            </td>
                        </tr> 
                        @endforeach
                
                    </tbody>
                </table>
          @endif
        </div>
        

    </div>

@endsection