<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecipeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'description' => ['nullable'],
            'ingredients' => ['required'],
            'instructions' => ['required'],
            'avg_min' => ['nullable'],
            'user_id' => ['required']
        ];
    }
}
