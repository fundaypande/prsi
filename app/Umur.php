<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umur extends Model
{
  protected $fillable = [
      'name', 'keterangan',
  ];

  public function daftar()
  {
      return $this->hasMany('App\Daftar');
  }
}
