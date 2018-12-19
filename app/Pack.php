<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $table = 'packs';

    protected $fillable = [
    	'title', 'slug', 'img', 'cover', 'user_id'
	];

	public function user() {
        return $this->belongsTo('App\User');
    }

    public function packservices() {
        return $this->hasMany('App\PackService');
    }
}
