<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CounterRequest extends FormRequest
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
            'counter1' => 'required',
            'counter2' => 'required',
            'counter3' => 'required',
            'counter4' => 'required',
            'counterTitle1' => 'required',
            'counterTitle2' => 'required',
            'counterTitle3' => 'required',
            'counterTitle4' => 'required',

        ];
    }
}
