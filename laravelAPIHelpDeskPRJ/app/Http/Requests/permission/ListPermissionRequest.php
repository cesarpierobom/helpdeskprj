<?php

namespace App\Http\Requests\permission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ListPermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo("api listar permissao", "api");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"  =>  "nullable|max:255",
            "role_id"   =>  "nullable",
            "guard_name"   =>  "nullable|max:255",
            "search.value" => "nullable|max:255"
        ];
    }
}
