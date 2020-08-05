<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'       => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'body'        => 'required',
            'published'   => 'present',
            'tags'        => 'present',
            'slug'        => [
                'required',
                'regex:/[A-Za-z\-\_0-9]+/i',
                Rule::unique('posts')->ignore($this->slug, 'slug'),
                ],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'published'   => $this->boolean('published'),
        ]);
    }
}
