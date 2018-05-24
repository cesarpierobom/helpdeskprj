<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ListUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->can("listar usuario");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "status" => "nullable",
            "organizacao_id" => "nullable|exists:organizacao,id",
            "name" => "nullable|max:255",
            "last_name" => "nullable|max:255",
            "email" => "nullable|max:255",
            "login" => "nullable|max:255",
            "search.value" => "nullable|max:255"
        ];
    }
}
