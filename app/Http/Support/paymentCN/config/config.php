<?php

namespace PaymentCN;

class Config{

    private $cfg = array();

    function __construct()
    {
        $this->cfg = ['url'=>'https://gateway.wepayez.com/pay/gateway',
        'mchId'=>config('services.paymentCN.mchId'),//测试商户号，商户上线需改为自己正式的
        'key'=>config('services.paymentCN.key'),//测试密钥，商户上线需改为自己正式的
        'version'=>'2.0',
        // 'notify_url'=> 'https://webhook.site/91dca93c-10cd-4866-8cb6-6437dc8b66e1 '//异步回调通知地址，商户上线需改为自己正式的
        'notify_url'=> url('/api/payment-cn-callback') //异步回调通知地址，商户上线需改为自己正式的
         ];
    }
    
    public function C($cfgName){
        return $this->cfg[$cfgName];
    }
}
?>