<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Featur;
use App\About;


class MoreController extends Controller
{
    public function more1($id)
    {
    	$Featurs=Featur::find($id);

    	return view('more.more1',compact('Featurs'));
    }



    public function more2($id)
    {
    	$Abouts = About::all();
        if ($id==1) {
            return view('more.more2',compact('Abouts'));
        }elseif ($id==2) {
            return view('more.more3',compact('Abouts'));
        }
        elseif ($id==3) {
            return view('more.more4',compact('Abouts'));
        }
        

    }

 



}
