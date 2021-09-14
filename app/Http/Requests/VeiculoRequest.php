<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'placa' => 'bail|required|min:6|max:8',
            'cidade_id' => 'bail|required|integer',
            'tipo_id' => 'bail|required|integer',
            'preco' => 'bail|required|numeric|min:0',
            'combustivel' => 'bail|required|string',
            'ano' => 'bail|required|integer',
            'descricao' => 'bail|nullable|string',
            'rua' => 'bail|required|min:1',
            'numero' => 'bail|required|integer',
            'bairro' => 'bail|required|min:1',
            'image' => 'bail|nullable|image|max:4096',
        ];
    }

    public function attributes()
    {
        return[
            'cidade_id' => 'cidade',
            'tipo_id' => 'tipo do veículo',
            'preco' => 'preço'
        ];
    }
}
