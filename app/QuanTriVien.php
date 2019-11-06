<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticate;

class QuanTriVien extends Authenticate
{
    use SoftDeletes;

    protected $table = 'quan_tri_viens';
    protected $fillable = ['tai_khoan', 'mat_khau', 'ho_ten'];

    public function getPassswordAttribute(){
        return $this->mat_khau;
    }

    public function getAuthPassword(){
        return $this->mat_khau;
    }

}
