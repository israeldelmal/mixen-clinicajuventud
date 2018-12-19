<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $table = 'headers';

    protected $fillable = [
    	'h1', 'sub', 'img'
	];
}
