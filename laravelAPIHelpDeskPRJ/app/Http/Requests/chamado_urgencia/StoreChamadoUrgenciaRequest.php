<?php

namespace App\Http\Requests\chamado_urgencia;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChamadoUrgenciaRequest extends FormRequest
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
            "nome" => "required|max:255",
            "codigo" => ["nullable", "max:50", Rule::unique('chamado_urgencia')->where(function ($query) {
                return $query->where('organizacao_id', $this->organizacao_id);
            })],
            "status" => ["required", Rule::in(['1', '0'])],
            "organizacao_id" => "required|exists:organizacao,id"
        ];
    }
}