<?php

namespace App\Http\Requests\interacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListInteracaoRequest extends FormRequest
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
            "chamado_id" => "nullable|exists:chamado,id",
            "user_id" => "nullable|exists:user,id"
        ];
    }
}
