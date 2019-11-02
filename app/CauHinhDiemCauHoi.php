<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHinhDiemCauHoi extends Model
{
    //
    protected $table = 'cau_hinh_diem_cau_hois';

    protected $fillable = [
        'thu_tu',
        'diem'
    ];
}
