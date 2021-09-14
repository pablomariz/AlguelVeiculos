<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Veiculo;

class VeiculoController extends Controller
{
    public function index()
    {

        $veiculos = Veiculo::all();


        return view('site.cidades.veiculos.index', compact('veiculos'));
    }
}
