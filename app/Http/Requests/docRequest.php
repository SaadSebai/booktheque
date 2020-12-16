<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class docRequest extends FormRequest
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
            
            'fnom' => 'required|min:3|max:40',
            'nivo' => 'required|min:3|max:60',
            'description' => 'required|min:7|max:100',
            'fileplc' => 'required',

        ];
    }
}
