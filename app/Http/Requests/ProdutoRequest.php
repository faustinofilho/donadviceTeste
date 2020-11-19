<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:200', 'unique:categorias']
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome do produto é obrigatório!',
            'nome.unique' => 'Essa produto já esta cadastrada!',
            'nome.max' => 'Esta ultrapassando o valor maximo!',
        ];
    }

    
}
