<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class FormSuaNguoiChoiRequest extends FormRequest
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
            'matkhau' => 'required|max:100|min:6',
            'email' => 'required|email|max:100'
        ];
    }
}
