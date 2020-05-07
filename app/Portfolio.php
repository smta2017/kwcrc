<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function portfoliocat()
	{
		return $this->belongsTo('App\portfoliocat');
	}

}
