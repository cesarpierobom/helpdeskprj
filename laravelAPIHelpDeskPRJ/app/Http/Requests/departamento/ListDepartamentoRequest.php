<?php

namespace App\Http\Requests\departamento;

use Illuminate\Foundation\Http\FormRequest;

class ListDepartamentoRequest extends FormRequest
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
            "status[]" => "nullable",
            "organizacao_id[]" => "nullable|exists:organizacao,id",
            "nome" => "nullable|max:255",
            "codigo" => "nullable|max:50",
            "search.value" => "nullable|max:255"
        ];
    }
}
