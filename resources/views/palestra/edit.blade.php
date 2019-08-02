@extends('estrutura.pagina')

@section('titulo')
  Atualizar palestra
@endsection

@section('labelBotao')
  Voltar a listagem
@endsection

@section('urlBotao')
  {{ route('listarPalestras') }}
@endsection

@section('conteudo')
  <div class="col-sm-8">

    @if(!empty($mensagem) and !empty($statusMensagem))
      @include('estrutura.mensagem',['mensagem' => $mensagem,'status' => $statusMensagem])
    @endif

    <form method="post">
      @csrf
      @method('PUT')

      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control {{ $errors->has('nome') ? ' is-invalid' : '' }}" value="{{ $errors->has('nome') ? old('nome') : $palestra->nome }}">
        @if ($errors->has('nome'))
          @include('estrutura.mensagem-validacao',['mensagem'=>$errors->first('nome')])
        @endif
      </div>

      <div class="form-group">
        <label for="evento">Evento</label>
        <input type="text" name="evento" id="evento" class="form-control {{ $errors->has('evento') ? ' is-invalid' : '' }}" value="{{ $errors->has('evento') ? old('evento') : $palestra->evento }}">
        @if ($errors->has('evento'))
          @include('estrutura.mensagem-validacao',['mensagem'=>$errors->first('evento')])
        @endif
      </div>

      <button type="submit" class="btn btn-primary mt-3">
        Atualizar
      </button>

    </form>

  </div>
@endsection
