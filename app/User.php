<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'email', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function articles() {
        return $this->hasMany('App\Article');
    }

    public function packs() {
        return $this->hasMany('App\Pack');
    }

    public function packservices() {
        return $this->hasMany('App\PackService');
    }

    public function packrequirements() {
        return $this->hasMany('App\PackRequirement');
    }
}
