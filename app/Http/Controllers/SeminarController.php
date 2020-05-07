<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Seminar;
use App\Siminarmember;
use App\customeclass\mailsendclass;

class SeminarController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth')->only('crudsiminar');
    }


	public function crudsiminar()
	{
		return view('siminar.crudsiminar');
	}


	public function index()
	{
		$siminars =Seminar::orderBy('id','desc')->get();
		return view('siminar.index',compact('siminars'));
	}


	public function singlesiminar($id)
	{
		$si = Seminar::find($id);

		return view('siminar.singlesiminar',compact('si'));
	}


	public function subscribe($id , $title , $typ)
	{
		return view('siminar.subscrib',['id' => $id , 'title' => $title ,'typ' => $typ]);
	}

public function savesub(Request $request)
{

	if (Siminarmember::where('mName',$request->input('name'))->
	where('email',$request->input('email'))->
	where('mobile',$request->input('mobile'))->count() == 0)
	{

	$sub = new Siminarmember();
	$sub->mName=$request->input('name');
	$sub->email=$request->input('email');
	$sub->mobile=$request->input('mobile');
	$sub->notes=$request->input('notes');
	if ($request->input('siminar_typ')== 1) {
	$sub->seminar_id=$request->input('siminar_id');
	}else
	{
	$sub->activat_id=$request->input('siminar_id');
 	}
$sub->save();

	return 'تم الاشتراك بنجاح';
}
else {
	return 'انت مشترك بالفعل';
}

$mailsendclass = new mailsendclass();
		$mailsendclass->sendemail('اشتراك  فاعلية','لجنة حقوق الطفل ','contact');


}

public function crudssub()
{
	return view('siminar.crudssub');
}

}
