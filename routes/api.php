<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/home', 'HomeController@index');

// Route::post('/register', 'AuthController@register');
// Route::post('/login', 'AuthController@login');
// Route::post('/logout', 'AuthController@logout');



//Front

Route::get('/notification', 'NotificationController@index');

//engagement rings
Route::resource('engagementRings', 'EngagementRingController');
Route::get('engagementRingsInd', 'EngagementRingController@admIndex');
Route::get('engagementRingsShow/{id}', 'EngagementRingController@admShow');

Route::resource('weddingRings', 'WeddingRingPairController');

// Route::resource('weddingRingsInd', 'WeddingRingController');
Route::get('weddingRingsInd', 'WeddingRingPairController@admIndex');
Route::get('weddingRingsShow/{id}', 'WeddingRingPairController@admShow');

//page
Route::get('buyingProcedure', 'BuyingProcedureController@index');

// Route::resource('weddingRings', 'WeddingRingController');

// customer Jewellery
Route::resource('invoicePosts', 'InvoicePostController');

//customer-moments
Route::resource('customerMoments', 'CustomerMomentController');
Route::get('customerMomentsInd', 'CustomerMomentController@admIndex');

Route::resource('posts', 'PostController');

//jewellery
Route::resource('jewellery', 'JewelleryController');
Route::get('jewelleryInd', 'JewelleryController@admIndex');
Route::get('jewelleryShow/{id}', 'JewelleryController@admShow');

//diamonds
Route::resource('diamonds', 'DiamondController');
Route::get('diamondsCreate', 'DiamondController@info');
Route::get('diamondsLoadingImage/{id}', 'DiamondController@showLoadingImage');
Route::get('diamondsLoadingCert/{id}', 'DiamondController@showLoadingCert');
Route::post('diamondsCreate', 'DiamondController@getDiamondJson');


//import diamonds
Route::post('diamonds/fromAPI', 'DiamondController@importAPI');
Route::post('diamonds/fromRap', 'DiamondController@importRap');
Route::post('diamonds/resetDiamonds', 'DiamondController@resetAllDiamonds');

Route::get('diamondsInd', 'DiamondController@admIndex');

Route::post('appointment', 'AppointmentController@appointment');


Route::resource('items', 'ItemController');

//front
Route::resource('posts', 'PostController');

//social media
Route::get('xiaohungshu', 'SocialMedia@xiaoHungShu');

//session
// Route::post('session', 'SessionController@store');
// Route::get('session', 'SessionController@index');
// Route::get('session/set', 'SessionController@setSession');

//session
Route::post('cookies', 'CookiesController@store');
Route::get('cookies', 'CookiesController@index');

//shopping cart
Route::get('coupon/valid', 'CouponController@checkAndApplyCouponCode');
Route::post('update-cart-items', 'ShoppingCartController@loganUserUpdateCart');
Route::post('fetch-cart-items', 'ShoppingCartController@fetchCartItems');

Route::post('update-customer-info', 'ShoppingCartController@updateCustomerInfo');

//payment
Route::post('payment-cn-callback', 'PurchasesController@callbackByWechat');

Route::group(['middleware' => 'auth:api'], function(){

	Route::get('account/user', 'AccountController@getUserInfo');
	Route::post('account/user', 'AccountController@userUpdate');
	Route::get('account/pending', 'OrderController@pendingIndex');
	Route::get('account/pending/{id}', 'OrderController@pendingShow');
	Route::get('account/orders', 'OrderController@index');
	Route::get('account/orders/{id}', 'OrderController@show');
	
	Route::get('account/invoices', 'InvoiceController@APIindex');
	Route::get('account/invoices/{id}', 'InvoiceController@APIshow');
	
	Route::get('fetch-customer-coupon-code', 'CouponController@getAuthUserCouponCode');
	Route::get('fetch-customer-info', 'ShoppingCartController@fetchCustomerInfo');

	Route::get('referral/code', 'CouponController@getReferralCode');
	Route::get('referral/refund-rate', 'CouponController@getRefundRate');

	// Referral
	Route::get('referral/records', 'InvoiceController@records');
	Route::get('referral/refund', 'InvoiceController@refund');

	//order
	Route::post('place-order', 'OrderController@placeOrder');
	Route::get('order/payment-status/{id}', 'OrderController@fetchOrderStatus');

});

Route::get('invoice-diamonds-update-due-date/{id}', 'InvoiceDiamondController@setDiamondDueToday');
Route::get('invoices-update-due-date/{id}', 'InvoiceController@setInvoiceDueToday');



//Auth API token
Route::group(['middleware' => 'auth:admin-api'], function(){

	Route::get('test', 'TestController@test');

	//Rap price
	Route::post('diamonds/rap-discount-price', 'DiamondController@rapDiscountPrice');
	
	//backend
	Route::resource('customers', 'CustomerController');
	Route::resource('invoices', 'InvoiceController');

	//Invoice Diamond
	Route::resource('invoiceDiamonds', 'InvoiceDiamondController');
	Route::get('invoice-diamonds/create-from-diamond/{id}', 'InvoiceDiamondController@createFormDiamond');

	//Order
	Route::get('orders', 'OrderController@adminAllOrders');
	Route::get('orders/{id}', 'OrderController@adminShow');
	Route::get('order-to-invoice/{id}', 'OrderController@APIOrderToInvoice');
	Route::get('order-next-status/{id}',  'OrderController@updateStatus' );
    Route::get('order/charge-by-customer-stripe/{id}', 'PurchasesController@chargeByCustomerStripe');

	// customer Jewellery
	Route::get('invoicePostsInd', 'InvoicePostController@admIndex');

	Route::prefix('purchase/')->group(function(){

		Route::get('progress-invoices', 'InvoiceController@onProgress');
		Route::get('progress-invoices-paginate', 'InvoiceController@onProgressPaginate');

		Route::get('dued-progress-invoices', 'InvoiceController@duedProgress');
		Route::get('dued-progress-invoices-paginate', 'InvoiceController@duedProgressPaginate');

		Route::get('progress-settled-diamond-invoices', 'InvoiceController@onProgressSettledDiamond');
		Route::get('progress-settled-diamond-invoices-paginate', 'InvoiceController@onProgressSettledDiamondPaginate');
		
		Route::get('on-stock-diamonds', 'InvoiceDiamondController@onStockDiamond');
		Route::get('on-stock-diamonds-paginate', 'InvoiceDiamondController@onStockDiamondPaginate');
		Route::get('starred-diamonds-export', 'DiamondController@starredDiamondsExport');

	});


	Route::prefix('accounting/')->group(function(){

		Route::get('invoice-export', 'InvoiceController@invoiceExport');
		Route::get('stock-export', 'InvoiceDiamondController@stockExport');


	});
	//admin update
	Route::get('diamonds-toggle-available/{id}', 'DiamondController@toogleAvailable');


});