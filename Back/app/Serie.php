<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Episode;

class Serie extends Model
{
    public function episodes() {
      return $this->hasMany('App\Episodes');
    }

    public function favorites() {
      return $this->belongsToMany('App\User','favorites');
    }
}
