@extends('index');


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Atualizar dados do Usuário</h1>
    </div>
    <form method="POST" action="{{ route('atualizar.usuario', $findUsuario->id) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label  class="form-label">Nome Usuário</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ isset($findUsuario->name) ? $findUsuario->name : @old('name') }}">
        </div>
        <div class="mb-3">
            <label  class="form-label" >Email</label>
            <input type="text" class="form-control" name="email" id="email" value="{{$findUsuario->email}}">
        </div>
        <div class="mb-3">
            <label  class="form-label" >Senha</label>
            <input id="password_user" type="password" class="form-control" name="password" value="{{ $senha }}">
            <label id="verSenha" onclick="mostraSenha(this)">Exibir senha</label>
        </div>
        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>
@endsection