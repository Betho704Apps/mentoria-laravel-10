@extends('index')


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar Venda</h1>
    </div>

    <div class="preloader">
        <div class="preloader-spinner"></div>
    </div>
   
    <form method="POST" accept="{{ route('cadastrar.venda') }}">
        @csrf
        {{-- <meta name='csrf-token' content=" {{ csrf_token() }}"> --}}
        <div class="mb-3">
            <label  class="form-label">Número venda</label>
            <input disabled id="numero_da_venda" type="text"  form-control  name="numero_da_venda" value="{{ $findNumeracao }}">
            @if ($errors->has('numero_da_venda'))
                <div class="invalid-feedback"> {{ $errors->first('numero_da_venda')}}</div>
            @endif
        </div>
        <div class="mb-3">
            <label  class="form-label">Produto</label>
            <select class="form-select" aria-label="Escolha um produto" name="produto_id">
                @foreach ( $findProduto as $produto )
                    <option value="{{ $produto->id}}">{{ $produto->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label  class="form-label">Cliente</label>
            <select class="form-select" aria-label="Escolha um Cliente" name="cliente_id">
                @foreach ( $findCliente as $cliente )
                    <option value="{{ $cliente->id}}">{{ $cliente->nome}}</option>
                @endforeach
            </select>
        </div>
       
        


        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
