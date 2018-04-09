<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function encode(Request $request)
    {
		$data = $request->json()->all();

		if(empty($data['message']))
		{
			$returnData = array("err_msg" => "Message not found");
			return response()->json($returnData);
		}

		$message = $data['message'];
		$messageEncoded = hash('sha256', $message);
		
		session([$messageEncoded => $message]);

		$sessionValue = session($messageEncoded);

		var_dump($sessionValue);



    	$returnData = array("digest" => $messageEncoded);

    	return response()->json($returnData);


    }

    public function decode(Request $request, $message)
    {
  
    	$sessionValue = session($message);
    	
    	//var_dump($message);
    	//var_dump($sessionValue);
   		//var_dump($session($message));

    	if(empty($sessionValue))
    	{
			$returnData = array("err_msg" => "Message not found");
			return response()->json($returnData);
    	}

	  	$returnData = array("digest" => "nothing");


    	return response()->json($returnData);
    }


}