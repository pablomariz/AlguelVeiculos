<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Tipo;
use App\Models\Veiculo;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\VeiculoRequest;
use Illuminate\Support\Facades\Storage;

use Image;


class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $veiculos = Veiculo::join('cidades', 'cidades.id', '=', 'veiculos.cidade_id')
        ->join('locais', 'locais.veiculo_id', '=', 'veiculos.id')
        ->join('tipos', 'tipos.id', '=', 'veiculos.tipo_id')
        ->orderBy('cidades.nome', 'asc')
        ->orderBy('locais.bairro', 'asc')
        ->orderBy('placa', 'asc');

        $cidade_id = $request->cidade_id;
        $tipo_modelo = $request->tipo_id;

        if($request->tipo_id){
            $veiculos->where('tipos.id', $request->tipo_id);
        }
        if($request->cidade_id){
            $veiculos->where('cidades.id', $request->cidade_id);
        }
        
        $veiculos = $veiculos->paginate(env('PAGINACAO'))->withQueryString();


        $cidades = Cidade::orderBy('nome')->get();
        $tipos = Tipo::all();
        
        return view('admin.veiculos.index', compact('veiculos', 'cidades', 'tipos', 'cidade_id', 'tipo_modelo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all();
        $tipos = Tipo::all();

        $action = route('admin.veiculos.store');
        return view('admin.veiculos.form', compact('action', 'cidades','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VeiculoRequest $request)
    {


        if($request->hasFile('image') && $request->image->isValid()){
            //$imagePath = $request->image->store('veiculos', 'public');
            $imagePath = $request->image->hashName('veiculos');

            $imagem = Image::make($request->image)->fit(800, 600);

            Storage::disk('public')->put($imagePath, $imagem->encode());



        }

        
        DB::beginTransaction();

        $data = $request->all();
        $data['image'] = $imagePath;
        $veiculo = Veiculo::create($data);

        //$veiculo = Veiculo::create($request->all());
        $veiculo->local()->create($request->all());

        DB::Commit();

        $request->session()->flash('sucesso', "Veículo incluido com sucesso!");
        return redirect()->route('admin.veiculos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $veiculo = Veiculo::with(['cidade', 'tipo', 'local'])->find($id);
        
        $cidades = Cidade::all();
        $tipos = Tipo::all();

        $action = route('admin.veiculos.update', $veiculo->id);
        return view('admin.veiculos.form', compact('veiculo', 'action', 'cidades','tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VeiculoRequest $request, $id)
    {
        $veiculo = Veiculo::find($id);

        DB::beginTransaction();

        $veiculo->update($request->all());
        $veiculo->local->update($request->all());

        DB::Commit();

        $request->session()->flash('sucesso', "Veículo atualizado com sucesso!");
        return redirect()->route('admin.veiculos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $veiculo = Veiculo::find($id);
        $foto = $veiculo->image;

        Storage::disk('public')->delete($foto);
        
        DB::beginTransaction();

        $veiculo->local->delete();

        $veiculo->delete();

        DB::Commit();

        $request->session()->flash('sucesso', "Veículo excluido com sucesso!");
        return redirect()->route('admin.veiculos.index');
    }
}
