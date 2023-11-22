<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'heading_one' => 'required',
            'heading_two' => 'required',
            'sub_heading' => 'required',
            'editor' => 'required',
            'description1' => 'required',
            'image1' => request()->method == 'POST' ? 'required' : 'nullable',
            'image2' => request()->method == 'POST' ? 'required' : 'nullable',
            'image3' => request()->method == 'POST' ? 'required' : 'nullable',
        ];
    }
}
