@extends('admin.layouts.principal')

@section('conteudo-principal')

    <section class="section">

        <form action="{{route('admin.cidades.adicionar')}}" method="POST">

            @csrf

            <div class="input-field">
                <input type="text" name="nome" id="nome" value="{{old('nome')}}"/>
                <label for="nome">Nome</label>
                @error('nome')
                    <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                @enderror
            </div>

            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{url()->previous()}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>

        </form>
    </section>

@endsection