<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;


class UserRequest extends FormRequest
{
    /**
     * @var mixed
     */


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

        if ($this->get('user_id'))
        {
            return
                [
                    'email' => ['required','email','unique:users,email,'.$this->user->id,],
                    'name' => ['required','min:3'],
                    'password' =>
                        [
                            function($attributes, $value, $fail)
                            {
                                $value = $this->get('password');

                                if ($value && strlen($value) < 6)
                                {
                                    $attributes = 'шести';

                                    $fail('Длинна нового пароля должна быть не меньше '. $attributes .' символов');
                                }

                            }
                        ],
                ];
        }
        else
        {
            return
                [
                    'email' => ['required','email','unique:users,email,'],
                    'name' => ['required','min:3'],
                    'password' => ['required','min:6']
                ];
        }
    }

    /**
     * @return array
     */

    public function messages(): array
    {
        return
        [
            'email.required' => 'Поле email обязательно для заполнения',
            'email.email' => 'Поле должно соответствовать формату электронной почты',
            'email.unique' => 'Такой email уже существует',
            'name.required' => 'Поле \'имя\' обязательно для заполнения',
            'name.min' => 'Имя должно содержать не менее 3-х букв',
            'password.required' => 'Поле password обязательно для заполнения',
            'password.min' => 'Пароль должен содержать не менее шести символов',
        ];
    }


}
