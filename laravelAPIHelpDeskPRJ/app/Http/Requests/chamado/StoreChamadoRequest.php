<?php

namespace App\Http\Requests\chamado;

use Illuminate\Foundation\Http\FormRequest;

class StoreChamadoRequest extends FormRequest
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
            "status" => "nullable|in:1,0",
            "titulo" => "required|max:255",
            "servico_id" => "required|exists:servico,id",
            "chamado_categoria_id" => "required|exists:chamado_categoria,id",
            "chamado_situacao_id" => "nullable|exists:chamado_situacao,id",
            "chamado_prioridade_id" => "nullable|exists:chamado_prioridade,id",
            "chamado_feedback_id" => "nullable|exists:chamado_feedback,id",
            "chamado_urgencia_id" => "required|exists:chamado_urgencia,id",
            "organizacao_id" => "required|exists:organizacao,id",
            "departamento_id" => "required|exists:departamento,id",
            "descricao" => "required",
            "encerrado" => "nullable",
            "autor_id" => "nullable",
            "analista_id" => "nullable",
            "responsavel_id" => "nullable",
        ];
    }
}
