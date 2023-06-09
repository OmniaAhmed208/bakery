<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'image' => ['required', 'image'],
            'price' => ['required'],
            'quantity' => ['required', 'min:1'],
            'quantity_type' => ['required'],
            'time' => ['required'],
            'weight' => ['required'],
            'temprature' => ['required'],
            'description' => ['required'],
        ];
    }
}
