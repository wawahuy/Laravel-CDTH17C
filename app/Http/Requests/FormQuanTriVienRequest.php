<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class FormQuanTriVienRequest extends FormRequest
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
            'ho_ten' => 'required|max:100',
            'tai_khoan' => 'required|max:100',
            'mat_khau' => 'required|max:100'
        ];
    }
}
