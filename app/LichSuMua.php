<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LichSuMua extends Model
{
    protected $table = 'lich_su_muas';

    protected $fillable = [
        'nguoichoi_id',
        'goicredit_id',
        'credit',
        'sotien'
    ];
}
