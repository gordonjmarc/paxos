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


       try 
       {
            $redis = \Redis::connection();
  
           // echo "Successfully connected to Redis";

            $redis->set($messageEncoded, $message);

            $value = $redis->get('message');
        
        }
        catch (Exception $e) 
        {
            echo "Couldn't connected to Redis";
            echo $e->getMessage();
        }


    	$returnData = array("digest" => $messageEncoded);

    	return response()->json($returnData);


    }

    public function decode(Request $request, $message)
    {
        $sessionValue = null;

        try 
       {
            $redis = \Redis::connection();
  
           // echo "Successfully connected to Redis";

            $value = $redis->get($message);
        
            $sessionValue = $value;


        }
        catch (Exception $e) 
        {
            echo "Couldn't connected to Redis";
            echo $e->getMessage();
        }

    	if(empty($sessionValue))
    	{
			$returnData = array("err_msg" => "Message not found");
			return response()->json($returnData);
    	}

	  	$returnData = array("digest" => $sessionValue);


    	return response()->json($returnData);
    }


}
