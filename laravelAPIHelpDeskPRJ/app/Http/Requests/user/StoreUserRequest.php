<?php

namespace App\Http\Requests\usuario;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            "status" => "required|in:1,0",
            "organizacao_id" => "required|exists:organizacao,id",
            "password" => "min:8|confirmed",
            "password_confirmation" => "",
            "name" => "required|max:255",
            "last_name" => "required|max:255",
            "email" => "required|max:255|email|unique:user,email",
            "login" => "required|max:255|unique:user,login",
        ];
    }
}
