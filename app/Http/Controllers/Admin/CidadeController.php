<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\CidadeRequest;
use App\models\Cidade;

class CidadeController extends Controller
{
    public function cidades(){

        $subtitulo = 'Lista de citys';

        //$cidades = ['Belo horizon', 'recife'];
        
        $cidades = Cidade::all();

        return view('admin.cidades.index', compact('subtitulo', 'cidades'));
    }

    public function formAdicionar()
    {
        return view('admin.cidades.form');
    }

    public function adicionar(CidadeRequest $request)
    {
        /*$cidade = new Cidade();
        $cidade->nome = $request->nome;

        $cidade->save();*/



        Cidade::create($request->all());

        $request->session()->flash('sucesso', "Cidade $request->nome Incluida com sucesso!");

        return redirect()->route('admin.cidades.listar');
    }

    public function deletar($id, Request $request)
    {
        Cidade::destroy($id);
        $request->session()->flash('sucesso', "Cidade excluída com sucesso!");
        return redirect()->route('admin.cidades.listar');
    }
}
