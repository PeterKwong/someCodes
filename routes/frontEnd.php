<?php


//frontEnd 

Route::get('/', 'HomeController@index');

    Route::prefix('/links/')->group(function(){

        Route::get('bl/{id}', function($id){
            return redirect('https://bit.ly/' . $id);
        } );

        Route::get('youtube', function(){
            return redirect('https://youtube.com/channel/UCaNsACwMjz9t9evpaSkHpGg');
        } );
        Route::get('facebook', function(){
            return redirect('https://facebook.com/tingdiamonds');
        } );
        Route::get('twitter', function(){
            return redirect('http://twitter.com/TingDiamond');
        } );        
        Route::get('instagram', function(){
            return redirect('https://instagram.com/tingdiamond/');
        } ); 
        Route::get('whatsapp/{number}', function($number){
            // dd($number);
            return redirect('https://api.whatsapp.com/send?phone=' . $number .'&text='. request()->text );
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



    // Route::get('/{locale}', 'HomeController@indexLang');
    Route::get('/', 'HomeController@indexLang');

    //diamond 
    Route::get('/gia-loose-diamonds/', 'DiamondController@bladeIndex');

    //round
    Route::prefix('/gia-loose-diamonds')->group(function(){

        Route::prefix('/round-cut')->group(function(){

            Route::get('', 'DiamondController@roundCut');
            Route::get('/0-30-0-49-carat-weight', 'DiamondController@p03roundCut');
            Route::get('/0-50-0-79-carat-weight', 'DiamondController@p05roundCut');
            Route::get('/0-80-0-99-carat-weight', 'DiamondController@p08roundCut');
            Route::get('/1-00-1-19-carat-weight', 'DiamondController@p10roundCut');
            Route::get('/1-20-1-49-carat-weight', 'DiamondController@p12roundCut');
            Route::get('/1-50-1-99-carat-weight', 'DiamondController@p15roundCut');
            Route::get('/2-00-2-99-carat-weight', 'DiamondController@p20roundCut');
            Route::get('/3-00-up-carat-weight', 'DiamondController@p30roundCut');
        });

        Route::prefix('/fancy-cut-diamond')->group(function(){

            //fancy cut
            Route::get('', 'DiamondController@fancyCutDiamond');
            Route::get('/heart-shaped', 'DiamondController@fancyCutHeart');
            Route::get('/princess-cut', 'DiamondController@fancyCutPrincess');
            Route::get('/emerald-cut', 'DiamondController@fancyCutEmerald');
            Route::get('/asscher-cut', 'DiamondController@fancyCutAsscher');
            Route::get('/oval-cut', 'DiamondController@fancyCutOval');
            Route::get('/radiant-cut', 'DiamondController@fancyCutRadiant');
            Route::get('/pear-shaped', 'DiamondController@fancyCutPear');
            Route::get('/marquise-cut', 'DiamondController@fancyCutMarquise');
            Route::get('/cushion-cut', 'DiamondController@fancyCutCushion');
        });


        //fancy color
        Route::get('/fancy-color', 'DiamondController@fancyColor');
        Route::get('/fancy-color/yellow', 'DiamondController@fancyColorYellow');
        Route::get('/fancy-color/pink', 'DiamondController@fancyColorPink');
        Route::get('/fancy-color/purple', 'DiamondController@fancyColorPurple');
        Route::get('/fancy-color/blue', 'DiamondController@fancyColorBlue');
        Route::get('/fancy-color/green', 'DiamondController@fancyColorGreen');
        Route::get('/fancy-color/orange', 'DiamondController@fancyColorOrange');
        Route::get('/fancy-color/brown', 'DiamondController@fancyColorBrown');
        Route::get('/fancy-color/black', 'DiamondController@fancyColorBlack');
        Route::get('/fancy-color/grey', 'DiamondController@fancyColorGrey');
        Route::get('/video/{id}', 'DiamondController@bladeVideo');

        Route::get('/{id}', 'DiamondController@bladeShow');
        Route::get('/{id}/ava', 'DiamondController@checkDiamondAvailability');

    });



    //engagementRing 
    Route::get('/engagement-rings/', 'EngagementRingController@bladeIndex');
    Route::get('/engagement-rings/solitaire-ring-setting', 'EngagementRingController@solitaireRingSetting');
    Route::get('/engagement-rings/side-stones-setting', 'EngagementRingController@sideStonesSetting');
    Route::get('/engagement-rings/halo-setting', 'EngagementRingController@haloSetting');
    Route::get('/engagement-rings/{id}', 'EngagementRingController@bladeShow');

    //jewelleries 
    Route::get('/jewellery/', 'JewelleryController@bladeIndex');
    Route::get('/jewellery/necklaces', 'JewelleryController@necklace');
    Route::get('/jewellery/earrings', 'JewelleryController@earring');
    Route::get('/jewellery/rings', 'JewelleryController@ring');
    Route::get('/jewellery/diamond-rings', 'JewelleryController@diamondRing');
    Route::get('/jewellery/fancy-diamond-rings', 'JewelleryController@fancyDiamondRing');
    Route::get('/jewellery/bracelets', 'JewelleryController@bracelet');
    Route::get('/jewellery/pendants', 'JewelleryController@pendant');
    Route::get('/jewellery/{id}', 'JewelleryController@bladeShow');

    //weddingRingPair 
    Route::get('/wedding-rings/', 'WeddingRingPairController@bladeIndex');
    Route::get('/wedding-rings/classic', 'WeddingRingPairController@classic');
    Route::get('/wedding-rings/japanese', 'WeddingRingPairController@japanese');
    Route::get('/wedding-rings/vintage', 'WeddingRingPairController@vintage');
    Route::get('/wedding-rings/{id}', 'WeddingRingPairController@bladeShow');

    //CustomerMoment
    Route::get('/customer-moments/', 'CustomerMomentController@bladeIndex');
    Route::get('/engagement-tips/', 'CustomerMomentController@engagementTips');

    //CustomerJewellry 
    Route::get('/customer-jewellery/', 'InvoicePostController@bladeIndex');
    Route::get('/customer-jewellery/{id}', 'InvoicePostController@bladeShow');



    //education 
    Route::get('/education-diamond-grading/', 'EducationController@bladeIndex');

    //4cs
    Route::get('/education-diamond-grading/4cs', 'EducationController@fourCs');
    Route::get('/education-diamond-grading/4cs/carat', 'EducationController@diamondCarat')->name('carat');
    Route::get('/education-diamond-grading/4cs/color', 'EducationController@diamondColor');
    Route::get('/education-diamond-grading/4cs/cut', 'EducationController@diamondCut');
    Route::get('/education-diamond-grading/4cs/clarity', 'EducationController@diamondClarity');

    //cert
    Route::get('/education-diamond-grading/gia-report', 'EducationController@giaReport');
    Route::get('/education-diamond-grading/gia-report/grading-certficate', 'EducationController@diamondCertificate');
    Route::get('/education-diamond-grading/gia-report/grading-eye-clean', 'EducationController@gradingEyeClean');


    //anatony
    Route::get('/education-diamond-grading/anatomy/shape', 'EducationController@diamondShape');
    Route::get('/education-diamond-grading/anatomy/hearts-and-arrows', 'EducationController@diamondHeartAndArrow');
    Route::get('/education-diamond-grading/anatomy/proportion', 'EducationController@diamondProportion');
    Route::get('/education-diamond-grading/anatomy/symmetry', 'EducationController@diamondSymmetry');
    Route::get('/education-diamond-grading/anatomy/polish', 'EducationController@diamondPolish');
    Route::get('/education-diamond-grading/anatomy/fluorescence', 'EducationController@diamondFluorescence');


    //about-us
    Route::get('/about-us', 'AboutUsController@aboutUs');
    Route::get('/about-us/guarantee', 'AboutUsController@guarantee');
    Route::get('/about-us/commitment', 'AboutUsController@commitment');

    //buying procedure
    Route::get('/buying-procedure', 'AboutUsController@buyingProcedure');
    Route::get('/buying-procedure/take-from-shop-or-gia', 'AboutUsController@takeFromShopOrGIA');
    Route::get('/buying-procedure/custom-engagement-rings', 'AboutUsController@customEngagementRing');
    Route::get('/buying-procedure/full-satisfaction', 'AboutUsController@fullSatifaction');
    Route::get('/buying-procedure/diamond-inlay-engrave', 'AboutUsController@diamondInlayEngrave');

    //outbound
    // Route::get('/outbound/{link}', 'OutboundController@directTo');

    //pages
    Route::get('/hca', 'PageController@hca');
    Route::get('/holloway-cut-adviser_hca-tool', 'PageController@hca');
    Route::get('/鑽石/鑽石淨度/鑽石淨度特徵的類型', 'PageController@characteristics');
    Route::get('/鑽石/鑽石鑑定/香港鑽石鑑定機構', 'PageController@hkLabs');
    Route::get('/sell-your-diamonds', 'PageController@sellYourDiamonds');


    //shopping cart
    Route::get('/diamond-ring-review', 'ShoppingCartController@diamondRingReview');
    Route::get('/shopping-cart', 'ShoppingCartController@bladeIndex');
    Route::get('/shop-bag-bill', 'ShoppingCartController@shopBagBill');

    Route::get('/shop-bag-bill-test', function(){
        return view('shoppingCart.shopBagBillTest');
    } );


    //login
    Route::group(['middleware' => 'guest'],function(){

        Route::get('/login', function () {
            return view('auth.lang.login');
        })->name('lang.login');

        Route::get('/register', function () {
            return view('auth.lang.register');
        })->name('lang.register');

        Route::get('/password/request', function () {
            return view('auth.lang.passwords.email');
        })->name('lang.reset');

    });


    //page
    Route::get('/p', 'PageController@show')->where(['id' => '[0-9]+']);

});

