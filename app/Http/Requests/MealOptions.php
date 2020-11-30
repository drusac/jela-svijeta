<?php

namespace App\Http\Requests;

use App\Models\Category;
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
        $category_ids = Category::pluck('id')->toArray();
        $category_validation_rules = array_merge($category_ids, ['NULL', '!NULL']);

        return [
            'per_page' => ['nullable', 'min:1', 'integer'],
            'page' => ['nullable', 'min:1', 'integer'],
            'category_id' => ['nullable', Rule::in($category_validation_rules)],
            'tags' => ['nullable', 'string'],
            'with' => ['nullable', 'string'],
            'diff_time' => ['nullable', 'integer', 'min:1'],
            'lang' => ['required', Rule::in('en', 'hr')],
        ];
    }
}
