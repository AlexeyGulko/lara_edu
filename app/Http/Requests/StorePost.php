<?php

namespace App\Http\Requests;

use App\Traits\FormatingRequestedTags;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePost extends FormRequest
{
    use FormatingRequestedTags;

    protected string $binding = 'post';
    protected string $table = 'posts';

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
        $rules = [
            'title'       => 'required|min:5|max:100',
            'description' => 'required|max:255',
            'body'        => 'required',
            'published'   => 'present',
            'tags'        => 'nullable',
            'slug'        => [
                'required',
                'regex:/[A-Za-z\-\_0-9]+/i',
                $this->uniqueSlugRule(),
            ],
        ];

        return $rules;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'published'   => $this->boolean('published'),
            'tags'        => $this->formatTags($this->tags),
        ]);
    }

    protected function uniqueSlugRule()
    {
        return $this->isMethod('put')
            ? Rule::unique($this->table)->ignore($this->{$this->binding}->id)
            : Rule::unique($this->table);
    }
}
