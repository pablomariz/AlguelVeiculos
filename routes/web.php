<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CidadeController;
use App\Http\Controllers\Admin\VeiculoController;


Route::redirect('/', '/admin/cidades');


//parte admin
Route::prefix('admin')->name('admin.')->group(function(){
 /* Route::get('cidades', [CidadeController::class, 'cidades'])->name('cidades.listar');
    Route::get('cidades/salvar', [CidadeController::class, 'formAdicionar'])->name('cidades.form');
    Route::post('cidades/salvar', [CidadeController::class, 'adicionar'])->name('cidades.adicionar');
    Route::delete('cidades/{id}', [CidadeController::class, 'deletar'])->name('cidades.deletar');
    Route::get('cidades/{id}', [CidadeController::class, 'formEditar'])->name('cidades.formEditar');
    Route::put('cidades/{id}', [CidadeController::class, 'editar'])->name('cidades.editar');
*/
    Route::resource('cidades', CidadeController::class)->except(['show']);
    Route::resource('veiculos', VeiculoController::class);

});

Route::resource('/', App\Http\Controllers\Site\CidadeController::class)->only('index');
Route::resource('cidades.veiculos', App\Http\Controllers\Site\VeiculoController::class)->only(['index', 'show']);


//parte site
