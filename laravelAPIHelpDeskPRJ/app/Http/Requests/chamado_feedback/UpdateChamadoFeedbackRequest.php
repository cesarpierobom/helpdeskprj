<?php

namespace App\Http\Requests\chamado_feedback;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateChamadoFeedbackRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can("atualizar feedback");
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
            "codigo" => ["nullable", "max:50", Rule::unique('chamado_feedback')->where(function ($query) {
                return $query->where('id', "<>", $this->route('chamadoFeedback')->id);
            })],
            "status" => ["required", Rule::in(['1', '0'])],
        ];
    }
}
