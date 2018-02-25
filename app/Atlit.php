<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Sekolah;
use App\Daftar;

class Atlit extends Model
{
  protected $fillable = [
      'name', 'ttl', 'jk', 'sekolah_id', 'user_id'
  ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function sekolah()
  {
      return $this->belongsTo('App\Sekolah');
  }

  public function daftar()
  {
      return $this->hasMany('App\Daftar');
  }
}
