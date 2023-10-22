@extends('index');


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar novo Usuário</h1>
    </div>
    <form method="POST" accept="{{route('cadastrar.usuario')}}">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Nome do usuário</label>
            <input type="text" class="form-control"  name="name" value="{{ @old('name')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label" >e-mail</label>
            <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="mb-3">
            <label  class="form-label" >Senha</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
