<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PurchasesController;

//middleware
use App\Http\Middleware\TeamTingDiamond;

// Route::get('wechatqr', function(){return view('auth.wechatQr');});
Route::get('auth/{provider}', [LoginController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [LoginController::class, 'handleProviderCallback']);
Route::get('wechatqrnext', [LoginController::class, 'wechatQRCode']);
Route::get('alipay', [LoginController::class, 'alipayLogin']);

//Auth Socialite
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);

//Acoount
Route::group(['middleware' => 'auth:sanctum'], function () {
    
    //purchase
    Route::Post('/purchases', [PurchasesController::class, 'store']);
    Route::Post('/purchases/alipay', [PurchasesController::class, 'alipay']);


    Route::get('/account', [AccountController::class,'index'])->name('accountIndex');

    Route::prefix('{locale}/account')->middleware('locale')->middleware(TeamTingDiamond::class)->group( function(){

        Route::get('', [AccountController::class,'indexLang']);
        Route::get('/setting', [AccountController::class,'setting']);
        Route::get('/pending', [AccountController::class,'pending']);
        Route::get('/pending/{id}', [OrderController::class, 'bladePendingShow']);
        Route::get('/invoices', [AccountController::class,'invoices']);
        Route::get('/invoices/{id}', [OrderController::class, 'bladeInvoiceShow']);

        Route::get('/referral/coupon-code', [AccountController::class,'couponCode']);
        Route::get('/referral/refund', [AccountController::class,'refundBlade']);
        Route::get('/referral/records', [AccountController::class,'recordBlade']);        
    });


});