<?php

namespace App\Http\Requests\Club;

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
            'school_name'     => 'required|max:20',
            'school_calling'  => 'required',
            'club_name'       => 'required|max:20',
            'club_calling'    => 'required'
        ];
    }
}
