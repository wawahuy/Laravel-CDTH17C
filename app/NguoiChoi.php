<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NguoiChoi extends Model
{
    use SoftDeletes;
    
    protected $table = 'nguoi_chois';

    protected $fillable = [
        'tendangnhap',
        'matkhau',
        'email',
        'avatar',
        'diemcaonhat',
        'credit'
    ];
}
