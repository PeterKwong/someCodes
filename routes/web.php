<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//sitemap
Route::get('/sitemap_index_2018.xml', function(){
    
$d = include 'sitemapRoutes.php';

return $d;
    
});

Route::get('/sitemap_index.xml', function(){
    
    $d = include 'sitemapRoutes.php';

    return $d;
    
});


Route::get('/big-sitemap/diamonds', function() {
    // dd('hi');
	$d = include 'bigSitemap.php';

	return $d;
});

Route::get('whatsapp-testing', 'MessageController@whatsappMessage');
Route::get('whatsapp-two-way-testing', 'MessageController@twoWayMessage');


//payments
Route::post('payment-callback/alipay', 'PurchasesController@callbackAlipay');
Route::post('payment-callback/wechat', 'PurchasesController@callbackWechat');
Route::post('payment-callback/stripe', 'PurchasesController@callbackStripe');


// Password Reset Routes...
Route::get('registeremail', 'Auth\RegisterEmail@showLinkRequestForm')->name('register.request');
Route::post('registeremail/email', 'Auth\RegisterEmail@sendResetLinkEmail')->name('register.email');
Route::get('registeremail/{token}', 'Auth\RegisterEmail@showResetForm')->name('register.reset');
Route::post('registeremail', 'Auth\RegistEremail@reset');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/webfinalizeorder', 'OrderController@finalize');


//Auth Socialite
Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

include 'userAccount.php' ;

//Coupon Code
Route::get('/coupon', 'CouponController@applyCouponCodeAndLogin');

Route::get('/order-sample', function(){
    return view('email.referral.order');
});

include 'backEnd.php';

Route::Post('api/td-login', 'AdminController@login');


include 'frontEnd.php' ;






//test Auth


//mock user
// Route::group(['middleware' => 'mock.user'], function () {//这个中间件可以先忽略，我们稍后再说
//     Route::middleware('wechat.oauth:snsapi_base')->group(function () {
//     });

//     Route::middleware('wechat.oauth:snsapi_userinfo')->group(function () {
//         Route::get('/register', 'SelfAuthController@autoRegister')->name('register');
//     });
// });




//wechat
Route::any('/wechat1', function(){return view('auth.login');});
Route::any('/wechat', 'WeChatController@serve');

Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('auth_wechat', 'WeChatController@wechatLogin');
    Route::get('/user', function () {
        
        $user = session('wechat.oauth_user'); // 拿到授权用户资料

        dd($user);
    });
});



Route::group(['middleware' => ['wechat.oauth:snsapi_userinfo']], function () {
      Route::get('/user1', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料

        dd($user);
    });
});

// 或者指定账户的同时指定 scopes:
Route::group(['middleware' => ['wechat.oauth:default,snsapi_userinfo']], function () {
      Route::get('/user2', function () {
        $user = session('wechat.oauth_user'); // 拿到授权用户资料

        dd($user);
    });

  });



//all others
Route::get('/{locale}/{vue_capture?}', function ($locale) {
	App::setLocale($locale);
    return view('layouts.section.frontend');
})->where('vue_capture', '[\/\w\.-]*');


//email verify
Route::get('/verify/{emailToken}', 'VerifyController@verify')->name('verify');



Route::get('test', 'TestController@test');

Route::get('/{vue_capture?}', function () {
	App::setLocale('hk');
    return view('layouts.section.frontend');
})->where('vue_capture', '[\/\w\.-]*');





