<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function aboutUs ($locale) {

	    return view('aboutUs.index');
	}
    public function guarantee ($locale) {

	    return view('aboutUs.guarantee');
	}
    public function commitment ($locale) {

	    return view('aboutUs.commitment');
	}

	// buying procedure//

	public function buyingProcedure ($locale) {

	    return view('aboutUs.buyingProcedure');
	}

	public function takeFromShopOrGIA ($locale) {

	    return view('aboutUs.takeFromShopOrGIA');
	}

	public function customEngagementRing ($locale) {

	    return view('aboutUs.customEngagementRing');
	}
		public function diamondInlayEngrave ($locale) {

	    return view('aboutUs.diamondInlayEngrave');
	}
	public function fullSatifaction ($locale) {

	    return view('aboutUs.fullSatifaction');
	}
	
}
