<?php

namespace App\Http\Requests\Discussion;

use App\Http\Requests\ValidationErrorResponseCustomizer;
use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    use ValidationErrorResponseCustomizer;
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
            'body'  => 'required|max:256',
            // 'image' => ''
        ];
    }
}
