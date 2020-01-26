<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Serie;
use App\Comment;
use App\Watch_party;

class Episode extends Model
{
    public function serie() {
      return $this->belongsTo('App\Serie');
    }

    public function comments()) {
      return $this->hasMany('App\Comment');
    }

    public function watch_parties()) {
      return $this->hasMany('App\Watch_party');
    }
}
