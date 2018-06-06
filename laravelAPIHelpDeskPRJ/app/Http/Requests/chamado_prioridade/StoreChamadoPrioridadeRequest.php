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
        return Auth::user()->hasPermissionTo("api salvar nova prioridade", "api");
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
            "codigo" => ["nullable", "max:50", "unique:chamado_prioridade,codigo"],
            "status" => ["required", Rule::in(['1', '0'])],
            "padrao" => function($attribute, $value, $fail) {
                if ($value == 1) {
                    $count = ChamadoPrioridade::where("padrao","=","1")->count();
                    if ($count > 0) {
                        return $fail($attribute.': Só deve haver um registro marcado como padrão');
                    }
                }
            }
            
        ];
    }
}
