<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
  protected $fillable = [
      'name'
  ];

  public function daftar()
  {
      return $this->hasMany('App\Daftar');
  }
}
