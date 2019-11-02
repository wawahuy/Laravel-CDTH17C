<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHinhApp extends Model
{
    //
    protected $table = 'cau_hinh_apps';

    protected $fillable = [
        'co_hoi_sai',
        'thoi_gian_tra_loi'
    ];
}
