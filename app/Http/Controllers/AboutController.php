<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
   

   	public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }


	public function crudabout()
	{
		return view('about.crudabout');  
	}
 


}
