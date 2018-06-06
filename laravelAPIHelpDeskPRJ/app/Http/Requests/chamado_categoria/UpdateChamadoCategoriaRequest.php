<?php

namespace App\Http\Requests\chamado_categoria;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateChamadoCategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo("api atualizar categoria", "api");
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
            "codigo" => ["nullable", "max:50", Rule::unique('chamado_categoria')->where(function ($query) {
                return $query->where('id', "<>", $this->route('chamadoCategoria')->id);
            })],
            "status" => ["required", Rule::in(['1', '0'])],
        ];
    }
}
