<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHinhTroGiup extends Model
{
    //
    protected $table = 'cau_hinh_tro_giups';

    protected $fillable = [
        'loai_tro_giup',
        'thu_tu',
        'credit'
    ];

}
