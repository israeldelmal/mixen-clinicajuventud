<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackRequirement extends Model
{
    protected $table = 'packrequeriments';

    protected $fillable = [
    	'name', 'packservice_id', 'user_id', 'status'
	];

	public function packservice() {
        return $this->belongsTo('App\PackService');
    }

	public function user() {
        return $this->belongsTo('App\User');
    }
}
