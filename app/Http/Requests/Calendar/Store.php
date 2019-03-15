<?php

namespace App\Http\Requests\Calendar;

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
            'start'       => 'required|date',
            // 'end'         => 'required|date',
            'title'       => 'required|max:30',
            'tag'         => 'required|integer',
            'schedule'    => 'required|max:20',
            'start_time'  => 'required',
            'end_time'    => 'required',
            'url'         => 'url',
            'description' => 'max:256',
        ];
    }
}
