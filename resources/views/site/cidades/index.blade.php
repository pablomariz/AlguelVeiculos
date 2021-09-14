@extends('site.layouts.principal')

@section('conteudo-principal')


<section class="section">

    <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
        
                
                <div class="card-panel" style="width:280px; height: 100%;">
                    <i class="material-icons medium green-text text-lighten-3">directions_car</i>
                    <h4><a href="{{route('veiculos.index')}}">Veículos Cadastrados</a></h4>
                </div>

                <div class="card-panel" style="width:280px; height: 100%;">
                    <i class="material-icons medium green-text text-lighten-3">directions_car</i>
                    <h4><a href="{{route('admin.veiculos.index')}}">Cadastrar Veículos</a></h4>
                </div>

            </a>

</section>


@endsection 


@section('slider')

<section class="container">

<p>Trabalho final da disciplina de Tópicos Avançados em Programação</p>
<p>Trabalho realizado pelo aluno João Pablo, graças à ajuda do Prof. Luciano Souza</p>
<hr><br><br>

</section>

@endsection 