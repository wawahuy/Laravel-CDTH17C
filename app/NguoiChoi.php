<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Facades\Storage;

class NguoiChoi extends Authenticatable implements JWTSubject
{
    use SoftDeletes;

    protected $table = 'nguoi_chois';

    protected $fillable = [
        'tendangnhap',
        'matkhau',
        'email',
        'avatar',
        'diemcaonhat',
        'remember_token',
        'credit'
    ];

    protected $hidden = ['matkhau', 'remember_token'];

    protected $appends = ['AvatarUrl'];

    public function getPassswordAttribute(){
        return $this->matkhau;
    }

    public function getAvatarUrlAttribute(){
        return Storage::url($this->avatar);
    }

    public function getAuthPassword(){
        return $this->matkhau;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
