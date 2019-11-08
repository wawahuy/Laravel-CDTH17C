<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormGoiCreditRequest extends FormRequest
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
            'tengoi' => 'required|max:100|unique:goi_credits,tengoi',
            'credit' => 'required|integer|min:1',
            'sotien' => 'required|integer|min:1000',
        ];
    }
}
