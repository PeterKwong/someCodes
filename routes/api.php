<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BuyingProcedureController;
use App\Http\Controllers\CookiesController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerMomentController;
use App\Http\Controllers\DiamondController;
use App\Http\Controllers\EngagementRingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDiamondController;
use App\Http\Controllers\InvoicePostController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\JewelleryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SocialMedia;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\WeddingRingPairController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//middleware
use App\Http\Middleware\TeamTingDiamond;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/home', [HomeController::class,'index']);



//Auth Ting Diamond token
Route::middleware(['auth:sanctum','ApiTingDiamond'])->group(function(){

	Route::resource('engagementRings', EngagementRingController::class)
		->only(['create', 'store', 'edit', 'update', 'destroy']);

	Route::resource('weddingRings', WeddingRingPairController::class)
		->only(['create', 'store', 'edit', 'update', 'destroy']);

	Route::resource('jewellery', JewelleryController::class)
		->only(['create', 'store', 'edit', 'update', 'destroy']);

	Route::resource('invoicePosts', InvoicePostController::class)
		->only(['create', 'store', 'edit', 'update', 'destroy']);

	Route::resource('customerMoments', CustomerMomentController::class)
		->only(['create', 'store', 'edit', 'update', 'destroy']);


	Route::resources([
				'customers' => CustomerController::class,
				'invoices' => InvoiceController::class,
				'invoiceDiamonds' => InvoiceDiamondController::class,
				]);

	Route::get('engagementRingsInd', [EngagementRingController::class,'admIndex']);
	Route::get('engagementRingsShow/{id}', [EngagementRingController::class,'admShow']);

	Route::get('weddingRingsInd', [WeddingRingPairController::class,'admIndex']);
	Route::get('weddingRingsShow/{id}', [WeddingRingPairController::class,'admShow']);

	//jewellery
	// Route::resource('jewellery', JewelleryController::class);,
	Route::get('jewelleryInd', [JewelleryController::class,'admIndex']);
	Route::get('jewelleryShow/{id}', [JewelleryController::class,'admShow']);


	Route::get('test', [TestController::class,'test']);

	//Rap price
	Route::post('diamonds/rap-discount-price', [DiamondController::class,'rapDiscountPrice']);

	//customer-moments
	Route::get('customerMomentsInd', [CustomerMomentController::class,'admIndex']);


	//StoreVideo360
	// Route::post('video360/{code}', [ImageController::class,'storeVideo360Image']);
	
	//backend

	//Invoice Diamond
	Route::get('invoice-diamonds/create-from-diamond/{id}', [InvoiceDiamondController::class,'createFormDiamond']);

	//Order
	Route::get('orders', [OrderController::class,'adminAllOrders']);
	Route::get('orders/{id}', [OrderController::class,'adminShow']);
	Route::get('order-to-invoice/{id}', [OrderController::class,'APIOrderToInvoice']);
	Route::get('order-next-status/{id}',  [OrderController::class,'updateStatus']);
    Route::get('order/charge-by-customer-stripe/{id}', [PurchasesController::class,'chargeByCustomerStripe']);

	// customer Jewellery
	Route::get('invoicePostsInd', [InvoicePostController::class,'admIndex']);

	Route::prefix('purchase/')->group(function(){

		Route::get('progress-invoices', [InvoiceController::class,'onProgress']);
		Route::get('progress-invoices-paginate', [InvoiceController::class,'onProgressPaginate']);

		Route::get('dued-progress-invoices', [InvoiceController::class,'duedProgress']);
		Route::get('dued-progress-invoices-paginate', [InvoiceController::class,'duedProgressPaginate']);

		Route::get('progress-settled-diamond-invoices', [InvoiceController::class,'onProgressSettledDiamond']);
		Route::get('progress-settled-diamond-invoices-paginate', [InvoiceController::class,'onProgressSettledDiamondPaginate']);
		
		Route::get('on-stock-diamonds', [InvoiceDiamondController::class,'onStockDiamond']);
		Route::get('on-stock-diamonds-paginate', [InvoiceDiamondController::class,'onStockDiamondPaginate']);
		Route::get('starred-diamonds-export', [DiamondController::class,'starredDiamondsExport']);

	});


	Route::prefix('accounting/')->group(function(){

		Route::get('invoice-export', [InvoiceController::class,'invoiceExport']);
		Route::get('stock-export', [InvoiceDiamondController::class,'stockExport']);


	});
	//admin update
	Route::get('diamonds-toggle-available/{id}', [DiamondController::class,'toogleAvailable']);

	//import diamonds
	Route::post('diamonds/fromAPI', [DiamondController::class,'importAPI']);
	Route::post('diamonds/fromRap', [DiamondController::class,'importRap']);
	Route::post('diamonds/resetDiamonds', [DiamondController::class,'resetAllDiamonds']);
	Route::post('diamonds/oncall-hold/{id}', [DiamondController::class,'oncallHoldDiamond']);
	Route::post('diamonds/oncall-confirm/{id}', [DiamondController::class,'oncallConfirmDiamond']);

});

//Front


Route::get('/notification', [NotificationController::class,'index']);

//page
Route::get('buyingProcedure', [BuyingProcedureController::class,'index']);


Route::get('engagementRings/{id}', [EngagementRingController::class,'show']);

Route::get('weddingRings/{id}', [WeddingRingPairController::class,'show']);

Route::get('jewellery', [JewelleryController::class,'index']);
Route::get('jewellery/{id}', [JewelleryController::class,'show']);

Route::get('invoicePosts/{id}', [InvoicePostController::class,'show']);

Route::get('customerMoments', [CustomerMomentController::class,'index']);
Route::get('customerMoments/{id}', [CustomerMomentController::class,'show']);






// Route::resource('posts', PostController::class);



//diamonds
Route::resource('diamonds', DiamondController::class);
Route::get('diamondsCreate', [DiamondController::class,'info']);
Route::get('diamondsLoadingImage/{id}', [DiamondController::class,'showLoadingImage']);
Route::get('diamondsLoadingCert/{id}', [DiamondController::class,'showLoadingCert']);
Route::post('diamondsCreate', [DiamondController::class,'getDiamondJson']);


Route::get('diamondsInd', [DiamondController::class,'admIndex']);

Route::post('appointment', [AppointmentController::class,'appointment']);


Route::resource('items', ItemController::class);

//front
// Route::resource('posts', PostController::class);

//social media
Route::get('xiaohungshu', [SocialMedia::class,'xiaoHungShu']);

//session
Route::post('cookies', [CookiesController::class,'store']);
Route::get('cookies', [CookiesController::class,'index']);


//payment
Route::post('payment-cn-callback', [PurchasesController::class,'callbackByWechat']);

// Route::middleware('auth:sanctum')->group(function(){
	// dd(request()->user());
	Route::get('account/user', [AccountController::class,'getUserInfo']);
	Route::post('account/user', [AccountController::class,'userUpdate']);
	Route::get('account/pending', [OrderController::class,'pendingIndex']);
	Route::get('account/pending/{id}', [OrderController::class,'pendingShow']);
	Route::get('account/orders', [OrderController::class,'index']);
	Route::get('account/orders/{id}', [OrderController::class,'show']);
	
	Route::get('account/invoices', [InvoiceController::class,'APIindex']);
	Route::get('account/invoices/{id}', [InvoiceController::class,'APIshow']);
	
	Route::get('fetch-customer-coupon-code', [CouponController::class,'getAuthUserCouponCode']);
	Route::get('fetch-customer-info', [ShoppingCartController::class,'fetchCustomerInfo']);

	Route::get('referral/code', [CouponController::class,'getReferralCode']);
	Route::get('referral/refund-rate', [CouponController::class,'getRefundRate']);

	// Referral
	Route::get('referral/records', [InvoiceController::class,'records']);
	Route::get('referral/refund', [InvoiceController::class,'refund']);

	//order
	Route::post('place-order', [OrderController::class,'placeOrder']);
	Route::get('order/payment-status/{id}', [OrderController::class,'fetchOrderStatus']);

	//shopping cart
	Route::get('coupon/valid', [CouponController::class,'checkAndApplyCouponCode']);
	Route::post('update-cart-items', [ShoppingCartController::class,'loganUserUpdateCart']);
	Route::post('fetch-cart-items', [ShoppingCartController::class,'fetchCartItems']);

	Route::post('update-customer-info', [ShoppingCartController::class,'updateCustomerInfo']);
// });

Route::get('invoice-diamonds-update-due-date/{id}', [InvoiceDiamondController::class,'setDiamondDueToday']);
Route::get('invoices-update-due-date/{id}', [InvoiceController::class,'setInvoiceDueToday']);

//Langs
Route::get('langs', [TextController::class,'translateFetch']);


