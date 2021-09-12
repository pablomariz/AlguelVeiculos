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
        $action = route('admin.cidades.adicionar');
        return view('admin.cidades.form', compact('action'));
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

    public function formEditar($id)
    {
        $cidade = Cidade::find($id);
        $action = route('admin.cidades.editar', $cidade->id);
        return view('admin.cidades.form', compact('cidade', 'action'));
    }

    public function editar(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->update($request->all());

        $request->session()->flash('sucesso', "Cidade $request->nome alterado com sucesso!");
        return redirect()->route('admin.cidades.listar');
    }
}
