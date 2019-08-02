<?php

namespace App\Http\Controllers\Wapschool;

use App\Wapschool\Palestra;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PalestraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //PALESTRAS DA LISTAGEM
      $palestras = Palestra::query()->orderBy('nome','ASC')->get();

      //VARIÁVEIS DA VIEW
      $variaveisView = [
        'palestras'      => $palestras,
        'mensagem'       => $request->session()->get('mensagemPalestra.texto'),
        'statusMensagem' => $request->session()->get('mensagemPalestra.status'),
      ];

      return view('palestra.index',$variaveisView);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('palestra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //DADOS FORMULÁRIO
      $dadosPalestra = $request->all();

      //INSERE A PALESTRA
      $obPalestra = Palestra::create($dadosPalestra);

      //VARIÁVEIS DA MENSAGEM
      $status   = 'success';
      $mensagem = "Palestra adicionada com <strong>sucesso!</strong>";

      //VERIFICA PROBRLEMAS NA INSERÇÃO
      if(!($obPalestra instanceof Palestra)){
        $status   = 'danger';
        $mensagem = "<strong>Erro</strong> ao adicionar a palestra.";
      }

      //ADICIONA MENSAGEM NA SESSÃO
      $request->session()->flash('mensagemPalestra.status',$status);
      $request->session()->flash('mensagemPalestra.texto',$mensagem);

      return redirect()->route('listarPalestras');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Palestra  $palestra
     * @return \Illuminate\Http\Response
     */
    public function show(Palestra $palestra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Palestra  $palestra
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
      //BUSCA A PALESTRA
      $obPalestra = Palestra::find($request->id);

      //VERIFICA PALESTRA
      if(!($obPalestra instanceof Palestra)) return redirect()->route('listarPalestras');

      //VARIÁVEIS DA VIEW
      $variaveisView = [
        'palestra'       => $obPalestra,
        'mensagem'       => $request->session()->get('mensagemPalestra.texto'),
        'statusMensagem' => $request->session()->get('mensagemPalestra.status')
      ];

      return view('palestra.edit',$variaveisView);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Palestra  $palestra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      //BUSCA A PALESTRA
      $obPalestra = Palestra::find($request->id);

      //VERIFICA PALESTRA
      if(!($obPalestra instanceof Palestra)) return redirect()->route('listarPalestras');

      //ATUALIZA PALESTRA
      $obPalestra->update($request->all());

      //VARIÁVEIS DA MENSAGEM
      $status   = 'success';
      $mensagem = "Palestra atualizada com <strong>sucesso!</strong>";

      //ADICIONA MENSAGEM NA SESSÃO
      $request->session()->flash('mensagemPalestra.status',$status);
      $request->session()->flash('mensagemPalestra.texto',$mensagem);

      return redirect()->route('atualizarPalestra',$obPalestra->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Palestra  $palestra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      //REMOVE A PALESTRA
      Palestra::destroy($request->id);

      //VARIÁVEIS DA MENSAGEM
      $status   = 'success';
      $mensagem = "Palestra removida com <strong>sucesso!</strong>";

      //ADICIONA MENSAGEM NA SESSÃO
      $request->session()->flash('mensagemPalestra.status',$status);
      $request->session()->flash('mensagemPalestra.texto',$mensagem);

      return redirect()->route('listarPalestras');
    }
}
