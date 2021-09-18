<?php

return [

	'cache' => [
		'live' => 'cfront',
		'cfront' => 'https://image.tingdiamond.com/',
		's3' => 'https://s3.tingdiamond.com/',
        'day' => 60*60*24,
        'week' => 60*60*24*7,
		],
    
	'cookie'=>['time' => 60*60 ],

	'locale'=>[
		'en'=>0,
		'hk'=>1,
		'cn'=>2,
		],
		
	'company' => [ 'info' => [
						'name' => 'Ting Diamond Limited',
	                    'address' => 'Room 202, 2/F, Knutsford Commercial Building, 4-5 Knutsford Terrace, Tsim Sha Tsui',
	                    'contact' => '852 26169773/54844533',
                        'website' => 'www.tingdiamond.com',
                        'url' => 'https://www.tingdiamond.com/',
	                    'logo' => '/images/front-end/company/logo_PNG_sq_60x60_1.png',
	                        ],
	                'staffs'=>[
	                		['name' => 'Rhea', 'number' => 97339639],
                            ['name' => 'Mandy', 'number' => 52376008],
	                	]
				],

	'paymentMode' => '',
    // 'paymentMode' => '_test',

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'key_test' => env('STRIPE_KEY_TEST'),
        'secret_test' => env('STRIPE_SECRET_TEST'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'paymentCN' => [
        'mchId' => env('PAYMENTCN_MCHID'),
        'key' => env('PAYMENTCN_KEY'),
    ],

    'WECHAT_OPEN_PLATFORM_APPID' => env('WECHAT_OPEN_PLATFORM_APPID'),
    'WECHAT_OPEN_PLATFORM_SECRET' => env('WECHAT_OPEN_PLATFORM_SECRET'),
    
    'ALIPAY_APPID' => env('ALIPAY_APPID'),
    'ALIPAY_PRIVATE' => env('ALIPAY_PRIVATE'),
    'ALIPAY_PUBLIC' => env('ALIPAY_PUBLIC'),

    //aborted
    'hipo' => [
        'private' => env('HIPOPAY_PRIVATE'),
        'private_test' => env('HIPOPAY_PRIVATE_TEST'),
    ],
    
    'wechat' => [
        'client_id'     => env('WECHAT_OPEN_PLATFORM_APPID'),
        'client_secret' => env('WECHAT_OPEN_PLATFORM_SECRET'),
        'redirect'      => env('WECHAT_OPEN_PLATFORM_URL'),
    ],

    'oncall' => [
        'id'     => env('OCID'),
        'pw' => env('OCPW'),
    ],

    'rap' => [
        'id'     => env('RID'),
        'pw' => env('RPW'),
    ],
];