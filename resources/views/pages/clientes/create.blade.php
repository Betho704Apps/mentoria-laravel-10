@extends('index');


@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar novo Cliente</h1>
    </div>

    <div class="preloader">
        <div class="preloader-spinner"></div>
    </div>
    
    <form method="POST" accept="{{route('cadastrar.cliente')}}">
        @csrf
        {{-- <meta name='csrf-token' content=" {{ csrf_token() }}"> --}}
        <div class="mb-3">
            <label  class="form-label">Nome Cliente</label>
            <input type="text" class="form-control @error('nome') is-invalid @enderror"  name="nome" value="{{ @old('nome')}}">
            @if ($errors->has('nome'))
                <div class="invalid-feedback"> {{ $errors->first('nome')}}</div>
            @endif
        </div>
        <div class="mb-3">
            <label  class="form-label">E-mail</label>
            <input type="text" class="form-control"  name="email" value="{{ @old('email')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">CEP</label>
            <input id="cep" type="text" class="form-control"  name="cep" value="{{ @old('cep')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Endereço</label>
            <input id="endereco" type="text" class="form-control"  name="endereco" value="{{ @old('endereco')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Logradouro</label>
            <input id="logradouro" type="text" class="form-control"  name="logradouro" value="{{ @old('logradouro')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">Bairro</label>
            <input id="bairro" type="text" class="form-control"  name="bairro" value="{{ @old('bairro')}}">
        </div>
        


        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
