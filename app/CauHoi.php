<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CauHoi extends Model
{
    //
    protected $table = 'cau_hois';
    protected $fillable = ['noidung', 'linh_vuc_id', 'phuongan_A', 'phuongan_B','phuongan_C','phuongan_D','dapan'];
}
