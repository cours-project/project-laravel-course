<?php

namespace Modules\Students\src\Http\Requests\Clients;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
        $rules = [
            'old-password' => ['required', function ($attribute, $value, $fail) {
                $status = Hash::check($value, Auth::guard('students')->user()->password);
                if (!$status) {
                    $fail(__('students::validation.password-invalid'));
                }
            }],
            'password' => 'required|min:6',
            'confirm-password' => 'required|same:password',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => __('students::validation.required'),
            'min' => __('students::validation.min'),
            'same' => __('students::validation.invalid-confirm'),
        ];
    }

    public function attributes()
    {
        return [
            'old-password' => __('students::validation.attributes.old-password'),
            'password' => __('students::validation.attributes.password'),
            'confirm-password' => __('students::validation.attributes.confirm-password'),
        ];
    }
}