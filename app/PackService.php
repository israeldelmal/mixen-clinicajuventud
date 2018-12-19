<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackService extends Model
{
    protected $table = 'packservices';

    protected $fillable = [
    	'name', 'pack_id', 'user_id', 'status'
	];

	public function pack() {
        return $this->belongsTo('App\Pack');
    }

	public function user() {
        return $this->belongsTo('App\User');
    }

    public function packrequirements() {
        return $this->hasMany('App\PackRequirement');
    }
}
