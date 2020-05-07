<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Complane;
use App\customeclass\mailsendclass;

class ComplaneController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth',['except' => ['index','save']]);
	}


	public function crudcomplane()
	{
		return view('complane.crudcomplane');  
	}


	public function index()
	{
		return view('complane.index');  
	}


	public function save(Request $request)
	{

		$Complanes = new Complane();

		$Complanes->cName=$request->input('name');
		$Complanes->mobile=$request->input('mobile');
		$Complanes->subject=$request->input('subject');
		$Complanes->message=$request->input('message');
		$Complanes->save();


		$mailsendclass = new mailsendclass();
		$mailsendclass->sendemail('شكوى','لجنة حقوق الطفل ','complane');


		return ('تم الارسال بنجاح  <a href="/">عودة</a>');
	}




}
