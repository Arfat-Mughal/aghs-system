<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'ebook_id' => 'required|exists:ebooks,id',
            'reviewer_name' => 'required|string|max:255',
            'review_text' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'approved' => 'boolean',
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
            'ebook_id.required' => 'An ebook is required',
            'ebook_id.exists' => 'The selected ebook is invalid',
            'reviewer_name.required' => 'A reviewer name is required',
            'review_text.required' => 'Review text is required',
            'rating.required' => 'A rating is required',
            'rating.min' => 'Rating must be at least 1 star',
            'rating.max' => 'Rating must be no more than 5 stars',
        ];
    }
}