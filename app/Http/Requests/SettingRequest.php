<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            //
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'phone1' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
            'quote' => 'required',
            'image' => Request()->method == 'POST' ?  'required' : 'nullable',
            'image1' => Request()->method == 'POST' ?  'required' : 'nullable',
            'google_map' => 'required',
        ];
    }
}
