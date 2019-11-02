<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CauHoi extends Model
{
    use SoftDeletes;

    protected $table = 'cau_hois';

    protected $fillable = [
        'noidung', 
        'linh_vuc_id', 
        'phuongan_A', 
        'phuongan_B',
        'phuongan_C',
        'phuongan_D',
        'dapan'
    ];

    public function LinhVuc(){
        return $this->belongsTo('App\CauHoi', 'linh_vuc_id', 'id')->withTrashed();
    }
}
