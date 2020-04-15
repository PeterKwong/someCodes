<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Req;
use Illuminate\Http\Request;

class SocialMedia extends Controller
{
    public function xiaoHungShu(){
    	
    	$url = 'http://www.xiaohongshu.com/web_api/sns/v3/search/note?keyword=tingdiamond&page=1&page_size=20';
		return $this->getGuzzle($url);    	

    }

    public function getGuzzle($url){
    	
	      $client = new Client();

	      // dd(print_r($diamondSource[$selectedID]['data']));
	      $request = new Req('get',$url);

	      $data = 0;

	      try {
	        $response = $client->send($request);

	        if ($response->getStatusCode()==200) {
	            $data = json_decode($response->getBody());
	         } 

		        // dd(print_r($data));
		        
		      } catch (Exception $e) {
		        
		      }

	      // dd($data);
    	return response()
				->json([
					'model' => $data
				]);
    }
}
