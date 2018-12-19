<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
		'title',
		'slug',
		'content',
		'img',
		'status',
		'user_id'
	];

    public function user() {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
