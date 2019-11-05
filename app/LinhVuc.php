<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LinhVuc extends Model
{
    use SoftDeletes;
    
    protected $table = 'linh_vucs';
    protected $fillable = ['ten_linh_vuc'];
    protected $appends = ['soLuongCauHoi'];

    public function CauHois(){
        return $this->hasMany(CauHoi::class, 'linh_vuc_id', 'id');
    }

    public function getSoLuongCauHoiAttribute(){
        return $this->CauHois()->count();
    }
}
