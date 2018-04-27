<?php

namespace App\Http\Requests\chamado;

use Illuminate\Foundation\Http\FormRequest;

class ListChamadoRequest extends FormRequest
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
            "id" => "nullable",
            "status" => "nullable|in:1,0",
            "titulo" => "nullable|max:255",
            "user_id" => "nullable|exists:users,id",
            "servico_id" => "nullable|exists:servico,id",
            "chamado_categoria_id" => "nullable|exists:chamado_categoria,id",
            "chamado_situacao_id" => "nullable|exists:chamado_situacao,id",
            "chamado_prioridade_id" => "nullable|exists:chamado_prioridade,id",
            "chamado_feedback_id" => "nullable|exists:chamado_feedback,id",
            "chamado_urgencia_id" => "nullable|exists:chamado_urgencia,id",
            "organizacao_id" => "nullable|exists:organizacao,id",
            "departamento_id" => "nullable|exists:departamento,id",
            "codigo" => "nullable|max:50",
            "search.value" => "nullable|max:255"
        ];
    }
}
