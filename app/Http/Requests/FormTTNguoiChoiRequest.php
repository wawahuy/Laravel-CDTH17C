<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class FormTTNguoiChoiRequest extends FormRequest
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
            'ten_dang_nhap' => 'required|max:100|unique:nguoi_chois,tendangnhap',
            'matkhau' => 'required|max:100|min:6',
            'email' => 'required|email|max:100|unique:nguoi_chois,email'
        ];
    }
}
