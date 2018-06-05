<?php

namespace App\Http\Requests\suporte_grupo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ListSuporteGrupoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can("listar grupo de suporte");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "status" => "nullable",
            "nome" => "nullable|max:255",
            "codigo" => "nullable|max:50",
            "search.value" => "nullable|max:255"
        ];
    }
}
