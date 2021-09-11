<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return "form adic";
    }
}
