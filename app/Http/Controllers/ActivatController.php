<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Activat;

class ActivatController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('auth',['except' => ['index']]);
	}


	public function crudactivat()
	{
		return view('activat.crudactivat');  
	}

	public function index()
	{

		$activats =Activat::orderBy('id','desc')->get();

		return view('activat.index',compact('activats'));  
	}


	public function singleactivat($id)
	{
		$si = Activat::find($id);

		return view('activat.singleactivat',compact('si'));
	}
}
