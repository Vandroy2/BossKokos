<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'setting_email' => ['required', 'email']
        ];
    }

    public function messages(): array
    {
        return [
            'setting_email.required' => 'Поле email обязательно для заполнения',
            'setting_email.email' => 'Поле email должно соответствовать формату электронной почты',
        ];
    }
}
