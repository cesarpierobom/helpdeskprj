<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can("salvar novo usuario");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "status" => "required|in:1,0",
            "organizacao_origem" => "required|exists:organizacao,id",
            "organizacao_visivel" => "required|exists:organizacao,id",
            "password" => "required|min:6|confirmed",
            "password_confirmation" => "",
            "name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|max:255|email|unique:users,email",
            "login" => "required|max:255|unique:users,login",
            "role" => "required"
        ];
    }
}
