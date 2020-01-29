<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Serie;
use App\Comment;
use App\Watch_party;

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

    public function favorites() {
      return $this->belongsToMany('App\Serie','favorites');
    }

    public function follow($user_id) {
      return $this->follow()->attach($user_id);
    }

    public function unfollow($user_id) {
      return $this->unfollow()->detach($user_id);
    }

}