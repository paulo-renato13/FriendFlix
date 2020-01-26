<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App/User;
use App/Episode;
use App/Invitation;
use App/Participation;

class Watch_party extends Model
{
    public function usuario() {
      return $this->belongsTo('App\User');
    }

    public function episode() {
      return $this->belongsTo('App\Episode');
    }

    public function invitations() {
      return $this->belongsToMany('App\Invitation');
    }

    public function participations() {
      return $this->belongsToMany('App\Participation')
    }
}
