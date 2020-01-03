<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCauHinhTroGiupRequest extends FormRequest
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
            'loai_tro_giup' => 'required|max:100',
            'thu_tu' => 'required|max:100',
            'credit' => 'required|max:100'
        ];
    }
}
