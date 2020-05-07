<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\customeclass\mailsendclass;
class ContactController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth',['except' => ['save']]);
	}




	public function crudcontact()
	{
		return view('contact.crudcontact');  
	}



	public function save(Request $request)
	{

		$contact = new contact();

		$contact->cName=$request->input('name');
		$contact->email=$request->input('email');
		$contact->subject=$request->input('subject');
		$contact->message=$request->input('message');

		$contact->save();

		$mailsendclass = new mailsendclass();
		$mailsendclass->sendemail('رسالة تواصل','لجنة حقوق الطفل ','contact');



		return ('تم الارسال بنجاح  <a href="/">عودة</a>');
	}

}
