@extends('admin.layouts.principal')

@section('conteudo-principal')
<h5 style="text-align: center;">Dados do veículo</h5>

    <section class="section">
        <form action="{{route('admin.veiculos.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @isset($veiculo)
                @method('PUT')
            @endisset

            <div class="row">
                <div class="input-field col s5">
                    <input type="text" name="placa" id="placa" value="{{old('placa', $veiculo->placa ?? '')}}"/>
                    <label for="placa">Placa</label>
                    @error('placa')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>

                <div class="file-field input-field col s7">
                    <div class="btn">
                        <span>File</span>
                        <input type="file" name="image" id="image" />
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Foto do veículo">
                    </div>
                    @error('image')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>
            </div>

            


            

            <div class="row">

                <div class="input-field col s4">
                    <select name="tipo_id" id="tipo_id">
                        <option value="" disabled selected>Selecione o modelo do veiculo</option>
                        @foreach($tipos as $tipo)
                            <option value="{{$tipo->id}}"
                                {{old('tipo_id', $veiculo->tipo->id ?? '') == $tipo->id ? 'selected' : ''}}    
                            >{{$tipo->nome}}</option>
                        @endforeach
                    </select>
                    <label for="tipo_id">Modelo do veículo</label>
                    @error('tipo_id')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>

                <div class="input-field col s2">
                    <input type="number" name="preco" id="preco" value="{{old('preco', $veiculo->preco ?? '')}}" />
                    <label for="preco">Preço</label>
                    @error('preco')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <select name="combustivel" id="combustivel">
                        <option value="" disabled selected>Combustível do veículo</option>
                        <option value="alcool"
                            {{old('combustivel', $veiculo->combustivel ?? '') == 'alcool' ? 'selected' : ''}}    
                        >Alcool</option>
                        <option value="gasolina"
                            {{old('combustivel', $veiculo->combustivel ?? '') == 'gasolina' ? 'selected' : ''}}    
                        >Gasolina</option>
                        <option value="hibrido"
                            {{old('combustivel', $veiculo->combustivel ?? '') == 'hibrido' ? 'selected' : ''}}        
                        >Hibrido</option>
                        <option value="flex"
                            {{old('combustivel', $veiculo->combustivel ?? '') == 'flex' ? 'selected' : ''}}        
                        >Flex</option>
                    </select>
                    <label>Combustível do veículo</label>
                    @error('combustivel')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>

                <div class="input-field col s3">
                    <input type="number" name="ano" id="ano" value="{{old('ano', $veiculo->ano ?? '')}}" />
                    <label for="ano">Ano do veículo</label>
                    @error('ano')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <textarea name="descricao" id="descricao" class="materialize-textarea">{{old('descricao', $veiculo->descricao ?? '')}}</textarea>
                    <label for="descricao">Descrição</label>
                    @error('descricao')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>
            </div>


            <!-- LOCAL ONDE VAI PEGAR -->

            <h5 style="text-align: center;">Local onde o cliente vai retirar o veículo</h5>
            <div class="row">
                <div class="input-field col s4">
                    <select name="cidade_id" id="cidade_id">
                        <option value="" disabled selected>Cidade onde se encontra o veículo</option>

                        @foreach($cidades as $cidade)
                            <option value="{{$cidade->id}}"
                                {{old('cidade_id', $veiculo->cidade->id ?? '') == $cidade->id ? 'selected' : ''}}
                            >{{$cidade->nome}}</option>
                        @endforeach

                    </select>
                    <label for="cidade_id">Cidade</label>
                    @error('cidade_id')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>

                <div class="input-field col s4">
                    <input type="text" name="rua" id="rua" value="{{old('rua', $veiculo->local->rua ?? '')}}" />
                    <label for="rua">Rua</label>
                    @error('rua')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>
                <div class="input-field col s1">
                    <input type="number" name="numero" id="numero" value="{{old('numero', $veiculo->local->numero ?? '')}}" />
                    <label for="numero">Número</label>
                    @error('numero')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>
                <div class="input-field col s3">
                    <input type="text" name="bairro" id="bairro" value="{{old('bairro', $veiculo->local->bairro ?? '')}}" />
                    <label for="bairro">Bairro</label>
                    @error('bairro')
                        <span class="red-text text-accent-3"><smal>{{$message}}</smal></span>
                    @enderror
                </div>
            </div>

            
            <div class="right-align">
                <a class="btn-flat waves-effect" href="{{route('admin.veiculos.index')}}">Cancelar</a>
                <button class="btn waves-effect waves-light" type="submit">
                    Salvar
                </button>
            </div>
                

        </form>

        
    </section>


    
@endsection