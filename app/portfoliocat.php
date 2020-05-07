<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class portfoliocat extends Model
{
   public function Portfolios()
	{
		return $this->hasMany('App\Portfolio');

	}
}
