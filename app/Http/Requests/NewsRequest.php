<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

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
            'title' => ['required', 'string', 'max:255'],
            'preview' => ['required', 'string', 'max:500'],
            'text' => ['required', 'string', 'max:2000'],
            'image' => ['image', 'mimes:jpg,gif', 'nullable', 'dimensions:max_width=300,max_height=300'],
        ];
    }
}
