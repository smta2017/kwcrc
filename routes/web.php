<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\portfoliocat;
use App\Portfolio;
use App\About;
use App\Team;
use App\Featur;
use App\Legislation;
use App\Service;
use App\Seminar;
use App\Activat;
use App\Referendum;
use App\Refselection;




Route::get('/', function () {
	$potcats = portfoliocat::all();
	$portfolios = Portfolio::orderBy('sort', 'desc')->limit(12)->get();
	$Abouts = About::all();
	$Teams = Team::orderBy('sort', 'desc')->get();
	$Featurs = Featur::all();
	$Legislations = Legislation::all();
	$Services=Service::all();
	$Siminars=Seminar::where('comer','1')->get();
	$Activats=Activat::where('comer','1')->get();
	$Referendums=Referendum::where('active','1')->limit(1)->get();


	return view('welcome',compact('potcats','portfolios','Abouts','Teams','Featurs','Legislations','Services','Siminars','Activats','Referendums'));

});





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//-----------------------------news-------------------------------
Route::get('/news', 'NewsController@index');
Route::get('/crudnews', 'NewsController@crudnews');
Route::get('/singlenews/{id}', 'NewsController@singlenews');


//-----------------------------Seminar-------------------------------
Route::get('/siminars', 'SeminarController@index');
Route::get('/crudsiminar', 'SeminarController@crudsiminar');
Route::get('/singlesiminar/{id}', 'SeminarController@singlesiminar');
Route::get('/siminarsubscribe/{id}/{title}/{typ}', 'SeminarController@subscribe');
Route::post('/savesiminarsub', 'SeminarController@savesub');

Route::get('/crudssub', 'SeminarController@crudssub');


//-----------------------------Activat-------------------------------
Route::get('/activats', 'ActivatController@index');
Route::get('/crudactivat', 'ActivatController@crudactivat');
Route::get('/singleactivat/{id}', 'ActivatController@singleactivat');
Route::get('/activsubscribe/{id}/{title}/{typ}', 'SeminarController@subscribe');
// Route::post('/saveactivsub', 'SeminarController@savesub');

//Route::get('/crudssub', 'SeminarController@crudssub');


//-----------------------------portfolio-------------------------------
Route::get('/crudportfoliocat', 'PortfolioController@crudportfoliocat');
Route::get('/crudportfolio', 'PortfolioController@crudportfolio');
Route::get('/portfolios', 'PortfolioController@index');


//-----------------------------About------------------------------------
Route::get('/crudabout', 'AboutController@crudabout');



//-----------------------------Team-------------------------------------
Route::get('/crudteam', 'TeamController@crudteam');


//-----------------------------Legislation------------------------------
Route::get('/Legislations', 'LegislationController@index');
Route::get('/crudlegislation', 'LegislationController@crudlegislation');

//-----------------------------Featur-----------------------------------
Route::get('/crudfeatur', 'FeaturController@crudfeatur');


//-----------------------------Service----------------------------------
Route::get('/crudservice', 'ServiceController@crudservice');



//-----------------------------complane-------------------------------
Route::get('/complane', 'ComplaneController@index');
Route::get('/crudcomplane', 'ComplaneController@crudcomplane');
Route::post('/savecomplane', 'ComplaneController@save');



//-----------------------------contact-------------------------------
Route::post('/savecontact', 'ContactController@save');
Route::get('/crudcontact', 'ContactController@crudcontact');


//-----------------------------Referendum-------------------------------
Route::get('/crudreferendum', 'ReferendumController@crudreferendum');


//-------------------------- vote ----------------------------------
Route::get('/vote/{id}', 'ReferendumController@vote');
Route::post('/savevote', 'ReferendumController@savevote');

//-----------------------------emaillist-------------------------------
Route::get('/crudmailbord', 'EmaillistController@crudmaillist');
Route::post('/emaillist', 'EmaillistController@save');


//-----------------------------more-------------------------------
Route::get('/more1/{id}', 'MoreController@more1');
Route::get('/more2/{id}', 'MoreController@more2');
 
  




Route::get('/test', function () {
	return view('test');
});



//=============================================================================================



//----------------------------------------------------------------------------------
//-----------------------------Main Routs-------------------------------------------
Route::post('/gettbldata', 'MainController@gettbldata')->name('gettbldata'); 	  //
Route::get('/paginatresult/{page}',     'MainController@paginatreturn');		  //
Route::get('/getsearchresult',     'MainController@getsearchresult');   		  //
Route::post('/savetbldata',     'MainController@saveadd');						  //
Route::get('/geteditdata',     'MainController@editdata');						  //
Route::post('/saveeditdata',     'MainController@update');						  //
Route::post('/deleterow',     'MainController@deleterow');						  //
//----------------------------End Main Routs----------------------------------------
//----------------------------------------------------------------------------------



//=============================================================================================








//*********************************************************************************************


	

Route::get('/sendingemail', 'MailController@sendemail');
 
