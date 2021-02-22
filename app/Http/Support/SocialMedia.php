<?php

namespace App\Http\Support;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Req;

trait SocialMedia{


    public function xiaohongshu(){


      $client = new Client();

      // dd(print_r($diamondSource[$selectedID]['data']));
      $request = new Req('get', 'http://www.xiaohongshu.com/web_api/sns/v3/search/note?keyword=tingdiamond&page=1&page_size=20');

      $data = 0;

      try {
        $response = $client->send($request);

        if ($response->getStatusCode()==200) {
            $data = json_decode($response->getBody());
         } 

        // dd(print_r($data));
        
      } catch (Exception $e) {
        
      }

      return $data;
    }
	
}