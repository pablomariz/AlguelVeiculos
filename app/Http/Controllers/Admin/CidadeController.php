<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\CidadeRequest;
use App\Models\Cidade;

class CidadeController extends Controller
{
    public function index(){

        $subtitulo = 'Lista de citys';        
        $cidades = Cidade::orderBy('nome', 'asc')->get();
        return view('admin.cidades.index', compact('subtitulo', 'cidades'));
    }

    public function create()
    {

        $action = route('admin.cidades.store');
        return view('admin.cidades.form', compact('action'));
    }

    public function store(CidadeRequest $request)
    {
        /*$cidade = new Cidade();
        $cidade->nome = $request->nome;
        $cidade->save();*/
        Cidade::create($request->all());
        $request->session()->flash('sucesso', "Cidade $request->nome Incluida com sucesso!");
        return redirect()->route('admin.cidades.index');
    }
/*

*/
    public function edit($id)
    {
        $cidade = Cidade::find($id);
        $action = route('admin.cidades.update', $cidade->id);
        return view('admin.cidades.form', compact('cidade', 'action'));
    }

    public function update(CidadeRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->update($request->all());

        $request->session()->flash('sucesso', "Cidade $request->nome alterado com sucesso!");
        return redirect()->route('admin.cidades.index');
    }

    public function destroy(Request $request, $id)
    {
        Cidade::destroy($id);
        $request->session()->flash('sucesso', "Cidade excluída com sucesso!");
        return redirect()->route('admin.cidades.index');
    }
}
