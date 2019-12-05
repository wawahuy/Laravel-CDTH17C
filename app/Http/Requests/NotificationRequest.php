<?php

namespace App\Http\Requests;

use App\Components\Notification;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

/**
 * Lớp này được thêm vào để gán các thông báo lỗi cho Request
 * Viết lại hàm message() cho request để gán các thông báo
 * 
 */
trait NotificationRequest
{
    use Notification;

    
    // public function messages()
    // {
    //     return [
    //         '*.required' => 'Không được bỏ trống',
    //         '*.max' => '<= 100',
    //         '*.min' => ''
    //     ];
    // }

    protected function failedValidation(Validator $validator) 
    {
        $MAX_ERR = 3;
        $num_err = 0;
        $vali = new ValidationException($validator);
        $errors = $vali->errors();

        foreach ($errors as $type => $arr_err) {
            foreach ($arr_err as $c_err) { 
                if($num_err >= $MAX_ERR)
                    continue;
                self::error($c_err);
                $num_err++;
            }
        }

        throw $vali;
    }
}
