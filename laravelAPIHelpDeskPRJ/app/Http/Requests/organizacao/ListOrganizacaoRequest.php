<?php

namespace App\Http\Requests\organizacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListOrganizacaoRequest extends FormRequest
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
            "status[]" => ["nullable", Rule::in(['1', '0'])],
            "nome" => "nullable|max:255",
            "codigo" => "nullable|max:50",
            "search.value" => "nullable|max:255"
        ];
    }
}
