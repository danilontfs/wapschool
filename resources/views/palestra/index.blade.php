@extends('estrutura.pagina')

@section('titulo')
  Palestras
@endsection

@section('labelBotao')
  Adicionar palestra
@endsection

@section('urlBotao')
  {{ route('adicionarPalestra') }}
@endsection

@section('conteudo')
<div class="col-sm-12">

  @if(!empty($mensagem) and !empty($statusMensagem))
    @include('estrutura.mensagem',['mensagem' => $mensagem,'status' => $statusMensagem])
  @endif

  <ul class="list-group">

    @foreach ($palestras as $palestra)
      <li class="list-group-item">

        {{ $palestra->nome }} - <b>{{ $palestra->evento }}</b>

        <form action="{{ route('removerPalestra',$palestra->id) }}" method="post" class="formularioRemoverProduto float-right ml-2" data-status="false">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
        </form>

        <a class="btn btn-primary float-right" href="{{ route('atualizarPalestra',$palestra->id) }}">
          <i class="far fa-edit"></i>
        </a>

      </li>
    @endforeach
  </ul>

</div>
@endsection
