<?php

namespace App\Http\Requests\chamado_prioridade;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\ChamadoPrioridade;
use Illuminate\Support\Facades\Auth;

class StoreChamadoPrioridadeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can("salvar nova prioridade");
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
                return $query->where('organizacao_id', $this->organizacao_id);
            })],
            "status" => ["required", Rule::in(['1', '0'])],
            "organizacao_id" => "required|exists:organizacao,id",
            "padrao" => function($attribute, $value, $fail) {
                if ($value == 1) {
                    $count = ChamadoPrioridade::where("padrao","=","1")->where("organizacao_id","=",$this->organizacao_id)->count();
                    if ($count > 0) {
                        return $fail($attribute.': Para cada Organização só deve haver um registro marcado como padrão');
                    }
                }
            }
            
        ];
    }
}
