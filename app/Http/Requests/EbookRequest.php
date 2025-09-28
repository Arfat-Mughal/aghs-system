<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EbookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Adjust based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'author_id' => 'required|exists:authors,id',
            'release_date' => 'required|date',
            'length' => 'nullable|integer|min:1',
            'scripture_references' => 'nullable|string|max:255',
            'reflection_questions' => 'nullable|string',
            'scripture_database_link' => 'nullable|url',
            'cover_image' => 'nullable|image|max:2048', // 2MB max
            'genres' => 'required|array|min:1',
            'genres.*' => 'exists:genres,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
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
            'title.required' => 'A title is required',
            'author_id.required' => 'An author is required',
            'author_id.exists' => 'The selected author is invalid',
            'release_date.required' => 'A release date is required',
            'genres.required' => 'At least one genre is required',
            'genres.*.exists' => 'The selected genre is invalid',
            'cover_image.image' => 'The cover image must be an image file',
            'cover_image.max' => 'The cover image must not exceed 2MB',
        ];
    }
}