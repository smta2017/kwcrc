<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emaillist;
use App\customeclass\mailsendclass;

class EmaillistController extends Controller
{

	public function save(Request $request)
	{

		$email = new Emaillist();


		$email->email=$request->input('email');
		$email->save();



$mailsendclass = new mailsendclass();
		$mailsendclass->sendemail('القاءنة البريدية','لجنة حقوق الطفل ','emaillist');

		return ('تم الاشتراك بنجاح');
	}



	public function crudmaillist()
	{
		return view('mailbord.crudmailbord'); 
	}

}
