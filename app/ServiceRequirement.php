<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequirement extends Model
{
    protected $table = 'servicerequirements';

    protected $fillable = [
    	'name', 'serviceservice_id', 'user_id', 'status'
	];

	public function serviceservice() {
        return $this->belongsTo('App\ServiceService');
    }

	public function user() {
        return $this->belongsTo('App\User');
    }
}
