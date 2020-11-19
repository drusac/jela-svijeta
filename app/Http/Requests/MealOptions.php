<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class MealOptions extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'per_page' => ['nullable', 'min:1', 'integer'],
            'page' => ['nullable', 'min:1', 'integer'],
            'category_id' => ['nullable', 'min:1', 'integer', 'exists:categories,id'],
            'tag_ids' => ['array'],
            'tag_ids.*' => ['integer', 'distinct', 'exists:tags,id'],
            'with' => ['array'],
            'with.*' => [Rule::in(['category', 'tags', 'ingredients'])],
            'diff_time' => ['nullable', 'integer', 'min:1'],
            'lang' => ['required', Rule::in('en', 'hr')],
        ];
    }
}
