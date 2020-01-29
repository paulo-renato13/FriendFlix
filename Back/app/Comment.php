<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Episode;

class Comment extends Model
{
    public function user() {
      return $this->belongsTo('App\User');
    }

    public function episode() {
      return $this->belongsTo('App\Episode');
    }
}
