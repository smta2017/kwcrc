<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refselection extends Model
{
     public function Referendum()
	{
		return $this->belongsTo('App\Referendum');
	}
}
