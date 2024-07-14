<?php

namespace Modules\auth\src\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterReqest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => "required",
            "email"=> "required|email|unique:students,email",
            "password"=> "required|min:6",
            "confirm_password"=> "required|same:password",
        ];
    }

    public function messages()
    {
       return [
        'required' => __('auth::validation.required'),
        'min' => __('auth::validation.min'),
        'email' => __('auth::validation.email'),
        'unique' => __('auth::validation.unique'),
        'same' => __('auth::validation.same'),
        'password' =>__('auth::validation.password'),
        "confirm_password"=> __('auth::validation.confirm_password'),
       ];
    }

    public function attributes()
    {
        return __('auth::validation.attributes');
    }

}