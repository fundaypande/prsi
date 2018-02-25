<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Sekolah;
use App\Atlit;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'school', 'username', 'token', 'status', 'gambar', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sekolah()
    {
        return $this->belongsTo('App\Sekolah', 'school');
    }

    public function atlit()
    {
        return $this->hasMany('App\Atlit');
    }
}
