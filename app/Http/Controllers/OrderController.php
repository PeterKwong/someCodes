<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\Customer;
use App\Models\Diamond;
use App\Models\EngagementRing;
use App\Models\Invoice;
use App\Models\Jewellery;
use App\Mail\Order as EmailOrder;
use App\Mail\ReferralOrder;
use App\Models\Order;
use App\Http\Support\Telegram;
use App\Models\User;
use App\Models\WeddingRing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    use Telegram; 

    protected $totalPrice = 0;
    protected $originalTotalPrice = 0;
    protected $deposit = 0;
    protected $balance = 0;
    protected $title = '';
    protected $random = '';

    public function placeOrder(Request $request){

      $user = auth()->user();

      // dd($request);

      $purchase = new PurchasesController();

      // dd($purchase);

      if (! $request->orderID && !$request->status ) {

        $this->calculatePrice($request->data['items'], $request->coupon_code);

        $this->random = now().'_Dep_'. $this->deposit .'_' . Str::random(10);


        $items = $this->CreateCartItem($request->data['items'], $request->coupon_code);


        $order = Order::create([
          
                      'customer_id' => $user->customers->first()->id,
                      'title' => $this->title,
                      'date' => now(),
                      'due_date' => now()->addMonth(),
                      'discount' => abs($this->originalTotalPrice - $this->deposit - $this->balance),
                      'extra' => 0,             
                      'sub_total' => $this->originalTotalPrice,
                      'total' => $this->totalPrice,
                      'deposit' => $this->deposit,             
                      'deposit_method' => $request->depositPaymentMethod,             
                      'balance' => $this->balance,
                      'coupon_code' => $request->coupon_code,
                      'balance_method' => $request->balancePaymentMethod,
                      'finalize_code' => $this->random,

                    ]);

        $order->cartItems()->saveMany($items);


        \Mail::to([ $request->user['email'] ])->queue(new EmailOrder($order));

        \Mail::to(['order@tingdiamond.com'])->queue(new EmailOrder($order));

        if ($request->coupon_code) {
          
          $user_id = Coupon::where('code', $request->coupon_code)->first()->user_id;
          $user = User::where('id', $user_id)->first();

          \Mail::to([ $user->email ])->queue(new ReferralOrder());
          // dump(die($user->email) );

        }

        $this->toTelegramFormat($order, $user);
        // dd('done');  


          if ($request->depositPaymentMethod == "VISA") {

              return $purchase->visa($this->deposit, $request->stripeToken, $request->user['email'], $order );
          }

          if ($request->depositPaymentMethod == "Alipay(-1%)") {

              return $purchase->alipay($this->deposit, $this->random, $this->title, $order->id);
          }

          if ($request->depositPaymentMethod == "Wechat(-1%)") {

              return $purchase->wechat($this->deposit, $this->random, $this->title, $order->id);
          }


         return response()
            ->json(
              ['saved' => true,
              'message' => trans('frontHeader.appointmentSuccess')
              ]
            );
            

      }else{

          $order = Order::whereId($request->orderID)->first();
          // dd($order);
          if ($request->depositPaymentMethod == "Alipay(-1%)") {

              return $purchase->alipay($order->deposit, $order->finalize_code, $order->title, $order->id);
          }

          if ($request->depositPaymentMethod == "Wechat(-1%)") {

              return $purchase->wechat($order->deposit, $order->finalize_code, $order->title, $order->id);
          }
      }
      
      

    }
    public function toTelegramFormat($order, $user){
      
          // dd($cartItems);

            $cartItems = '';

            foreach ($order->cartItems as $value) {
              // dd($value);
              $item = 'Item Title : ' .$value->title .  " \n";
              // dd($item);

              if ($value->cart_itemable_type == 'App/Diamond') {
                $item .='Diamond link :' . 'https://tingdiamond.com/hk/gia-loose-diamonds/' . $value->cart_itemable_id .  " \n" . "Stock: " . Diamond::where('id', $value->cart_itemable_id)->first()->stock . " \n" ;
              }

              if ($value->cart_itemable_type == 'App/EngagementRing') {
                $item .='Engagement Ring link :' . 'https://tingdiamond.com/hk/engagement-rings/' . $value->cart_itemable_id .  " \n";
              }

              $cartItems .= $item;

            }


          $body = urlencode('Customer name: ' . $user->customers->first()->name.  " \n".
                  'Customer Country: ' . $user->customers->first()->country. " \n".
                  'Customer contact: ' .'https://api.whatsapp.com/send?phone=852'. $user->customers->first()->phone. " \n"." \n".
                  'Order Title: '. $order->title .  " \n".
                  'Order Sub-total: $'. $order->sub_total .  " \n".
                  'Order Discount: $'. $order->discount .  " \n".
                  'Order Total: $'. $order->total .  " \n".
                  'Order deposit: $'. $order->deposit .  " \n".
                  'Order balance: $'. $order->balance .  " \n".
                  'Balance Payment: '. $order->balance_method .  " \n" .  " \n"

                   . $cartItems

                  );

          $this->send($body);

          // dd($cartItems);

          return ;

    }

    public function paymentMethods(){

      return [
        ['discount'=>1, 'name' => 'VISA'],
        ['discount'=>0.99, 'name' => 'ESP(-1%)'],
        ['discount'=>0.99, 'name' => 'Alipay(-1%)'],
        ['discount'=>0.99, 'name' => 'Wechat(-1%)'],
        ['discount'=>0.98, 'name' => 'Cash(-2%)'],
      ];

    }

    public function CreateCartItem($data, $couponCode){

        $user = auth()->user();
        $pairItems = $data;
        $couponRate = [];

        if ( Coupon::where('code', $couponCode)->first() ) {
            $couponRate = new CouponController();
            $couponRate = $couponRate->getCouponDisocountRate();
          // dd($couponRate);
        }


        $itemType = ['diamonds' => 'App/Diamond',
                     'engagementRings' => 'App/EngagementRing',
                     'jewelleries' => 'App/Jewellery',
                     'mountingFee' => 'App/Jewellery',
                     'weddingRings' => 'App/WeddingRing'
                    ];

        // dd($pairItems);

        $cartItems = [];

        foreach($pairItems as $key => $pairItem){

            foreach ($pairItem['pairItems'] as $itemKey => $item) {
                  if ($item['type'] == 'diamonds') {
                    $updatedPrice = Diamond::where('id', $item['id'])->first()->price;
                    foreach ($couponRate as $rate) {
                      if ( $updatedPrice > $rate['lowerAmount'] && $updatedPrice < $rate['upperAmount']) {
                        $updatedPrice *= (1-$rate['rate']);
                      }
                    }
                  }
                  if ($item['type'] == 'engagementRings') {
                    $updatedPrice = EngagementRing::where('id', $item['id'])->first()->unit_price;
                  }

                  if ($item['type'] == 'mountingFee') {
                    $updatedPrice = $item['unit_price'];
                  }

                  // dd($updatedPrice);
                  $cartItem = new CartItem();
                  $cartItem['cart_itemable_type'] = $itemType[$item['type']];
                  $cartItem['cart_itemable_id'] = $item['id'];
                  $cartItem['engrave'] = isset($item['engrave'])?$item['engrave']:null;
                  $cartItem['ring_size'] = isset($item['ringSize'])?$item['ringSize']:null;
                  $cartItem['unit_price'] = floor( $updatedPrice );
                  $cartItem['image'] = $item['image'];
                  $cartItem['title'] = $item['title'];
                  // $cartItem['order_id'] = $order_id;
                  $cartItem['user_id'] = $user->id;
                  $cartItem['pair_item_id'] = $key;
                  // dump($cartItem);
                  $cartItem->save();
                  $cartItems [] = $cartItem;
              }

          }

        return $cartItems;

    }

    public function calculatePrice($data, $couponCode){

        $user = auth()->user();
        $pairItems = $data;
        $couponRate = [];

        if ( Coupon::where('code', $couponCode)->first() ) {
            $couponRate = new CouponController();
            $couponRate = $couponRate->getCouponDisocountRate();
          // dd($couponRate);
        }


        // $itemType = ['diamonds' => 'App/Diamond',
        //              'engagementRings' => 'App/EngagementRing',
        //              'jewelleries' => 'App/Jewellery',
        //              'weddingRings' => 'App/WeddingRing'
        //             ];

        // dd($pairItems);

        $cartItems = [];

        $balanceRates = $this->paymentMethods();
        $balancePaymentMethod = request()->balancePaymentMethod;

        foreach ($balanceRates as $rate) {
          if ($rate['name'] == $balancePaymentMethod) {
            $balanceRates = $rate['discount'];
            $balanceRate = $rate['discount'];
          }

        }

        foreach($pairItems as $key => $pairItem){

            foreach ($pairItem['pairItems'] as $itemKey => $item) {
                  if ($item['type'] == 'diamonds') {
                    $originalPrice = Diamond::where('id', $item['id'])->first()->price;
                    $updatedPrice = $originalPrice;
                    if ($updatedPrice > 80000) {
                      $balanceRate = 1;
                    }
                    $balanceRate = $balanceRates;

                  }
                  if ($item['type'] == 'engagementRings') {
                    $originalPrice = EngagementRing::where('id', $item['id'])->first()->unit_price;
                    $updatedPrice = $originalPrice;
                    foreach ($couponRate as $rate) {
                      if ( $updatedPrice > $rate['lowerAmount'] && $updatedPrice < $rate['upperAmount']) {
                        $updatedPrice *= (1-$rate['rate']);
                      }
                    }

                  }

                  if ($item['type'] == 'mountingFee') {
                    $originalPrice = Jewellery::where('id', $item['id'])->first()->unit_price;
                    $updatedPrice = $originalPrice;
                  }

                  $this->originalTotalPrice += $originalPrice;  
                  $this->totalPrice += $updatedPrice  * $balanceRate;
                  $this->totalPrice = floor($this->totalPrice);
                  $this->title .=   $item['title'] . ' / ';
              }

          }
          
      

      $this->deposit = $this->originalTotalPrice * 0.2;

      if ($this->deposit>10000) {
        $this->deposit = 10000;
      }

      if ( $this->originalTotalPrice > 3000 && $this->originalTotalPrice < 15000 ) {
        $this->deposit = 3000;
      }

      if ( $this->originalTotalPrice <= 3000 ) {
        $this->deposit = $this->originalTotalPrice;
      }
      

      $this->balance = $this->totalPrice - $this->deposit;

    }


    public function finalize(){

      // dd(request()->all());

      $emailFinalize = Order::where('finalize_code', request()->code)->where('id', request()->id)->firstOrFail();
      // dd($emailFinalize);

      $emailFinalize->update(['verified' => true]);

      return view('frontend.shoppingCart.finalize', compact('emailFinalize'));
      dd(request()->all());
    }

    public function couponCodeOrders($code){

      $data = Order::where('coupon_code', $code)->paginate(10);

      return response()->json([
                    'model' => $data
                  ]);
    } 

    public function bladePendingShow($locale){

        return view('frontend.account.pendingShow');

    }


    //API admin

    public function adminAllOrders(){

      $data = Order::with('customer')->filterPaginateOrder();

      return response()->json([
                  'model' => $data
              ]);

    }

    public function adminShow($id){

      $data = Order::with('customer')->findOrFail($id);

      return response()->json([
                  'model' => $data
              ]);
    }

    public function pendingIndex(){
      
      $user = request()->user();
      // dd($user);
      $customer = $user->customers()->first()->orders()->with('cartItems')->paginate('10');

      return response()->json(['model' => $customer]);
    }

    public function pendingShow($id){

      $order = Order::where('id',$id)->with('cartItems')->get();
      $customer = auth()->user()->customers()->first();
      
      return response()->json([
                'model' => $order,
                'customer' => $customer
              ]);

    }

    //Blade

      //Admin
      public function admBladeIndex(){

        return view('backEnd.order.index');

      }

      public function admBladeShow(){

        return view('backEnd.order.show');

      }

      public function admBladeOrderToInvoice(){
        
        return view('backEnd.order.orderToInvoice');

      }

    public function bladeInvoiceShow($locale){

        return view('frontend.account.invoiceShow');

    }

    public function invoiceIndex(){
      
      $user = auth()->user();
      $customer = $user->customers()->first()->orders()->with('cartItems')->paginate('10');

      return response()->json(['model' => $customer]);
    }

    public function invoiceShow($id){

      $order = Order::where('id',$id)->with('cartItems')->get();
      $customer = auth()->user()->customers()->first();
      
      return response()->json([
                'model' => $order,
                'customer' => $customer
              ]);

    }
    public function updateStatus($id){

      // dump(die(request()->status ));
      
      // $statuses = ['ordering', 'shipping',  'arrived', 'mounting', 'ready to take'] ;

      $order = Order::where('id', $id)->first();
      $order = $order->update(['status' => request()->status ]);

      // $status = $order->status;
      
      // dd($order);

      // foreach( $statuses as $key => $status){

      //     if ($order->status == $status && $key != count($statuses) ) {
      //       $order->update(['status' => $statuses[$key+1] ] );
      //       return $statuses[$key+1];
      //     }

      // }

    }

    public function fetchOrderStatus($id){

        $order = Order::whereId($id)->first();

        return response()->json(['model' => $order->status]);
    }

    public function APIOrderToInvoice($id){

      $order = Order::where('id',$id)->with('cartItems')->first();

      // dd($order);

      $diamonds = $order->cartItems->filter(function($data){
        return $data->cart_itemable_type == 'App/Diamond' ; }

        )->pluck('cart_itemable_id');

      // dd($diamonds);

      if (count($diamonds)) {
        $diamonds = Diamond::whereIn('id', $diamonds)->orderBy('certificate')
        ->select('id','certificate as text','weight','color','clarity','stock','price')->get();
      }

      $notes = implode('', $order->cartItems->filter(function($data){
        
        return $data->cart_itemable_type == 'App/EngagementRing' ; }

        )->pluck('ring_size')->toArray() ) . "\n" ;
      
      $notes .= 'Engrave : '. implode('', $order->cartItems->filter(function($data){
        
        return $data->cart_itemable_type == 'App/EngagementRing' ; }

        )->pluck('engrave')->toArray() );


      $engagementRings = $order->cartItems->filter(function($data){

        return $data->cart_itemable_type == 'App/EngagementRing' ; }

        )->pluck('cart_itemable_id');

      if (count($engagementRings)) {
        $engagementRings = EngagementRing::whereIn('id', $engagementRings)
        ->select('id','stock as text','unit_price')->with('texts','images')->get();
      }


      $jewelleries = $order->cartItems->filter(function($data){

        return $data->cart_itemable_type == 'App/Jewellery' ; }

        )->pluck('cart_itemable_id');

      if (count($jewelleries)) {
        $jewelleries = Jewellery::whereIn('id', $jewelleries)
        ->select('id','stock as text','unit_price')->with('texts','images')->get();
      }
      // dd($jewelleries);


      $customer = [['id'=> $order->customer->id, 'text'=>  $order->customer->phone ]] ;

      $form = [
                'customer_id' => $order->customer->id,
                'title' => $order->title,
                'date' => date('Y-m-d'),
                'discount' => $order->discount,
                'extra' => 0,
                'invoice_no' => 0,
                'sub_total' => 0,
                'deposit' => $order->deposit,
                'deposit_method' => strtolower(preg_split("/\(/",$order->deposit_method)[0]),
                'balance' => 0,
                'balance_method' => strtolower(preg_split("/\(/",$order->balance_method)[0]),
                'notes'=> 'Ring Size:#' . $notes,
                'total'=> 0,
                'invoice_diamonds' => $diamonds,
                'engagement_rings' => $engagementRings,
                'wedding_rings' => [],
                'jewelleries' => $jewelleries,
                'source' => $id,
                ]; 

      return response()
        ->json([
          'form' => $form,
          'option' => [
                    'invoice_diamonds' => $diamonds,
                    'customers' => $customer,
                    'jewelleries' => $jewelleries,
                    'engagement_rings' => $engagementRings,
                    'wedding_rings' => WeddingRing::select('id','stock as text','unit_price')->with('texts','images')->get()
            ]
          ]);
      
    }


}
