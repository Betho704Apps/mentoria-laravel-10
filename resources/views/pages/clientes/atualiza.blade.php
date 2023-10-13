@extends('index');


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Atualizar dados do Cliente</h1>
    </div>
    
    <div class="preloader">
        <div class="preloader-spinner"></div>
    </div>
    

    <form method="POST" action="{{ route('atualizar.cliente', $findCliente->id) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label  class="form-label">Nome Cliente</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror"  name="nome" value="{{ $findCliente->nome }}">
            @if ($errors->has('nome'))
                <div class="invalid-feedback"> {{ $errors->first('nome')}}</div>
            @endif
        </div>
        <div class="mb-3">
            <label  class="form-label">E-mail</label>
            <input type="text" class="form-control"  name="email" value="{{$findCliente->email}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">CEP</label>
            <input id="cep" type="text" class="form-control"  name="cep" value="{{ $findCliente->cep}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Endereço</label>
            <input id="endereco" type="text" class="form-control"  name="endereco" value="{{ $findCliente->endereco}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Logradouro</label>
            <input id="logradouro" type="text" class="form-control"  name="logradouro" value="{{ $findCliente->logradouro}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Bairro</label>
            <input id="bairro" type="text" class="form-control"  name="bairro" value="{{ $findCliente->bairro}}">
        </div>
        <button type="submit" class="btn btn-primary">Gravar</button>
    </form>
@endsection
