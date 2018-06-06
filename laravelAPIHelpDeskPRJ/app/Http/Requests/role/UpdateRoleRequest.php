<?php

namespace App\Http\Requests\role;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UpdateRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo("api atualizar perfil", "api");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name"  =>  ["nullable", "max:255", Rule::unique('roles','name')->ignore($this->route("role")->id)],
            "permissions"    =>  "nullable|exists:permissions,id",
        ];
    }
}
