<?php

namespace App\customeclass;

use Mail;
class mailsendclass  
{


	public function sendemail($msubject,$from,$bodyview)
	{

		Mail::send('emails.'. $bodyview ,['user' => "main"],function($massege)  use($msubject,$from,$bodyview)
		{
			$massege->to('fawazbaderrr@gmail.com')->cc('smta0@yahoo.com')->subject($msubject);
			$massege->from('noreplay@kwcrc.com',$from);
		});
	}

}