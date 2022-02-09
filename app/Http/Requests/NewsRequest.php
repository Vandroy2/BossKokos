<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class NewsRequest extends FormRequest
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
     * @return array
     */
    public function rules(): array
    {
        return  [
            'title_ua' => ['required','min:3'],
            'title_ru' => ['required','min:3'],
            'title_en' => ['required','min:3'],
            'content_ua' => ['required'],
            'content_ru' => ['required'],
            'content_en' => ['required'],
        ];
    }

    /**
     * @return array
     */

    public function messages(): array
    {
        return
        [
            'title_ua.required' => 'Поле заголовку э обов\'язковим',
            'title_ru.required' => 'Поле заголовка является обязательным',
            'title_en.required' => 'Field \'title\' is required',
            'title_ua.min' => 'Поле заголовку не може мiстити меньше нiж 3 символи',
            'title_ru.min' => 'Поле заголовка должно иметь минимум 3 символа',
            'title_en.min' => 'Field \'title\' mast have at least 3 symbols',
            'content_ua.required' => 'Поле змiсту э обов\'язковим',
            'content_ru.required' => 'Поле содержания является обязательным',
            'content_en.required' => 'Field is required',
        ];

    }
}
