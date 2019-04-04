<?php

namespace App\Http\Requests\Mypage;

use App\Http\Requests\ValidationErrorResponseCustomizer;
use Illuminate\Foundation\Http\FormRequest;

class StoreMyJournal extends FormRequest
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
            'activity_at' => 'required|date',
            'title'       => 'required|max:32',
            'appeal'      => 'max:64',
            'improvement' => 'max:64',
            'nextaction'  => 'max:64',
            'free'        => 'max:256',
            // 'image'       => 'max:256'
        ];
    }
}
