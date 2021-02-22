<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs ($locale) {

	    return view('frontend.aboutUs.index');
	}
    public function guarantee ($locale) {

	    return view('frontend.aboutUs.guarantee');
	}
    public function commitment ($locale) {

	    return view('frontend.aboutUs.commitment');
	}

	// buying procedure//

	public function buyingProcedure ($locale) {

	    return view('frontend.aboutUs.buyingProcedure');
	}

	public function takeFromShopOrGIA ($locale) {

	    return view('frontend.aboutUs.takeFromShopOrGIA');
	}

	public function customEngagementRing ($locale) {

	    return view('frontend.aboutUs.customEngagementRing');
	}
		public function diamondInlayEngrave ($locale) {

	    return view('frontend.aboutUs.diamondInlayEngrave');
	}
	public function fullSatifaction ($locale) {

	    return view('frontend.aboutUs.fullSatifaction');
	}

	public function frequentlyAskQuestion ($locale) {

	    return view('frontend.aboutUs.frequentlyAskQuestion');
	}
	
	
}
