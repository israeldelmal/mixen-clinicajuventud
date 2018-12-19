<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
    	'title', 'slug', 'img', 'cover', 'user_id'
	];

	public function user() {
        return $this->belongsTo('App\User');
    }

    public function serviceservices() {
        return $this->hasMany('App\ServiceService');
    }
}
