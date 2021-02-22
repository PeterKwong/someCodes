<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{
	protected $user = '';

	public function getAuthUser(){

		$this->user = Auth::guard('api')->user();

    }

    public function setCouponCode(){

    	$coupon = Coupon::create(['code' => str_random(5),
    					'type' => 0,
                        'clicked' => 0,
                        'account_type' => 'promoter',
    					'user_id' => auth()->user()->id
    				]);

        return auth()->user();
    }

    public function getCouponDisocountRate(){

    	return [
                ['lowerAmount' =>'0','upperAmount' =>'100000000', 'rate' => '0.10'],
     			];

        // return [
        //         ['lowerAmount' =>'0','upperAmount' =>'9999', 'rate' => '0.03'],
        //         ['lowerAmount' =>'10000', 'upperAmount' =>'19999', 'rate' => '0.02'],
        //         ['lowerAmount' =>'20000', 'upperAmount' =>'29999', 'rate' => '0.015'],
        //         ['lowerAmount' =>'30000', 'upperAmount' =>'49999', 'rate' => '0.012'],
        //         ['lowerAmount' =>'50000', 'upperAmount' =>'79999', 'rate' => '0.011'],
        //         ['lowerAmount' =>'80000', 'upperAmount' =>'149999', 'rate' => '0.010'],
        //         ['lowerAmount' =>'150000', 'upperAmount' =>'100000000', 'rate' => '0.008'],
        //         ];
            
    }

    public function getRefundRateArray(){

        return [
                ['lowerAmount' =>'0','upperAmount' =>'9999', 'rate' => '0.03'],
                ['lowerAmount' =>'10000', 'upperAmount' =>'19999', 'rate' => '0.02'],
                ['lowerAmount' =>'20000', 'upperAmount' =>'29999', 'rate' => '0.015'],
                ['lowerAmount' =>'30000', 'upperAmount' =>'49999', 'rate' => '0.012'],
                ['lowerAmount' =>'50000', 'upperAmount' =>'79999', 'rate' => '0.011'],
                ['lowerAmount' =>'80000', 'upperAmount' =>'149999', 'rate' => '0.010'],
                ['lowerAmount' =>'150000', 'upperAmount' =>'100000000', 'rate' => '0.008'],
                ];
            
    }

    public function getRefundRate(){

        $priceFactor = 0.8;

        $rate = $this->getRefundRateArray();

        foreach ($rate as $key => $value) {
                $refund = round($value['rate'] * $priceFactor, 3);
                $rate[$key] = array_merge($value, ['refund' => $refund]) ;
        }

        return $rate;
    }
    public function checkAndApplyCouponCode(){

    	$coupon = Coupon::where('code', request('code'))->first();
        $model = '';

        // dd($coupon);
        setcookie('coupon_code', request('code'), time()+3600 *24);
        setcookie('referral', 1, time()+3600 *1);


        $user = auth()->user();

        if ($coupon) {

            $coupon->clicked += 1;
            $coupon->save();
            
            if ($user) {
                $user->coupon_id = $coupon->id;
                $user->update();
            }
 
            $model = $this->getCouponDisocountRate();
        }

        return response()->json(['valid'=> $coupon?1:0,
                                'model' => $model
                            ]);

    }
    public function getAuthUserCouponCode(){

        $coupon = Coupon::where('id', auth()->user()->coupon_id)->first();   

        $model = '';

        if (isset($coupon->code)) {
            setcookie('coupon_code', $coupon, time()+3600 *24);
            $model = $this->getCouponDisocountRate();
        }

        return response()->json(['valid'=> $coupon?1:0,
                                'model' => $model,
                                'coupon_code' => $coupon
                            ]);

        
    }
    public function applyCouponCodeAndLogin(){

        $this->checkAndApplyCouponCode();

        return redirect(app()->getLocale().'/login');
    }

    public function applyCouponCodeUser(){

        $user = User::where('coupon_id', auth()->user()->coupons->first()->id)->get();

    	return count($user);
    }

    public function applyCouponCodeOrder(){


        $order = Order::where('coupon_code', auth()->user()->coupons->first()->code)->get();

        return count($order);
    }


    //API
    public function getReferralCode(){

    	$user = auth()->user();

		if(!count($user->coupons)){

			$this->setCouponCode();
		};


		$data = ['code' => auth()->user()->coupons->first()->code,
				  'discountRate' => $this->getRefundRate(),
				  'clicked' => auth()->user()->coupons->first()->clicked,
                  'appliedUser' => $this->applyCouponCodeUser(),
                  'orders' => $this->applyCouponCodeOrder(),
					];

		return response()->json(['model' => $data]);
    }
    
    public function refund(){

        $amount = ['pending'=>'',
                    'retrievable' => '',
                    'remaining' => '',
                ];

        $data = [
                'refundRate' => $this->getRefundRate(),
                'amount' => $amount,

            ];
        return response()->json(['model' => $data]);
    }


    public function record(){
        
    }

}
