<?php

namespace App\Support;

use GuzzleHttp\Client;

trait Telegram{

	public $id = ['720530701'];
	public $lists = [
						'allIds' => ['720530701','280449866','721561704','689612769','1339369048'],
						'purchaseIds' => ['720530701','280449866','721561704'],
					];


	public function send($body, $receivers = 'allIds', $token = 'TELEGRAM_TOKEN' ){

		      $token  = env($token);

	          foreach ($this->lists[$receivers] as $id) {
	            
	              $url = 'https://api.telegram.org/bot'.$token. '/sendMessage?chat_id='.$id.'&text=' . $body;

	              $client = new Client();

					$promise = $client->requestAsync('GET', $url);
					// $promise->then(function ($response) {
					//     echo 'Got a response! ' . $response->getStatusCode();
					// });
					$promise->wait();

	          }
	          
	          // $res = $res->getBody();

	          // $getUpdates = 'https://api.telegram.org/bot'.$token. '/getUpdates';

	          return ;
		
	}

	public function sendArray($body,$title, $receivers = 'allIds', $token = 'TELEGRAM_TOKEN'){

		$newB = ''; 
		$newB .= $title;
		
		foreach ($body as $key => $value) {

			if ($key == 'phone') {
				$value = 'https://api.whatsapp.com/send?phone=852' . $value;
			}

			$newB .= $key .' : ' .$value  . " \n ";
		}
		// dd($newB);
		
		$this->send( urlencode($newB), $receivers, $token);
	}



}