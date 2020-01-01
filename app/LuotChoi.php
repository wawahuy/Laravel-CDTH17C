<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuotChoi extends Model
{
    protected $table = 'luot_chois';

    protected $fillable = [
        'nguoichoi_id',
        'socau',
        'ngaygio',
        'diem'
    ];

    public function NguoiChoi(){
        return $this->belongsTo(NguoiChoi::class, 'nguoichoi_id', 'id')->withTrashed();
    }
}
