<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client; 

class MessageController extends Controller
{

	public function whatsappMessage(){

		$sid    = "ACa597a0454bafd321ac7a22904e4c0365"; 
		$token  = "b9a6a0a60b797d94ff6b1b1a1a75eeb7"; 
		$twilio = new Client($sid, $token); 

		$message = $twilio->messages 
		      ->create("whatsapp:+85262866525", // to 
		               array( 
		                   "from" => "whatsapp:+14155238886",       
		                   "body" => "test--  Details: http://www.tingdiamond.com/" 
		               ) 
		      ); 

		print($message->sid);
	}

	public function twoWayMessage(){
		$sid    = "ACa597a0454bafd321ac7a22904e4c0365"; 
		$token  = "b9a6a0a60b797d94ff6b1b1a1a75eeb7"; 
		$twilio = new Client($sid, $token); 
		 
		$message = $twilio->messages 
		                  ->create("whatsapp:+85262866525", // to 
		                           array( 
		                               "from" => "whatsapp:+14155238886",       
		                               "body" => "test-- Hello! This is an editable text message. You are free to change it and write whatever you like." 
		                           ) 
		                  ); 
		 
		print($message->sid);
	}
}
