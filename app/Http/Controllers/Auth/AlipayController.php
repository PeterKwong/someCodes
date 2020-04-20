<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\Alipay\AopClient;
use App\Support\Alipay\AlipayUserInfoShareRequest;
use App\Support\Alipay\AlipaySystemOauthTokenRequest;

class AlipayController extends Controller
{
    public function getAccessTokenAlipay() {
        
        $envData = ['appid' => config('services.ALIPAY_APPID'),
                                'private' => config('services.ALIPAY_PRIVATE'),
                                'public' => config('services.ALIPAY_PUBLIC'),
                                ];

          $request = request()->all();

			// $ch = curl_init();

			// // set URL and other appropriate options
			// curl_setopt($ch, CURLOPT_URL, "http://www.example.com/");
			// curl_setopt($ch, CURLOPT_HEADER, 0);
			// // grab URL and pass it to the browser

			// $ch = curl_exec($ch);
			// dd($ch);

          // dd($envData);
          // dd($request['auth_code']);

          $alipayClient = new AopClient("https://openapi.alipay.com/gateway.do", $envData['appid'], $envData['private'], "json", 'UTF-8', $envData['public'], "RSA2"); 

          // dd($alipayClient);
        $AlipaySystemOauthTokenRequest  = new AlipaySystemOauthTokenRequest();
          // dd($AlipaySystemOauthTokenRequest);        
        $AlipaySystemOauthTokenRequest->setCode($request['auth_code']);
        $AlipaySystemOauthTokenRequest->setGrantType("authorization_code");
          // dd($AlipaySystemOauthTokenRequest);        

        try {

            $result  = $alipayClient->execute($AlipaySystemOauthTokenRequest);
            // dd($result);        
            $responseNode = str_replace(".", "_", $AlipaySystemOauthTokenRequest->getApiMethodName()) . "_response";
            // dd($responseNode);
            // $resultCode = $responseNode->code;
            // if(!empty($resultCode)&&$resultCode == 10000){
            // echo "成功";
            // } else {
            // echo "失败";
            // }
            // dd($responseNode);
        } catch (AlipayApiException $e) {
            //处理异常
            dd($e);
        }

        $alipayClient = new AopClient("https://openapi.alipay.com/gateway.do", $envData['appid'], $envData['private'], "json", 'UTF-8', $envData['public'], "RSA2"); 
        // dd($alipayClient);

        $request = new AlipayUserInfoShareRequest();
        // dd($request);
        $access_token = $result->$responseNode->access_token;
        // dd($access_token);
        try {
            $userinfoShareResponse = $alipayClient->execute($request, $access_token);
            $responseNode = str_replace(".", "_", $request->getApiMethodName()) . "_response";
        } catch (AlipayApiException $e) {
            //处理异常
        }

        $data1 = $userinfoShareResponse->$responseNode;
        // dd($data);

          $user = (object) array(
            'name' => isset($data1->nick_name)?$data1->nick_name:'blanck',
            'email' => null,
            'id' => $data1->user_id,
            'img' => isset($data1->avatar)?$data1->avatar:'',
            );

          // $user = ['name' => $data1->nickname,
          //           'email' => '',
          //           'user_id' => $data1->openid
          //           ];
          return $user;

    }

    
}
