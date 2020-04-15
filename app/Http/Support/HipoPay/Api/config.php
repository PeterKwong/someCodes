<?php
/**
 * Created by PhpStorm.
 * User: kongfm
 * Date: 2018/10/30
 * Time: 14:17
 */

namespace HipoPayApi;

if ( config('services.paymentMode') == '_test' ) {
	define("HP_HOST", "https://testapi.hipopay.com");
	define("MERCHANT_NO", "WC5c62521945515");
	define("VERSION", "1.0");

	define("PRIVATE_KEY_PATH", config('services.hipo.private' . config('services.paymentMode')) );
	
}else{

	define("HP_HOST", "https://api.wisecashier.com");
	define("MERCHANT_NO", "WC5cb81d29f28ef");
	define("VERSION", "1.0");

	define("PRIVATE_KEY_PATH", config('services.hipo.private' )  );

	define("MERCHANT_MINI_APPID", '去微信公众平台, 登录小程序账号, 进入开发设置获取');
	define("MERCHANT_APPID", '去微信开放平台, 进入应用管理获取');

}

