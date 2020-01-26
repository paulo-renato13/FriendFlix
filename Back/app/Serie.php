<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Episode;
use App\Favorite;

class Serie extends Model
{
    public function episodes() {
      return $this->hasMany('App\Episodes');
    }

    public function favorites() {
      return $this->belongsToMany('App\Favorite');
    }
}
