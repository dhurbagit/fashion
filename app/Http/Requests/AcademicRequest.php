<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AcademicRequest extends FormRequest
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
            'heading1' => 'required',
            'editor' => 'required',
            'heading2' => 'required',
            'description1' => 'required',
        ];
    }
}
