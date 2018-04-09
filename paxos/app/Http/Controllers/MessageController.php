<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class MessageController extends Controller
{
    /**
     * Show the profile for the given user.
     */
    public function decode($id)
    {

    	$myHash = hash('sha256', $id);

    	$data = array("digest" => $myHash);

    	return response()->json($data);
    }

    /**
     * Show the profile for the given user.
     */
    public function encode()
    {
    	$data = array("digest" => "nothing");

    	return response()->json($data);
    }
}