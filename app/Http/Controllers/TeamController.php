<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    
   	public function __construct()
    {
        $this->middleware('auth',['except' => ['index']]);
    }


	public function crudteam()
	{
		return view('team.crudteam');  
	}
 

}
