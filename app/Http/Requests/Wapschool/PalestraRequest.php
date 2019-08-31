<?php

namespace App\Http\Requests\Wapschool;

use Illuminate\Foundation\Http\FormRequest;

class PalestraRequest extends FormRequest
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
            'nome' => 'min:100'
        ];
    }
}
