<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referendum;
use App\Refselection;


class ReferendumController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth',['except' => ['vote','savevote']]);
	}


	public function vote($id)
	{
		$Referendums=Referendum::find($id);
		return view('referendum.vote',compact('Referendums')); 
	}
	

	public function crudreferendum($value='')
	{
		return view('referendum.referendumcrud'); 
	}


	public function savevote(Request $request)
	{
		$Refselections = Refselection::find($request->exampleRadios);
		$Refselections->votes = ($Refselections->votes+1);
		$Refselections->save();


		return Response('تم التصويت بنجاح  <a href="/">عودة</a>');
	}

}
