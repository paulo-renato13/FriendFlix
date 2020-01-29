<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Episode;

class Watch_party extends Model
{
    public function usuario() {
      return $this->belongsTo('App\User');
    }

    public function episode() {
      return $this->belongsTo('App\Episode');
    }

}
