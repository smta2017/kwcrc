<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Systemtable extends Model
{
     public function systemfields()
	{
		return $this->hasMany('App\Systemfield');

	}
}
