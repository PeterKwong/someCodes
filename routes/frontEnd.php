<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CustomerMomentController;
use App\Http\Controllers\DiamondController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\EngagementRingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicePostController;
use App\Http\Controllers\JewelleryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\WeddingRingPairController;


//frontEnd 


Route::get('/login', function () {
    return redirect('/hk/login');
})->name('login');


Route::get('/', [HomeController::class, 'index']);

    Route::prefix('/links/')->group(function(){

        Route::get('bl/{id}', function($id){
            return view('frontend.page.direct',[
            'url'=>'https://bit.ly/' . $id
            ]);
            // return redirect('https://bit.ly/' . $id);
        } );

        Route::get('youtube', function(){
            return view('frontend.page.direct',[
            'url'=>'https://youtube.com/channel/UCaNsACwMjz9t9evpaSkHpGg'
            ]);
            // return redirect('https://youtube.com/channel/UCaNsACwMjz9t9evpaSkHpGg');
        } );
        Route::get('facebook', function(){
            return view('frontend.page.direct',[
            'url'=>'https://facebook.com/tingdiamonds'
            ]);
            // return redirect('https://facebook.com/tingdiamonds');
        } );
        Route::get('twitter', function(){
            return view('frontend.page.direct',[
            'url'=>'http://twitter.com/TingDiamond'
            ]);            
            // return redirect('http://twitter.com/TingDiamond');
        } );        
        Route::get('instagram', function(){
            return view('frontend.page.direct',[
            'url'=>'https://instagram.com/tingdiamond/'
            ]);            
            // return redirect('https://instagram.com/tingdiamond/');
        } ); 
        Route::get('whatsapp/{number}', function($number){
            return view('frontend.page.direct',[
                        'url'=>'https://api.whatsapp.com/send?phone=' . $number .'&text='. request()->text 
                        ]);
            // dd($number);
            // return redirect('https://api.whatsapp.com/send?phone=' . $number .'&text='. request()->text );
    } );         
});


Route::prefix('/redirect')->group(function(){

    if (isset($_GET['url'])) {
        $url = $_GET['url'];
        $data = file_get_contents($url);
        echo $data;
        dd();
    }
});


Route::prefix('{locale}')->middleware('locale')->group(function(){

    // dd(app()->getLocale());
    // app()->setlocale(request()->segment(1));

    // Route::get('/{locale}', [HomeController::class, 'indexLang']);
    Route::get('/', [HomeController::class, 'indexLang']);

    //diamond 
    Route::get('/gia-loose-diamonds/', [DiamondController::class, 'bladeIndex']);

    //round
    Route::prefix('/gia-loose-diamonds')->group(function(){

        Route::get('/on-stock', [DiamondController::class, 'roundCut']);

        Route::prefix('/round-cut')->group(function(){

            Route::get('', [DiamondController::class, 'roundCut']);
            Route::get('/0-30-0-49-carat-weight', [DiamondController::class, 'p03roundCut']);
            Route::get('/0-50-0-79-carat-weight', [DiamondController::class, 'p05roundCut']);
            Route::get('/0-80-0-99-carat-weight', [DiamondController::class, 'p08roundCut']);
            Route::get('/1-00-1-19-carat-weight', [DiamondController::class, 'p10roundCut']);
            Route::get('/1-20-1-49-carat-weight', [DiamondController::class, 'p12roundCut']);
            Route::get('/1-50-1-99-carat-weight', [DiamondController::class, 'p15roundCut']);
            Route::get('/2-00-2-99-carat-weight', [DiamondController::class, 'p20roundCut']);
            Route::get('/3-00-up-carat-weight', [DiamondController::class, 'p30roundCut']);
        });

        Route::prefix('/fancy-cut-diamond')->group(function(){

            //fancy cut
            Route::get('', [DiamondController::class, 'fancyCutDiamond']);
            Route::get('/heart-shaped', [DiamondController::class, 'fancyCutHeart']);
            Route::get('/princess-cut', [DiamondController::class, 'fancyCutPrincess']);
            Route::get('/emerald-cut', [DiamondController::class, 'fancyCutEmerald']);
            Route::get('/asscher-cut', [DiamondController::class, 'fancyCutAsscher']);
            Route::get('/oval-cut', [DiamondController::class, 'fancyCutOval']);
            Route::get('/radiant-cut', [DiamondController::class, 'fancyCutRadiant']);
            Route::get('/pear-shaped', [DiamondController::class, 'fancyCutPear']);
            Route::get('/marquise-cut', [DiamondController::class, 'fancyCutMarquise']);
            Route::get('/cushion-cut', [DiamondController::class, 'fancyCutCushion']);
        });


        //fancy color
        Route::get('/fancy-color', [DiamondController::class, 'fancyColor']);
        Route::get('/fancy-color/yellow', [DiamondController::class, 'fancyColorYellow']);
        Route::get('/fancy-color/pink', [DiamondController::class, 'fancyColorPink']);
        Route::get('/fancy-color/purple', [DiamondController::class, 'fancyColorPurple']);
        Route::get('/fancy-color/blue', [DiamondController::class, 'fancyColorBlue']);
        Route::get('/fancy-color/green', [DiamondController::class, 'fancyColorGreen']);
        Route::get('/fancy-color/orange', [DiamondController::class, 'fancyColorOrange']);
        Route::get('/fancy-color/brown', [DiamondController::class, 'fancyColorBrown']);
        Route::get('/fancy-color/black', [DiamondController::class, 'fancyColorBlack']);
        Route::get('/fancy-color/grey', [DiamondController::class, 'fancyColorGrey']);
        Route::get('/video/{id}', [DiamondController::class, 'bladeVideo']);

        Route::get('/{id}', [DiamondController::class, 'bladeShow']);
        Route::get('/{id}/ava', [DiamondController::class, 'checkDiamondAvailability']);

    });



    //engagementRing 
    Route::get('/engagement-rings/', [EngagementRingController::class, 'bladeIndex']);
    Route::get('/engagement-rings/solitaire-ring-setting', [EngagementRingController::class, 'solitaireRingSetting']);
    Route::get('/engagement-rings/side-stones-setting', [EngagementRingController::class, 'sideStonesSetting']);
    Route::get('/engagement-rings/halo-setting', [EngagementRingController::class, 'haloSetting']);
    Route::get('/engagement-rings/{id}', [EngagementRingController::class, 'bladeShow']);

    //jewelleries 
    Route::get('/jewellery/', [JewelleryController::class,'bladeIndex']);
    Route::get('/jewellery/necklaces', [JewelleryController::class,'necklace']);
    Route::get('/jewellery/earrings', [JewelleryController::class,'earring']);
    Route::get('/jewellery/rings', [JewelleryController::class,'ring']);
    Route::get('/jewellery/diamond-rings', [JewelleryController::class,'diamondRing']);
    Route::get('/jewellery/fancy-diamond-rings', [JewelleryController::class,'fancyDiamondRing']);
    Route::get('/jewellery/bracelets', [JewelleryController::class,'bracelet']);
    Route::get('/jewellery/pendants', [JewelleryController::class,'pendant']);
    Route::get('/jewellery/{id}', [JewelleryController::class,'bladeShow']);

    //weddingRingPair 
    Route::get('/wedding-rings/', [WeddingRingPairController::class, 'bladeIndex']);
    Route::get('/wedding-rings/feerie-porte', [WeddingRingPairController::class, 'feeriePorte']);
    Route::get('/wedding-rings/angerosa', [WeddingRingPairController::class, 'angerosa']);
    Route::get('/wedding-rings/timeless-ones', [WeddingRingPairController::class, 'timelessOnes']);
    Route::get('/wedding-rings/forge', [WeddingRingPairController::class, 'forge']);
    Route::get('/wedding-rings/japanese', [WeddingRingPairController::class, 'japanese']);
    //not use    
    Route::get('/wedding-rings/classic', [WeddingRingPairController::class, 'bladeIndex']);
    Route::get('/wedding-rings/vintage', [WeddingRingPairController::class, 'bladeIndex']);

    Route::get('/wedding-rings/{id}', [WeddingRingPairController::class, 'bladeShow']);

    //CustomerMoment
    Route::get('/customer-moments/', [CustomerMomentController::class, 'bladeIndex']);
    Route::get('/engagement-tips/', [CustomerMomentController::class, 'engagementTips']);

    //CustomerJewellry 
    Route::get('/customer-jewellery/', [InvoicePostController::class, 'bladeIndex']);
    Route::get('/customer-jewellery/{id}', [InvoicePostController::class, 'bladeShow']);



    //education 
    Route::get('/education-diamond-grading/', [EducationController::class, 'bladeIndex']);

    //4cs
    Route::get('/education-diamond-grading/4cs', [EducationController::class, 'fourCs']);
    Route::get('/education-diamond-grading/4cs/carat', [EducationController::class, 'diamondCarat'])->name('carat');
    Route::get('/education-diamond-grading/4cs/color', [EducationController::class, 'diamondColor']);
    Route::get('/education-diamond-grading/4cs/cut', [EducationController::class, 'diamondCut']);
    Route::get('/education-diamond-grading/4cs/clarity', [EducationController::class, 'diamondClarity']);

    //cert
    Route::get('/education-diamond-grading/gia-report', [EducationController::class, 'giaReport']);
    Route::get('/education-diamond-grading/gia-report/grading-certficate', [EducationController::class, 'diamondCertificate']);
    Route::get('/education-diamond-grading/gia-report/grading-eye-clean', [EducationController::class, 'gradingEyeClean']);


    //anatony
    Route::get('/education-diamond-grading/anatomy/shape', [EducationController::class, 'diamondShape']);
    Route::get('/education-diamond-grading/anatomy/hearts-and-arrows', [EducationController::class, 'diamondHeartAndArrow']);
    Route::get('/education-diamond-grading/anatomy/proportion', [EducationController::class, 'diamondProportion']);
    Route::get('/education-diamond-grading/anatomy/symmetry', [EducationController::class, 'diamondSymmetry']);
    Route::get('/education-diamond-grading/anatomy/polish', [EducationController::class, 'diamondPolish']);
    Route::get('/education-diamond-grading/anatomy/fluorescence', [EducationController::class, 'diamondFluorescence']);


    //about-us
    Route::get('/about-us', [AboutUsController::class, 'aboutUs']);
    Route::get('/about-us/guarantee', [AboutUsController::class, 'guarantee']);
    Route::get('/about-us/commitment', [AboutUsController::class, 'commitment']);

    //buying procedure
    Route::get('/buying-procedure', [AboutUsController::class, 'buyingProcedure']);
    Route::get('/buying-procedure/take-from-shop-or-gia', [AboutUsController::class, 'takeFromShopOrGIA']);
    Route::get('/buying-procedure/custom-engagement-rings', [AboutUsController::class, 'customEngagementRing']);
    Route::get('/buying-procedure/full-satisfaction', [AboutUsController::class, 'fullSatifaction']);
    Route::get('/buying-procedure/diamond-inlay-engrave', [AboutUsController::class, 'diamondInlayEngrave']);
    Route::get('/buying-procedure/faq', [AboutUsController::class, 'frequentlyAskQuestion']);

    //outbound
    // Route::get('/outbound/{link}', 'OutboundController@directTo');

    //pages
    Route::get('/hca', [PageController::class, 'hca']);
    Route::get('/holloway-cut-adviser_hca-tool', [PageController::class, 'hca']);
    Route::get('/鑽石/鑽石淨度/鑽石淨度特徵的類型', [PageController::class, 'characteristics']);
    Route::get('/鑽石/鑽石鑑定/香港鑽石鑑定機構', [PageController::class, 'hkLabs']);
    Route::get('/sell-your-diamonds', [PageController::class, 'sellYourDiamonds']);


    //shopping cart
    Route::get('/diamond-ring-review', [ShoppingCartController::class, 'diamondRingReview']);
    Route::get('/shopping-cart', [ShoppingCartController::class, 'bladeIndex']);
    Route::get('/shop-bag-bill', [ShoppingCartController::class, 'shopBagBill']);
    Route::get('/shop-bag-bill-login', [ShoppingCartController::class, 'shopBagBillLogin']);
    Route::get('/shop-bag-bill-customer', [ShoppingCartController::class, 'shopBagBillCustomer']);
    Route::get('/thank-you', [ShoppingCartController::class, 'thankYouPage']);

    Route::get('/shop-bag-bill-test', function(){
        return view('frontend.shoppingCart.shopBagBillTest');
    } );


    //login
    Route::group(['middleware' => 'guest'],function(){

        Route::get('/login', function () {
            return view('frontend.auth.lang.login');
        })->name('lang.login');

        Route::get('/register', function () {
            return view('frontend.auth.lang.register');
        })->name('lang.register');

        Route::get('/password/request', function () {
            return view('frontend.auth.lang.passwords.email');
        })->name('lang.reset');

    });


    //page
    Route::get('/p', [PageController::class, 'show'])->where(['id' => '[0-9]+']);
    Route::get('/test', [PageController::class, 'test']);

});

