<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinhVuc extends Model
{
    //
    protected $table = 'linh_vucs';
    protected $fillable = ['ten_linh_vuc'];
}
