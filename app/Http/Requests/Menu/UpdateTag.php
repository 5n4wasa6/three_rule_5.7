<?php

namespace App\Http\Requests\Menu;

use App\Http\Requests\ValidationErrorResponseCustomizer;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTag extends FormRequest
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
            'tag_one'   => 'required|max:32',
            'tag_two'   => 'required|max:32',
            'tag_three' => 'required|max:32',
            'tag_four'  => 'required|max:32',
            'tag_five'  => 'required|max:32'
        ];
    }
}
