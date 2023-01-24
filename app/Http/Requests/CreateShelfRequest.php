<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateShelfRequest extends FormRequest
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
            'name' => ['required', 'string' ,' min:3', 'max:60'],
            'description' =>['string', 'min:10', 'max:60'],
            'image' => array_merge(['nullable'], ['mimes:jpeg,png,gif,webp']),
            'book_id' => 'nullable'
        ];
    }

     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Поле обязательно для заполнения',      
            'name.min:3' => 'Минимальное количество символов: 3',
            'name.max:60' => 'Максимальное количество символов: 60',   
            'description.max:1000' => 'Максимальное количество символов: 1000',
            'description.string' => 'Максимальное количество символов: 1000'
        ];
    }
}
