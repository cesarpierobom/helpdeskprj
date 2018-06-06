<?php

namespace App\Http\Requests\chamado_urgencia;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateChamadoUrgenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo("api atualizar urgencia", "api");
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
                return $query->where('id', "<>", $this->route('chamadoUrgencia')->id);
            })],
            "status" => ["required", Rule::in(['1', '0'])],
        ];
    }
}
