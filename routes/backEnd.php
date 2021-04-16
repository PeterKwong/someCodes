<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\CompanyInfoController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerMomentController;
use App\Http\Controllers\DiamondController;
use App\Http\Controllers\EngagementRingController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceDiamondController;
use App\Http\Controllers\InvoicePostController;
use App\Http\Controllers\JewelleryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WeddingRingPairController;
use App\Http\Middleware\TeamTingDiamond;
//admin 

Route::prefix('/adm/')
        ->middleware('auth:sanctum')->middleware(TeamTingDiamond::class)
        ->group(function(){

        // dd('login');
        //Customer
        Route::get('customers', [CustomerController::class,'admBladeIndex']);
        Route::get('customers/create', [CustomerController::class,'admBladeForm']);
        Route::get('customers/{id}', [CustomerController::class,'admBladeShow']);        
        Route::get('customers/{id}/edit', [CustomerController::class,'admBladeForm']); 

        //Invoice
        Route::get('invoices', [InvoiceController::class,'admBladeIndex']);
        Route::get('invoices/create', [InvoiceController::class,'admBladeForm']);
        Route::get('invoices/pdf/{id}', [InvoiceController::class,'admBladePrint']);        
        Route::get('invoices/{id}', [InvoiceController::class,'admBladeShow']);        
        Route::get('invoices/{id}/edit', [InvoiceController::class,'admBladeForm']); 

        //invoice diamond
        Route::get('invoice-diamonds', [InvoiceDiamondController::class,'admBladeIndex']);
        Route::get('invoice-diamonds/create', [InvoiceDiamondController::class,'admBladeForm']);
        Route::get('invoice-diamonds/{id}', [InvoiceDiamondController::class,'admBladeShow']);        
        Route::get('invoice-diamonds/{id}/edit', [InvoiceDiamondController::class,'admBladeForm']); 
        Route::get('invoice-diamonds/create-from-diamond/{id}', [InvoiceDiamondController::class,'admBladeForm']);

        //Diamond
        Route::get('diamonds', [DiamondController::class,'admBladeIndex']);
        Route::get('diamonds/create', [DiamondController::class,'admBladeForm']);
        Route::get('diamonds/{id}/edit', [DiamondController::class,'admBladeForm']); 
        Route::get('diamonds/batch-create', [DiamondController::class,'admBladeBatchForm']);
        Route::get('diamonds/disc-price', [DiamondController::class,'diamondDiscPrice']);
        Route::get('diamonds/print-label', [DiamondController::class,'printLabel']);
        Route::get('diamonds/toggle-starred-diamond/{id}', [DiamondController::class,'toggleStarredDiamond']);

        //Engagement Ring
        Route::get('engagement-rings', [EngagementRingController::class,'admBladeIndex']);
        Route::get('engagement-rings/create', [EngagementRingController::class,'admBladeForm']);
        Route::get('engagement-rings/{id}', [EngagementRingController::class,'admBladeShow']);        
        Route::get('engagement-rings/{id}/edit', [EngagementRingController::class,'admBladeForm']); 

        //wedding Ring
        Route::get('wedding-rings', [WeddingRingPairController::class,'admBladeIndex']);
        Route::get('wedding-rings/create', [WeddingRingPairController::class,'admBladeForm']);
        Route::get('wedding-rings/{id}', [WeddingRingPairController::class,'admBladeShow']);        
        Route::get('wedding-rings/{id}/edit', [WeddingRingPairController::class,'admBladeForm']); 

        //Jewellery
        Route::get('jewellery', [JewelleryController::class,'admBladeIndex']);
        Route::get('jewellery/create', [JewelleryController::class,'admBladeForm']);
        Route::get('jewellery/{id}', [JewelleryController::class,'admBladeShow']);        
        Route::get('jewellery/{id}/edit', [JewelleryController::class,'admBladeForm']); 

        //Customer Jewellery
        Route::get('customer-jewelleries', [InvoicePostController::class,'admBladeIndex']);
        Route::get('customer-jewelleries/{id}/create', [InvoicePostController::class,'admBladeForm']);
        Route::get('customer-jewelleries/{id}', [InvoicePostController::class,'admBladeShow']);        
        Route::get('customer-jewelleries/{id}/edit', [InvoicePostController::class,'admBladeForm']); 


        //Customer Moment
        Route::get('customer-moments', [CustomerMomentController::class,'admBladeIndex']);
        Route::get('customer-moments/create', [CustomerMomentController::class,'admBladeForm']);
        Route::get('customer-moments/{id}', [CustomerMomentController::class,'admBladeShow']);        
        Route::get('customer-moments/{id}/edit', [CustomerMomentController::class,'admBladeForm']); 


        //Order
        Route::get('orders', [OrderController::class,'admBladeIndex']);
        Route::get('orders/{id}', [OrderController::class,'admBladeShow']);
        Route::get('order-to-invoice/{id}', [OrderController::class,'admBladeOrderToInvoice']);

        //purchase 
        // Route::get('purchase/invoices', [AccountingController::class,'purchaseInvoices']);
        Route::get('purchase/progress-invoices', [AdminController::class,'purchaseProgressInvoices']);
        Route::get('purchase/dued-progress-invoices', [AdminController::class,'duedProgressInvoices']);
        Route::get('purchase/on-stock-diamonds', [AdminController::class,'onStockDiamond']);
        Route::get('purchase/starred-diamonds-export', [AdminController::class,'starredDiamondsExport']);

        //accounting
        Route::get('accounting/invoice-export', [AdminController::class,'invoiceExport']);

        Route::get('company-info', [CompanyInfoController::class, 'index']);
        Route::get('cache', [CacheController::class, 'index']);

        Route::get('test', [TestController::class,'testView']);


        Route::get('theme', function(){
            // dd($_COOKIE['theme']);
            if (!isset($_COOKIE['theme'])) {
                setcookie('theme', request('theme'), time()+3600 *24);
            }else{
                setcookie('theme', '', time() - 3600);                
            }
            return redirect('/adm');
        });

        Route::get('{vue_capture?}', [AdminController::class,'index'])
                ->where('vue_capture', '[\/\w\.-]*')->name('admin.backend');



}); 


// Route::get('/td-login', function () {

//     return view('backEnd.auth.login');

// })->where('vue_capture', '[\/\w\.-]*')->name('admin.login');