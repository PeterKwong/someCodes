<?php

namespace App\Http\Controllers;

use Log;
use App\User;
use Illuminate\Http\Request;
use Overtrue\Socialite\SocialiteManager;

class WeChatController extends Controller
{

    /**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');

        // dd('hi');
        // dd($app->user->list());

        // $url = $app->qrcode->temporary('foo', 6*24*3600);
        // $app = $app->qrcode->url($url['ticket']);
        // dd($app); 
        $app->server->push(function($message){
            return "欢迎关注 overtrue！";
        });
 		$app->server->serve();

        $response = $app->oauth->scopes(['snsapi_userinfo'])
                          ->redirect('https://tingdiamond.com/auth_wechat');

        // return $response;

        return $response->send();
        // $response->send();

        // dd($response->user());

        // dd($response);
        // //oauth/redirect.php
        // // echo json_encode($app->oauth->user()->toArray(), JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

        // dd($app->oauth->user());

        // return '1';

        $app->server->push(function($message){
            return "欢迎关注 overtrue！";
        });

        return $app->server->serve();
    }

    public function wechatLogin(){

 		$user = session('wechat.oauth_user'); // 拿到授权用户资料
        // dd($user['default']['avatar']);


        $authUser = User::where('provider','WeChat')->where('provider_id', $user['default']['id'])->first();
        // dd($authUser);
        if (!$authUser) {
              User::create([
	            'name'     => $user['default']['name'],
	            'email'    => $user['default']['email'],
	            'api_token' => str_random('60'),
	            'provider' => 'WeChat',
	            'provider_id' => $user['default']['id'],
	            'image_uri' => $user['default']['avatar'],
	        ]);
        }
        


        return redirect('/');
        // dd($user);

    	$socialite = new SocialiteManager($config);

		$response = $socialite->driver('wechat')->scopes(['snsapi_login'])->redirect();

		echo $response;//
    }

}
