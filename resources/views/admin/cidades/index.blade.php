@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section>
        <table>
            <thead>
                <tr>
                    <th>Cidades</th>
                    <th>Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse($cidades as $cidade)
                    <tr>
                        <td>{{$cidade->nome}}</td>
                        <td>Excluir - remover</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">Não tem cidades cadastradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light" href="{{route('admin.cidades.form')}}">
                <i class="large material-icons">add</i>
            </a>
        </div>

    </section>

@endsection