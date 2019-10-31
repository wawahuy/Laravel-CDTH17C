<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuanTriVien extends Model
{
    //
    protected $table = 'quan_tri_viens';
    protected $fillable = ['tai_khoan', 'mat_khau'];
}
