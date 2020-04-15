<?php

// Route::get('wechatqr', function(){return view('auth.wechatQr');});
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');
Route::get('wechatqrnext', 'Auth\LoginController@wechatQRCode');
Route::get('alipay', 'Auth\LoginController@alipayLogin');


//Acoount
Route::group(['middleware' => 'auth'], function () {
    
    //purchase
    Route::Post('/purchases', 'PurchasesController@store');
    Route::Post('/purchases/alipay', 'PurchasesController@alipay');


    Route::get('/account', 'AccountController@index')->name('accountIndex');

    Route::prefix('{locale}/account')->middleware('locale')->group( function(){

        Route::get('', 'AccountController@indexLang');
        Route::get('/setting', 'AccountController@setting');
        Route::get('/pending', 'AccountController@pending');
        Route::get('/pending/{id}', 'OrderController@bladePendingShow');
        Route::get('/invoices', 'AccountController@invoices');
        Route::get('/invoices/{id}', 'OrderController@bladeInvoiceShow');

        Route::get('/referral/coupon-code', 'AccountController@couponCode');
        Route::get('/referral/refund', 'AccountController@refundBlade');
        Route::get('/referral/records', 'AccountController@recordBlade');        
    });


});