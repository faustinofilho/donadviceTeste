<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FornecedorRequest extends FormRequest
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
            'nome_fantasia' => 'required',
            'razao_social' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
            'cnpj' => 'required|cnpj'
        ];
    }

    public function messages()
    {
        return [
            'nome_fantasia.required' => 'Nome fantasia é obrigatório!',
            'razao_social.required' => 'Razão Social é obrigatório!',
            'endereco.required' => 'Endereço é obrigatório!',
            'telefone.required' => 'Telefone é obrigatório!',
            'cnpj.required' => 'CNPJ é obrigatório!'
        ];
    }
}
