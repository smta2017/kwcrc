<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\News;
class NewsController extends Controller
{ 

	public function __construct()
    {
        $this->middleware('auth',['except' => ['index','singlenews']]);
    }


	public function crudnews()
	{
		return view('news.crudnews');  
	}

	public function index()
	{

		$news =News::orderBy('id','desc')->get();

		return view('news.index',compact('news'));  
	}

	
	public function singlenews($id)
	{
		$ne = news::find($id);

		return view('news.singlenews',compact('ne'));
	}

}
