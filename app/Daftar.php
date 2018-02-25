<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
  protected $fillable = [
      'atlit_id', 'user_id', 'lomba_id', 'umur_id', 'best_time'
  ];

  public function atlit()
  {
      return $this->belongsTo('App\Atlit');
  }

  public function lomba()
  {
      return $this->belongsTo('App\Lomba');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function umur()
  {
      return $this->belongsTo('App\Umur');
  }
}
