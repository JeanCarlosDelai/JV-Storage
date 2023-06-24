<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'int|nullable',
            'nome' => [
                'required',
                'min:3',
                //'unique:estoques',
                Rule::unique('documents')->ignore($this->id),
            ],
            'editordata' => [
                'required',
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nome.required' => 'O campo nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter no mínimo :min caracteres.',
            'nome.unique' => 'O nome do documento já está sendo utilizado.',
            'texto.required' => 'O campo texto é obrigatório.',
            'texto.gte' => 'O campo texto deve ter um valor maior ou igual a :value.',
        ];
    }
}
