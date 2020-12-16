<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class livreRequest extends FormRequest
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
            'livr_nom' => 'required|min:3|max:30',
            'livr_nivo' => 'required|min:3|max:30',
            'ville_prnd' => 'required|min:3|max:30',
            'photo' => 'required',
        ];
    }
}
