<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietLuotChoi extends Model
{
    //
    protected $table = 'chi_tiet_luot_chois';

    protected $fillable = [
        'luotchoi_id',
        'cauhoi_id',
        'phuongan',
        'diem'
    ];
}
