<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OurTeamRequest extends FormRequest
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
            'image' => request()->method == 'POST' ? 'required' : 'nullable',
            'name' => 'required',
            'designation' => 'required',
            'facbook_link' => 'required',
            'instagram_link' => 'required',
            'linked_link' => 'required',

        ];
    }

    public function messages()
    {
        return [
            //
            'image.required' => 'Please Insert image',
            'name' => 'Required',
            'designation' => 'Required',
            'facbook_link' => 'Required',
            'instagram_link' => 'Required',
            'linked_link' => 'Required',

        ];
    }
}
