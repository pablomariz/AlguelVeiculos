@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">

        <form action="{{route('admin.veiculos.index')}}" method="GET">
            <div class="row valign-wrapper">
                <div class="input-field col s6">
                    <select name="tipo_id" id="tipo">
                        <option value="">Selecione um modelo</option>

                        @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}" {{$tipo->id == $tipo_modelo ? 'selected' : ''}}>{{$tipo->nome}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="input-field col s6">
                    <select name="cidade_id" id="cidade">
                        <option value="">Selecione uma cidade</option>

                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->id}}" {{$cidade->id == $cidade_id ? 'selected' : ''}}>{{$cidade->nome}}</option>
                        @endforeach

                    </select>
                </div>
            </div>

                <div class="row right-align">
                    <a href="{{route('admin.veiculos.index')}}" class="btn-flat waves-effect">
                        Limpar Consulta
                    </a>
                
                    <button type="submit" class="btn waves-effect waves-light">
                        Filtrar
                    </button>
                </div>


        </form>
    
    </section>

    <hr>

    <section class="section">

        <table class="heighlight">

            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Cidade</th>
                    <th>Placa</th>
                    <th>Ano</th>
                    <th>Valor</th>

                    <th>Opções</th>
                </tr>
            </thead>

            <tbody>
                @forelse($veiculos as $veiculo)
                    <tr>

                        <td>
                            @if ($veiculo->image)
                                <img src="{{url("storage/$veiculo->image")}}" alt="{{$veiculo->placa}}" style="max-width: 100px;"
                            @endif                       
                        </td>

                        <td>{{$veiculo->cidade->nome}}</td>


                        @if ($veiculo->image)
                            <td>{{$veiculo->placa}}</td>
                        @endif

                        <td>{{$veiculo->ano}}</td>

                        <td>{{$veiculo->preco}}</td>



                        <td>
                            <form action="{{route('admin.veiculos.destroy', $veiculo->id)}}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')

                                <button style="border:0; background:transparent;" type="submit">       
                                    <span style="cursor: pointer">
                                        <i class="material-icons red-text text-accent-3">delete_forever</i>
                                    </span>
                                </button>
                            </form>
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Não existem veículos cadastrados</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

        <div>
            {{$veiculos->links('shared.pagination')}}
        </div>


        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.veiculos.create')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    </section>

@endsection