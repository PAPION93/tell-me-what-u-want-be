<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'restaurant_id' => 'exists:App\Models\Restaurant,id',
            'filename' => 'string|max:40',
            'image' => 'mimes:jpeg,png|max:1014',
            // 'url' => 'string|max:255'
        ];
    }
}
