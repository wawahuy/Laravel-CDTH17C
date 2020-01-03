<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CauHinhApp extends Model
{
    use SoftDeletes;
    //
    protected $table = 'cau_hinh_apps';

    protected $fillable = [
        'co_hoi_sai',
        'thoi_gian_tra_loi'
    ];
}
