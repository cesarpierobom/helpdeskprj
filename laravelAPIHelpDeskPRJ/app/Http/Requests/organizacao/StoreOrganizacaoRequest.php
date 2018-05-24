<?php

namespace App\Http\Requests\organizacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class StoreOrganizacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can("salvar nova organizacao");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nome" => "required|max:255",
            "razao_social" => "nullable|max:255",
            "documento" => "nullable|unique:organizacao,documento",
            "codigo" => "nullable|max:50|unique:organizacao,codigo",
            "status" => ["nullable", Rule::in(['1', '0'])]
        ];
    }
}
