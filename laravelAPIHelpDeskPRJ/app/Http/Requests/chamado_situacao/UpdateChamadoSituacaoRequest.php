<?php

namespace App\Http\Requests\chamado_situacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateChamadoSituacaoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
            "codigo" => ["nullable", "max:50", Rule::unique('chamado_situacao')->where(function ($query) {
                return $query->where('organizacao_id', $this->organizacao_id);
            })],
            "status" => ["required", Rule::in(['1', '0'])],
            "organizacao_id" => "required|exists:organizacao,id"
        ];
    }
}
