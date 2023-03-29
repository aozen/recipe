<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'user_id' => ['required', 'exists:App\Models\User,id'],
        ];
    }

    /**
     * If data is failed when registering, it may redirect, 500 error or etc (depending on the app) (by default redirect to main views)
     * With failedValidation method maybe api response the validation error messages or another messages to the client
     */
    protected function failedValidation($validator): void
    {
        // generate the array with error messages
        // for example: $errors['title'][0] = 'The title field is required', $errors['user_id'][0] = 'The selected user id is invalid.'
        $errors = $validator->errors();

        $response = response()->json([
            'message' => 'Data is invalid',
            'details' => $errors->messages(),
        ], 422);

        throw new HttpResponseException($response);
    }
}
