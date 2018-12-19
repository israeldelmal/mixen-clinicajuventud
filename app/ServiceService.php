<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceService extends Model
{
    protected $table = 'serviceservices';

    protected $fillable = [
    	'name', 'service_id', 'user_id', 'status'
	];

	public function service() {
        return $this->belongsTo('App\Service');
    }

	public function user() {
        return $this->belongsTo('App\User');
    }

    public function servicerequirements() {
        return $this->hasMany('App\ServiceRequirement');
    }
}
