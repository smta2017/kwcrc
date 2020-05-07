<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Systemfield extends Model
{
     public function Systemtable()
	{
		return $this->belongsTo('App\Systemtable');
	}
}
