<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCauHoiRequest extends FormRequest
{
    use NotificationRequest;

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
            'cauhoi' => 'required|max:100',
            'pan_A' => 'required|max:100',
            'pan_B' => 'required|max:100',
            'pan_C' => 'required|max:100',
            'pan_D' => 'required|max:100',
            'linhvuc' => 'required|integer|min:0',
            'dapan' => 'required|in:A,B,C,D'
        ];
    }


}
