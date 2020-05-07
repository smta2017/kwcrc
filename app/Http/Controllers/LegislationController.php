<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Legislation;

class LegislationController extends Controller
{
      	public function __construct()
    {
        $this->middleware('auth')->only('crudlegislation');
    }


	public function crudlegislation()
	{
		return view('legislation.crudlegislation');  
	}
 


	public function index()
	{

		$Legislations =Legislation::orderBy('id','desc')->get();

		return view('legislation.index',compact('Legislations'));  
	}


}
