@extends('index');


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Atualizar dados do Produto</h1>
    </div>
    <form method="POST" action="{{ route('atualizar.produtos', $findProduto->id) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label  class="form-label">Nome produto</label>
            <input type="text" class="form-control"  name="nome" value="{{ isset($findProduto->nome) ? $findProduto->nome : @old('nome') }}">
        </div>
        <div class="mb-3">
            <label  class="form-label" >Valor</label>
            <input id="formatReal" type="text" class="form-control" name="valor" id="formatReal" value="{{$findProduto->valor}}">
        </div>
        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>
@endsection
