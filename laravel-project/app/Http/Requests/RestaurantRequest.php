<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'google_point' => ['required', 'max:255'],
            'naver_point' => ['required', 'max:255'],
            'dining_point' => ['required', 'max:255'],
            'lat' => ['required', 'max:255'],
            'lng' => ['required', 'max:255'],
        ];
    }
}
