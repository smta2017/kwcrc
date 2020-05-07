<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referendum extends Model
{
    public function refselections()
	{
		return $this->hasMany('App\Refselection');

	}
}
