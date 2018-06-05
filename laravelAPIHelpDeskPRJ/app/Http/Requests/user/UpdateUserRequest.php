<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can("atualizar usuario");
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
            "organizacao_origem" => "nullable|exists:organizacao,id",
            "organizacao_visivel" => "nullable|exists:organizacao,id",
            "password" => "nullable|min:6|confirmed",
            "password_confirmation" => "",
            "name" => "nullable|max:255",
            "sexo" => "nullable",
            "perfil" =>"nullable",
            "last_name" => "nullable|max:255",
            "email" =>  ["nullable", "max:255", "email", Rule::unique('users','email')->ignore($this->route("user")->id)],
            "login" => ["nullable", "max:255", Rule::unique('users','login')->ignore($this->route("user")->id)],
            "role" => "required"
        ];
    }
}
