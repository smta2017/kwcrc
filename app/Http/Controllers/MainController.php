<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;


use DB;
use App\Systemtable;
use App\Systemfield;
use App\Systemfieldcontrol;
use Carbon\Carbon;
use Storage;



class MainController extends Controller
{

	public function gettbldata(Request $request)
	{
		$systable  = Systemtable::find($request->table_id);

		$thDatas =  Systemfield::where('Systemtable_id', $request->table_id)->orderBy('sort')->get();

		$includedColum=Systemfield::where('Systemtable_id', $request->table_id)->whereNotNull('include')->get();



		$thDataextas = Systemfieldcontrol::where('Systemtable_id', $request->table_id)->where('btntype','2')->get();

		$thDataextas2 = Systemfieldcontrol::where('Systemtable_id', $request->table_id)->where('btntype','1')->get();

		$tdWidth = Systemfieldcontrol::where('Systemtable_id', $request->table_id)->max('btnwidth');





		$Datas = DB::table($systable->tbName);

		$arrayColumn = array();
		$arrayrelat = array();
		$arrayColumn[]= $systable->tbName.'.id';




		foreach ($thDatas as $key => $options) {
			if ($options->tableDataSource) {
				if (!in_array(explode('@', $options->tableDataSource)[0], $arrayrelat)) {
					$Datas = $Datas->leftJoin(explode('@', $options->tableDataSource)[0].'s', explode('@', $options->tableDataSource)[0].'s.id', '=',  $systable->tbName.'.'. explode('@', $options->tableDataSource)[0].'_id');
				}
				$arrayrelat[]= explode('@', $options->tableDataSource)[0];
				$arrayColumn[]= explode('@', $options->tableDataSource)[0].'s.' . explode('@', $options->tableDataSource)[1];
				$arrayColumn[]= explode('@', $options->tableDataSource)[0].'s.id as ' . explode('@', $options->tableDataSource)[0].'s_id';
			} else{
				$arrayColumn[]= $systable->tbName.'.'.$options->colName;
			}
		}

		$Datas = $Datas->select($arrayColumn) ;


		$insearch=0;
		$insearch2='';

		if ($request->isSearch) {

			$inputs = $request->all();
			foreach ($inputs as $key => $input) {
				if ($input !=='-1' && $input !=='' && !is_array($input) && !is_null($input)  && $key !=='page' && $key !=='table_id'  && $key !=='isSearch'   && $key !=='_token'  && $key !=='relatedtable'  && $key !=='searchvalue') {
					$Datas =$Datas->where($key, trim($input));
				}
				elseif(is_array($input)) {
					$Datas =$Datas->whereIn($key, $input);
				}
			}

			$insearch=1;
			session()->put('inputs_'.$systable->tbName, $inputs);
		}else
		{
			if ($request->insearch) {
				$insearch=1;
				$inputs =	session()->get('inputs_'.$systable->tbName);
				foreach ($inputs as $key => $input) {
					if ($input !=='-1' && $input !=='' && !is_array($input) && !is_null($input)  && $key !=='page' && $key !=='table_id'  && $key !=='isSearch'   && $key !=='_token'  && $key !=='relatedtable'  && $key !=='searchvalue') {
						$Datas =$Datas->where($key, trim($input));
					}
					elseif(is_array($input)) {
						$Datas =$Datas->whereIn($key, $input);
					}
				}
			}
		}

		$relatedtable='';
		$searchvalue=0;

		if ($request->searchvalue!=0 && $request->relatedtable!='') {
			$Datas = $Datas->where(rtrim ($request->relatedtable,'s') .'_id',$request->searchvalue);

			$relatedtable=$request->relatedtable;
			$searchvalue=$request->searchvalue;
		}


		$Datas = $Datas->paginate($systable->NumberRowDisplay);
		$alertnote="";
		if($request->has('addsuccessful')){
			$alertnote='<div class="alert alert-success alert-dismissible" role="alert" style="padding: 5px; margin-right: 150px;">
			<button type="button" style="margin-right: 20px" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>عملية ناجحة!</strong> تم اضافة سجل جديد بنجاح.
			</div>';
		} else if($request->has('rowdeleted')){
			$alertnote='<div class="alert alert-danger alert-dismissible" role="alert" style="padding: 5px; margin-right: 150px;">
			<button type="button" style="margin-right: 20px" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>عملية ناجحة!</strong> تم اضافة سجل جديد بنجاح.
			</div>';
		} else if($request->has('editsuccessful')){
			$alertnote='<div class="alert alert-info alert-dismissible" role="alert" style="padding: 5px; margin-right: 150px;">
			<button type="button" style="margin-right: 20px" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>تم التعديل !</strong> تم تعديل السجل بنجاح
			</div>';
		}
		return	view('main.getDataTable',compact('Datas','thDatas','includedColum','thDataextas','thDataextas2','tdWidth','relatedtable','searchvalue'),['insearch'=>$insearch ,'alertnote'=>$alertnote]);
	}











	public function saveadd(Request $request)
	{
		if ($request->isMethod('post')) {

			$systable  = Systemtable::find($request->table_id);
			$Mxfileid = DB::table($systable->tbName)->max('id')+1;
			$inputs = $request->all();
			$Datas = [];
			$files = [];
			foreach ($inputs as $key => $input) {
				if ($input !=='-1' && $input !=='' && !is_array($input) && !is_null($input)  && $key !=='page' && $key !=='table_id'  && $key !=='isSearch'   && $key !=='_token' && !$request->hasFile($key) && $key !=='relatedtable'  && $key !=='searchvalue') {
					$Datas = array_prepend($Datas,  trim($input) ,$key );
				}elseif ($request->hasFile($key)){
					$files=array_prepend($files,  $request[$key] , $key);
					$Datas = array_prepend($Datas,  $request[$key]->getClientOriginalName() ,$key );
				}
				elseif ($request->searchvalue!=0 && $request->relatedtable!='') {
					$Datas = array_prepend($Datas,  trim($request->searchvalue) ,rtrim ($request->relatedtable,'s') .'_id' );
				}
			}
			$rowid = DB::table($systable->tbName)->insertGetId($Datas);

			foreach ($files as $key => $value) {
				$value->storeAs('public/' . $systable->tbName ."_". $key , $systable->tbName . "_" . $rowid);
			}
			$request->request->add(['addsuccessful' => '1']);
			return $this->gettbldata($request);
		}
		else if ($request->isMethod('put')) {

		}
	}


	public function editdata(Request $request)
	{
		$systable  = Systemtable::find($request->table_id);
		$Datas = DB::table($systable->tbName)->where('id',$request->row_id)->get();
		$thDatas =  Systemfield::where('Systemtable_id', $request->table_id)->get();

		// return dd($Datas);
		return view('main.editblank',compact('Datas','thDatas'));
	}



	public function update(Request $request)
	{
		$systable  = Systemtable::find($request->table_id);

		$inputs = $request->all();
		$Datas = [];
		foreach ($inputs as $key => $input) {
			if ($input !=='-1' && !is_array($input) && !is_null($input)  && $key !=='page' && $key !=='table_id'  && $key !=='isSearch'   && $key !=='_token' && !$request->hasFile($key) && $key !=='relatedtable'  && $key !=='searchvalue'  && $key !=='row_id') {
				$Datas = array_prepend($Datas,  trim($input) ,$key );
			}elseif ($request->searchvalue!=0 && $request->relatedtable!='') {
				$Datas = array_prepend($Datas,  trim($request->searchvalue) ,rtrim ($request->relatedtable,'s') .'_id' );
			}
}
			$updates = DB::table($systable->tbName)->where('id', $request->row_id)->update($Datas);
			$request->request->add(['editsuccessful' => '1']);
			return $this->gettbldata($request);

	}




	public function deleterow(Request $request)
	{
		$systable  = Systemtable::find($request->table_id);
		$caseevent1 = DB::table($systable->tbName)->where('id',$request->rowid)->delete();
		$request->request->add(['rowdeleted' => '1']);
		return $this->gettbldata($request);

	}





}
