<?php

namespace App\Http\Requests;


use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateShelfRequest extends FormRequest
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
     * Validate data
     *
     * @return void
     */
    public function prepareForValidation(): void
    {
        $this->merge([
            'slug' => Str::slug($this->input('name'))
        ]);

        $this->merge([
            'user_id' => Auth::id()
        ]);
      
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
            'image' => 'nullable|mimes:jpeg,png,gif,webp',
            'book_id' => 'nullable',
            'slug' => 'required|unique:shelves,slug'
        ];
    }
}
