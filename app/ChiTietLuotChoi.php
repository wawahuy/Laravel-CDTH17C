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

    public function LuotChoi(){
        return $this->belongsTo(LuotChoi::class, 'luotchoi_id', 'id');
    }

    public function CauHoi()
    {
        return $this->belongsTo(CauHoi::class, 'cauhoi_id', 'id');
    }
}
