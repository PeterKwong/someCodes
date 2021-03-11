<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CartItem;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
  	public function bladeIndex($locale)
    {


      return view('frontend.shoppingCart.index');
 
    }

     public function diamondRingReview($locale)
    {


      return view('frontend.shoppingCart.diamondRingReview');
 
    }

    public function shopBagBill(){
      
      if (!auth()->user()) {
        return redirect(app()->getLocale() . '/shop-bag-bill-login');
      }
      if ( !count(auth()->user()->customers) ) {
        return redirect(app()->getLocale() . '/shop-bag-bill-customer');
      }

      return view('frontend.shoppingCart.shopBagBill');
      
    }

    public function shopBagBillLogin(){

      return view('frontend.shoppingCart.shopBagBillLogin');
      
    }

    public function shopBagBillCustomer(){
      
      return view('frontend.shoppingCart.shopBagBillCustomer');
      
    }

    public function thankYouPage(){

      return view('frontend.shoppingCart.thankYouPage');
      
    }

    public function fetchCartItems(Request $request){ 

      $user = $request->user();

      $cart = CartItem::where('user_id',$user->id)->where('order_id',null)->get();
      return response()->json([
              'model' => $cart
      ]);

    }

    public function loganUserUpdateCart(Request $request){

      $user = $request->user();

      $this->dataToCartItem($request->data, $user);

      return 'updated';

    }

    public function dataToCartItem($data, $user){

        $pairItems = $data;

        $itemType = ['diamonds' => 'App/Diamond',
                     'engagementRings' => 'App/EngagementRing',
                     'jewelleries' => 'App/Jewellery',
                     'mountingFee' => 'App/Jewellery',
                     'weddingRings' => 'App/WeddingRing'
                    ];

        // dd($pairItems);

        if (count($pairItems) == 0) {
          CartItem::where('user_id',$user->id)->where('order_id',null)->delete();
        }

        $count = 0 ;
        $cartItemId = [];
        $cart = CartItem::where('user_id',$user->id)->where('order_id',null)->get();

        foreach($pairItems as $key => $pairItem){

            foreach ($pairItem['pairItems'] as $item) {
                  // dd($key);
                if ( !isset($cart[$count]) ) {
                  $cartItem = new CartItem();
                  $cartItem['cart_itemable_type'] = $itemType[$item['type']];
                  $cartItem['cart_itemable_id'] = $item['id'];
                  $cartItem['engrave'] = isset($item['engrave'])?$item['engrave']:null;
                  $cartItem['ring_size'] = isset($item['ringSize'])?$item['ringSize']:null;
                  $cartItem['unit_price'] = $item['unit_price'];
                  $cartItem['image'] = $item['image'];
                  $cartItem['title'] = $item['title'];
                  $cartItem['user_id'] = $user->id;
                  $cartItem['pair_item_id'] = $key;
                  $cartItem->save();
                  $cartItemId [] = $cartItem['id'];
                  // dd($CartItemtem);
                }else{
                  $cart[$count]['cart_itemable_type'] = $itemType[$item['type']];
                  $cart[$count]['cart_itemable_id'] = $item['id'];
                  $cart[$count]['engrave'] = isset($item['engrave'])?$item['engrave']:null;
                  $cart[$count]['ring_size'] = isset($item['ringSize'])?$item['ringSize']:null;
                  $cart[$count]['unit_price'] = $item['unit_price'];
                  $cart[$count]['image'] = $item['image'];
                  $cart[$count]['title'] = $item['title']; 
                  $cart[$count]['user_id'] = $user->id;
                  $cart[$count]['pair_item_id'] = $key;
                  $cart[$count]->update();
                  $cartItemId []= $cart[$count]['id'];                
                }

                $count += 1 ;
            }

        }


    }
    public function updateCustomerInfo(Request $request){

      $user = $request->user();
      // dd($request);
      $this->validate($request , [
          'data.name' => 'required',
          // 'data.address' => 'required', 
          'data.phone' => 'required | numeric | min:9999999',
          'data.email' => 'required | email',
      ]);

      $data = $request->data;

      $customerDetail = ['name' => $data['name'],
                          'phone' => (int)$data['phone'],
                          'country' => $data['country'],
                          'address' => $data['address'],
                          'email' => $data['email'],
                          'user_id' => $user->id,
                      ];
      $customer = customer::where('user_id', $user->id)->first();

      if (!$customer) {
        Customer::create($customerDetail);
        $customer = 'created';
      }

      if ($customer != 'created') {
        $customer->update($customerDetail);
        $customer = 'updated';
      }

      return response()->json([
              'model' => $customer
      ]);

    }

    public function fetchCustomerInfo(){

      return response()->json([
            'model' => Auth::user()->customers->first()
      ]);
      
    }

}

