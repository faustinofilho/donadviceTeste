<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoFornecedorRequest extends FormRequest
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
            'fornecedor_id' => ['required'],
            'preco' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ];
    }

    public function messages()
    {
        return [
            'fornecedor_id.required' => 'Fornecedor é obrigatório!',
            'preco.required' => 'O preço é obrigatório!',
            'preco.regex' => 'O preço não é valido!'
        ];
    }
}