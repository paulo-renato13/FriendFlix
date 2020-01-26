<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Comment;
use App\Watch_party;
use App\Follow;
use App\Favorite;
use App\Invitation;
use App\Participation;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments() {
      return $this->hasMany('App\Comment');
    }

    public function watch_parties() {
      return $this->hasMany('App\Watch_party');
    }

    public function followers() {
      return $this->belongsToMany('App\Follow');
    }

    public function favorites() {
      return $this->belongsToMany('App\Favorite');
    }

    public function invitations() {
      return $this->belongsToMany('App\Invitation');
    }

    public function participations() {
      return $this->belongsToMany('App\Participation');
    }

}
