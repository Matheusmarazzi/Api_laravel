<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmeRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'category'  => 'required|min:3',
            'release' => 'required'
        ];
        // return [
        //     "nome" => "required|max:10",
        //     "cpf"  => "required|numeric|max:11|unique:clientes,cpf",
        //     "dataNascimento" => "required"
        // ];
    }
    public function messages(): array{
        return [ 
        'title.required' => 'Este campo é obrigatório',
        'title.min' => 'Digite um valor valido',
        'category.required' => 'Este campo é obrigatório',
        'category.min' => 'Digite um valor valido',
        ];
    }
}
