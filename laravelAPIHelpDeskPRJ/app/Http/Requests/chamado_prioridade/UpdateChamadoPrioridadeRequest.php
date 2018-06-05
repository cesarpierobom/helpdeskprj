<?php

namespace App\Http\Requests\chamado_prioridade;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateChamadoPrioridadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can("atualizar prioridade");
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
            "codigo" => ["nullable", "max:50", Rule::unique('chamado_prioridade')->where(function ($query) {
                return $query->where('id', "<>", $this->route('chamadoPrioridade')->id);
            })],
            "status" => ["required", Rule::in(['1', '0'])],
            "padrao" => function($attribute, $value, $fail) {
                if ($value == 1) {
                    $count = ChamadoPrioridade::where("padrao","=","1")->where("id","<>",$this->id)->count();
                    if ($count > 0) {
                        return $fail($attribute.': Só deve haver um registro marcado como padrão');
                    }
                }
            }
        ];
    }
}
