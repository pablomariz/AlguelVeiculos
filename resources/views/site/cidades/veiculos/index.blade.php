@extends('site.layouts.principal')

@section('conteudo-principal')





<section class="section">

        <table class="heighlight">

            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Modelo</th>
                    <th>Cidade</th>
                    <th>Placa</th>
                    <th>Ano</th>
                    <th>Valor</th>
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

                        <td>{{$veiculo->tipo->nome}}</td>


                        <td>{{$veiculo->cidade->nome}}</td>


                        @if ($veiculo->image)
                            <td>{{$veiculo->placa}}</td>
                        @endif

                        <td>{{$veiculo->ano}}</td>

                        <td>{{$veiculo->preco}}</td>







                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Não existem veículos cadastrados</td>
                    </tr>
                @endforelse
            </tbody>

        </table>
</section>



@endsection