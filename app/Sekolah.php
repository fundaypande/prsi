<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Sekolah extends Model
{
  protected $fillable = [
      'name', 'alamat', 'phone',
  ];

  public function user()
    {
        return $this->hasMany('User');
    }
}
