<?php

namespace App\Http\Controllers;

use App\Http\Requests\StripeForm;
use App\Order;
use App\Support\Telegram;

use PaymentCN\Request;

include_once base_path('app/Http/Support/paymentCN/request.php');


class PurchasesController extends Controller
{
    use Telegram; 

    public $testIP = 'http://6dd56060.ngrok.io';

    public function store(StripeForm $stripeForm){

        // dd(auth()->user);


        try {
            $this->validate(request(),[
                'stripeEmail' => 'required | email',
                'stripeToken' => 'required']
            );
            return $stripeForm->save($charge);
         

        } catch (Exception $e) {
            
            return response()->json(['status' => $e->getMessage()], 422);

        }


        // return response()->json([
     //            'saved' => true,
     //            'message' => trans('frontHeader.appointmentSuccess')
     //        ]);

    }

    public function alipay($deposit, $random, $title, $orderID){
        
        // dd('ok'); 

        $param = [
            'method' => 'submitOrderInfo',
            'out_trade_no' => $random,        # 商户交易流水号  Y
            'body' => $title,
            'attach' =>  $random,
            'total_fee' => $deposit * 100,
            'time_start' => str_replace(['-',' ',':'],'',now()->toDateTimeString()),
            'time_expire'=> str_replace(['-',' ',':'],'',now()->tomorrow()->toDateTimeString()),
            'mch_create_ip' => '127.0.0.1',                 # 客户端设备IP地址 Y
        ];

        //isHK 是否使用支付宝香港钱包，取值"TRUE"/"FALSE"，默认值为"FALSE"
        //$isCNY 是否采用人民币(CNY)计价，取值"TRUE"/"FALSE"，默认值为"FALSE"
        
        // var_dump(die(($param))); 

        $alipay = new Request();

        $response = $alipay->submitOrderInfo($param,'pay.alipay.webpay.intl');
        // $response = $alipay->submitOrderInfo($param,'pay.alipay.wappay.intl');
      
        // $response =  trim($response);
        // $response =  json_decode($response);
        // $response->response->pay_url =  urlencode($response->response->pay_url);
        // dd( $response );
        // $response =  json_encode($response);

        // return $response;
        // dd( $response );

        return response()->json(['orderID'=> $orderID, 'is_success'=> true, 'response' => $response]);


    }

    public function wechat($deposit, $random, $title, $orderID){
        // dd();

        $param = [
            'method' => 'submitOrderInfo',
            'out_trade_no' => $random,        # 商户交易流水号  Y
            'body' => $title,
            'attach' => $random,
            'total_fee' => $deposit * 100,
            'time_start' => str_replace(['-',' ',':'],'',now()->toDateTimeString()),
            'time_expire'=> str_replace(['-',' ',':'],'',now()->tomorrow()->toDateTimeString()),
            'mch_create_ip' => '127.0.0.1',                 # 客户端设备IP地址 Y
        ];

        //isHK 是否使用支付宝香港钱包，取值"TRUE"/"FALSE"，默认值为"FALSE"
        //$isCNY 是否采用人民币(CNY)计价，取值"TRUE"/"FALSE"，默认值为"FALSE"
        
        // var_dump(die(($param))); 

        $wechat = new Request();

        $response = $wechat->submitOrderInfo($param,'pay.weixin.native.intl');
        
        // $response =  trim($response);
        // $response =  json_decode($response);
        // $response->response->pay_url =  urlencode($response->response->pay_url);
        // dd( $response );
        // $response =  json_encode($response);

        // return $response;
        // dd( $response );

        return response()->json(['orderID'=> $orderID, 'is_success'=> true, 'response' => $response]);


    }

    public function alipayOld($deposit, $random, $title, $orderID){
        
        // dd('ok'); 

        $param = [
            'out_trade_id' => $random,        # 商户交易流水号  Y
            'amount' => $deposit,                        # 支付单金额，单位为元，精度最多小数点后两位(如果是JPY和KRW，单位为分) Y
            'currency' => 'HKD',                      # 结算币种 Y
            'auth_code' => '',                        # 二维码内容 Y
            'product_info' => $title,         # 商品信息 Y
            'client_ip' => '0.0.0.0',                 # 客户端设备IP地址 Y
            // 'notify_url' => 'https://webhook.site/674d17bd-d4b9-4709-b50f-5221f709c644',        # 异步通知地址  N
            'notify_url' => $this->testIP . '/payment-callback/alipay',        # 异步通知地址  N
        ];

        //isHK 是否使用支付宝香港钱包，取值"TRUE"/"FALSE"，默认值为"FALSE"
        //$isCNY 是否采用人民币(CNY)计价，取值"TRUE"/"FALSE"，默认值为"FALSE"
        
        $alipay = new Alipay($isHK = false, $isCNY = false);
        $response = $alipay->consumerScanWeb($param);

        // $response =  trim($response);
        $response =  json_decode($response);
        $response->response->pay_url =  urlencode($response->response->pay_url);
        // dd( $response );
        // $response =  json_encode($response);

        // return $response;
        // dd( $response );

        return response()->json(['orderID'=> $orderID]);


    }

    public function visa($deposit, $stripeToken, $email, $order){


        $stripeForm = new StripeForm ;

        try {

            $order->update( ['customer_stripe' => $stripeForm->save($deposit, $stripeToken, $email) ]);

        } catch (Exception $e) {
            
            return response()->json(['status' => $e->getMessage()], 422);

        }

        
        $this->toTelegramFormat($order, 'Stripe', $deposit);

        return response()
                ->json(
                  ['saved' => true,
                  'message' => trans('frontHeader.appointmentSuccess')
                  ]
                );

        
    }

    public function callbackAlipay(){

        $request = request();

        $order = Order::where('finalize_code', $request->out_trade_id)->first();

        if ( $request->status =='PAID' && $order->status != 'received money' ) {

            $order->update(['status' => 'received money']);
            $this->toTelegramFormat($order, 'Alipay', $request->amount);

        }


        return dd(request());

    }

    public function callbackByWechat(){

        $request = request();

        $attach = $request;
        $attach = preg_replace('/(\n)/i', '', $attach);
        $attach = preg_replace('/.+(attach><!\[CDATA\[)/i', '', $attach);
        $attach = preg_replace('/(\]\]><\/attach).+/i', '', $attach);

        $result_code = $request;
        $result_code = preg_replace('/(\n)/i', '', $result_code);
        $result_code = preg_replace('/.+(result_code><!\[CDATA\[)/i', '', $result_code);
        $result_code = preg_replace('/(\]\]><\/result_code).+/i', '', $result_code);

        $local_total_fee = $request;
        $local_total_fee = preg_replace('/(\n)/i', '', $local_total_fee);
        $local_total_fee = preg_replace('/.+(local_total_fee><!\[CDATA\[)/i', '', $local_total_fee);
        $local_total_fee = preg_replace('/(\]\]><\/local_total_fee).+/i', '', $local_total_fee);

        // dd($array);

        $order = Order::where('finalize_code', $attach)->first();

        if ( $result_code =='0' && $order->status != 'received money' ) {

            $order->update(['status' => 'received money']);
            $this->toTelegramFormat($order, 'Wechat', $local_total_fee);

        }


        return dd(request());

    }


    public function chargeByCustomerStripe(StripeForm $stripeForm, $id){

        $order = Order::where('id',$id)->first();
        return $stripeForm->charge($order);
    }


    public function toTelegramFormat($order,$paymentMethod,$amount){
      
          // dd($cartItems);

            $message = 'Money Received from ' . $paymentMethod;



          $body = urlencode(
                  $message .  " \n".
                  'Order deposit: $'. ($amount/100) .  " \n"
                   . 'Order Title: '. $order->title 

                  );

          $this->send($body);

          // dd($cartItems);

          return ;

    }

}
