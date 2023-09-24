@extends('index');


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar novo Produto</h1>
    </div>
    <form method="POST" accept="{{route('cadastrar.produtos')}}">
        @csrf
        <div class="mb-3">
            <label  class="form-label">Nome produto</label>
            <input type="text" class="form-control"  name="nome">
        </div>
        <div class="mb-3">
            <label  class="form-label" >Valor</label>
            <input type="text" class="form-control" name="valor" id="formatReal">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
