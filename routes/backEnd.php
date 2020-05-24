<?php

//admin 
Route::group(['middleware'=> 'auth:admin'], function(){


    Route::prefix('/adm/')->group(function(){

        //Customer
        Route::get('customers', 'CustomerController@admBladeIndex');
        Route::get('customers/create', 'CustomerController@admBladeForm');
        Route::get('customers/{id}', 'CustomerController@admBladeShow');        
        Route::get('customers/{id}/edit', 'CustomerController@admBladeForm'); 

        //Invoice
        Route::get('invoices', 'InvoiceController@admBladeIndex');
        Route::get('invoices/create', 'InvoiceController@admBladeForm');
        Route::get('invoices/pdf/{id}', 'InvoiceController@admBladePrint');        
        Route::get('invoices/{id}', 'InvoiceController@admBladeShow');        
        Route::get('invoices/{id}/edit', 'InvoiceController@admBladeForm'); 

        //invoice diamond
        Route::get('invoice-diamonds', 'InvoiceDiamondController@admBladeIndex');
        Route::get('invoice-diamonds/create', 'InvoiceDiamondController@admBladeForm');
        Route::get('invoice-diamonds/{id}', 'InvoiceDiamondController@admBladeShow');        
        Route::get('invoice-diamonds/{id}/edit', 'InvoiceDiamondController@admBladeForm'); 
        Route::get('invoice-diamonds/create-from-diamond/{id}', 'InvoiceDiamondController@admBladeForm');

        //Diamond
        Route::get('diamonds', 'DiamondController@admBladeIndex');
        Route::get('diamonds/create', 'DiamondController@admBladeForm');
        Route::get('diamonds/disc-price', 'DiamondController@diamondDiscPrice');

        //Engagement Ring
        Route::get('engagement-rings', 'EngagementRingController@admBladeIndex');
        Route::get('engagement-rings/create', 'EngagementRingController@admBladeForm');
        Route::get('engagement-rings/{id}', 'EngagementRingController@admBladeShow');        
        Route::get('engagement-rings/{id}/edit', 'EngagementRingController@admBladeForm'); 

        //wedding Ring
        Route::get('wedding-rings', 'WeddingRingPairController@admBladeIndex');
        Route::get('wedding-rings/create', 'WeddingRingPairController@admBladeForm');
        Route::get('wedding-rings/{id}', 'WeddingRingPairController@admBladeShow');        
        Route::get('wedding-rings/{id}/edit', 'WeddingRingPairController@admBladeForm'); 

        //Jewellery
        Route::get('jewellery', 'JewelleryController@admBladeIndex');
        Route::get('jewellery/create', 'JewelleryController@admBladeForm');
        Route::get('jewellery/{id}', 'JewelleryController@admBladeShow');        
        Route::get('jewellery/{id}/edit', 'JewelleryController@admBladeForm'); 

        //Customer Jewellery
        Route::get('customer-jewelleries', 'InvoicePostController@admBladeIndex');
        Route::get('customer-jewelleries/{id}/create', 'InvoicePostController@admBladeForm');
        Route::get('customer-jewelleries/{id}', 'InvoicePostController@admBladeShow');        
        Route::get('customer-jewelleries/{id}/edit', 'InvoicePostController@admBladeForm'); 


        //Customer Moment
        Route::get('customer-moments', 'CustomerMomentController@admBladeIndex');
        Route::get('customer-moments/create', 'CustomerMomentController@admBladeForm');
        Route::get('customer-moments/{id}', 'CustomerMomentController@admBladeShow');        
        Route::get('customer-moments/{id}/edit', 'CustomerMomentController@admBladeForm'); 


        //Order
        Route::get('orders', 'OrderController@admBladeIndex');
        Route::get('orders/{id}', 'OrderController@admBladeShow');
        Route::get('order-to-invoice/{id}', 'OrderController@admBladeOrderToInvoice');

        //purchase 
        Route::get('purchase/invoices', 'AccountingController@purchaseInvoices');
        Route::get('purchase/progress-invoices', 'AdminController@purchaseProgressInvoices');
        Route::get('purchase/dued-progress-invoices', 'AdminController@duedProgressInvoices');
        Route::get('purchase/on-stock-diamonds', 'AdminController@onStockDiamond');

        //accounting
        Route::get('accounting/invoice-export', 'AdminController@invoiceExport');

        Route::get('test', 'TestController@testView');


        Route::get('theme', function(){
            // dd($_COOKIE['theme']);
            if (!isset($_COOKIE['theme'])) {
                setcookie('theme', request('theme'), time()+3600 *24);
            }else{
                setcookie('theme', '', time() - 3600);                
            }
            return redirect('/adm');
        });

        Route::get('{vue_capture?}', 'AdminController@index')
                ->where('vue_capture', '[\/\w\.-]*')->name('admin.backend');

    });


}); 


Route::get('/td-login', function () {

    return view('backEnd.auth.login');

})->where('vue_capture', '[\/\w\.-]*')->name('admin.login');