<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\portfoliocat;
use App\Portfolio;

class PortfolioController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth',['except' => ['index']]);
	}



	public function index()
	{
		$potcats = portfoliocat::all();
		$portfolios = Portfolio::orderBy('sort', 'desc')->get();

		return view('portfolio.index',compact('potcats','portfolios'));  
	}



	public function crudportfoliocat()
	{
		return view('portfolio.portfoliocatscrud');  
	}

	public function crudportfolio()
	{
		return view('portfolio.portfolioscrud');  
	}
}
