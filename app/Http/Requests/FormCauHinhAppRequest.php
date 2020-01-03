<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormCauHinhAppRequest extends FormRequest
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
            'co_hoi_sai' => 'required|max:100',
            'thoi_gian_tra_loi' => 'required|max:100'
        ];
    }
}
