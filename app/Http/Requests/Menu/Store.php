<?php

namespace App\Http\Requests\Menu;

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
            'tag'         => 'required|max:20',
            'title'       => 'required|max:256',
            'url'         => 'url',
            'description' => 'max:256'
        ];
    }
}
