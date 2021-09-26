<?php

namespace App\Http\Support\Diamond;

use App\Models\Diamond;
use App\Models\DiamondQuery;
use App\Models\InvoiceDiamond;
use App\Models\Supplier;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as Req;

trait Oncall{

   protected $diamondSource = [];

    function __construct()
    {
      $this->diamondSource = [
                          'GLOW STAR' => 
                            ['r_id' =>'73302', 
                              'extraImport' => 0,

                              'url' => 'https://www.glowstaronline.com/inventory/website/ting_diamond.php',
                              'method' => 'get',
                              'header' => [],
                              'data' => []
                            ],
                          'white_diamond' =>
                            ['r_id' =>'99194', 
                              'extraImport' => 1,
                              'url' => 'https://www.diamondsoncall.com/API/action.php',
                              'method' => 'post',
                              'header' => [],
                              'data' => ["action"=>"diamond_stock_list",
                                        "email"=> config('global.oncall.id') ,
                                        "password"=> config('global.oncall.pw') ,
                                        "startindex"=>1,
                                        "lotno"=>"",
                                        "certificate_no"=>"",
                                        "shape"=>"Round,Pear,Princess,Marquise,Oval,Radiant,Emerald,Heart,Cushion,Asscher",
                                        "color"=>"d,e,f,g,h,i,j,k,l,m",
                                        "clarity"=>"fl,if,vvs1,vvs2,vs1,vs2,si1,si2,i1",
                                        "cut"=>"ex,vg,gd,",
                                        "polish"=>"ex,vg,gd",
                                        "symmetry"=>"ex,vg,gd",
                                        "fluorescence"=>"non,fnt,med,stg,vst",
                                        "diamond_width_from"=> "",
                                        "diamond_width_to"=> "",
                                        "diamond_length_from"=> "",
                                        "diamond_length_to"=> "",
                                        "depth_per_from"=>"",
                                        "depth_per_to"=>"",
                                        "table_from"=>"",
                                        "table_to"=>"",
                                        "total_depth_from"=>"",
                                        "total_depth_to"=>"",
                                        "pav_angle_from"=>"",
                                        "pav_angle_to"=>"",
                                        "pavilion_depth_from"=>"",
                                        "pavilion_depth_to"=> "",
                                        "crown_height_from"=> "",
                                        "crown_height_to"=> "",
                                        "crown_angle_from"=> "",
                                        "crown_angle_to"=> "",
                                        "key_symbols"=>"",
                                        "size"=>"",
                                        "lab"=>"gia"  ]
                              ],
                          'fancy_color' =>
                            ['r_id' =>'99194', 
                              'extraImport' => 1,
                              'url' => 'https://www.diamondsoncall.com/API/action.php',
                              'method' => 'post',
                              'header' => [],
                              'data' => ["action"=>"diamond_stock_list_fancy",
                                        "email"=>  config('global.oncall.id') ,
                                        "password"=>config('global.oncall.pw') ,
                                        "startindex"=>1,
                                        "lotno"=>"",
                                        "certificate_no"=>"",
                                        "shape"=>"",
                                        "color"=>"fancy",
                                        "clarity"=>"",
                                        "cut"=>"",
                                        "polish"=>"",
                                        "symmetry"=>"",
                                        "fluorescence"=>"",
                                        "diamond_width_from"=> "",
                                        "diamond_width_to"=> "",
                                        "diamond_length_from"=> "",
                                        "diamond_length_to"=> "",
                                        "depth_per_from"=>"",
                                        "depth_per_to"=>"",
                                        "table_from"=>"",
                                        "table_to"=>"",
                                        "total_depth_from"=>"",
                                        "total_depth_to"=>"",
                                        "pav_angle_from"=>"",
                                        "pav_angle_to"=>"",
                                        "pavilion_depth_from"=>"",
                                        "pavilion_depth_to"=> "",
                                        "crown_height_from"=> "",
                                        "crown_height_to"=> "",
                                        "crown_angle_from"=> "",
                                        "crown_angle_to"=> "",
                                        "key_symbols"=>"",
                                        "size"=>"",
                                        "lab"=>"gia"  ]
                              ], 
                          'api' =>
                            ['r_id' =>'99194', 
                              'extraImport' => 1,
                              'url' => 'https://api.diamondsoncall.com/feed/naturaldiamond',
                              'method' => 'post',
                              'header' => ['Accept'=>'application/json','Authorization'=>'Bearer '.config('global.oncall.api'),],
                              'data' => [
                                        "startindex"=>1,
                                        "certificate_no"=>"",
                                        "shape"=>"Round,Pear,Princess,Marquise,Oval,Radiant,Emerald,Heart,Cushion,Asscher",
                                        "color"=>"d,e,f,g,h,i,j,k,l,m",
                                        "clarity"=>"fl,if,vvs1,vvs2,vs1,vs2,si1,si2,i1",
                                        "cut"=>"ex,vg,gd,",
                                        "polish"=>"ex,vg,gd",
                                        "symmetry"=>"ex,vg,gd",
                                        "fluorescence"=>"non,fnt,med,stg,vst",
                                        'eye_clean'=>"YES",
                                        'milky'=>"No Milky",
                                        "lab"=>"gia"  ]
                              ],                           
                        ];
    }
    public function oncallAPI()
    {
      $data =  $this->guzzleRequest($this->diamondSource,'api',1);
      // dd($data);
      $extractedDiamonds = $this->importDiamondsFromWebAPI($data);   
       
       return $extractedDiamonds;

    }         
    public function importDiamondsFromWebAPI($data)
    {
       $success = 0;

      if (!$data == 0) {

        if ($data->success == true) {

              $data = $data->data;
              // dd(print_r($data));
              if (count($data)) {

                  foreach ($data as $diamond) {
                  $diam = [];
                  $diam['stock'] = $diamond->STOCK_ID?$diamond->STOCK_ID .'-c'. strrev( substr(strval( ceil( $diamond->TOTAL_PRICE ) ), 0,-1)  ) : 0;
                  $diam['price'] = $diamond->TOTAL_PRICE?$this->markPrice($diamond->TOTAL_PRICE):0;
                  $diam['shape'] = $diamond->SHAPE;
                  $diam['weight'] = round($diamond->CARAT,2);
                  $diam['color'] = $diamond->COLOR;
                  $diam['clarity'] = $diamond->CLARITY;
                  $diam['cut'] = $diamond->CUT?$diamond->CUT:0;
                  $diam['polish'] = $diamond->POLISH;
                  $diam['symmetry'] = $diamond->SYMMETRY;
                  $diam['fluorescence'] = $diamond->FLUORESCENCE;
                  $diam['length'] = is_numeric($diamond->LENGTH)?$diamond->LENGTH:0;
                  $diam['width'] = is_numeric($diamond->WIDTH)?$diamond->WIDTH:0;
                  $diam['depth'] = is_numeric($diamond->DEPTH)?$diamond->DEPTH:0;
                  $diam['depth_percent'] = is_numeric($diamond->DEPTH_PER)?$diamond->DEPTH_PER:0;
                  $diam['table_percent'] = is_numeric($diamond->TABLE_PER)?$diamond->TABLE_PER:0;
                  $diam['crown_angle'] = is_numeric($diamond->CROWNANGLE)?$diamond->CROWNANGLE:0;
                  $diam['parvilion_angle'] = is_numeric($diamond->PAVILIONANGLE)?$diamond->PAVILIONANGLE:0;
                  $diam['lab'] = $diamond->LAB;
                  $diam['certificate'] = is_numeric($diamond->CERTIFICATE_NO)?$diamond->CERTIFICATE_NO:0;
                  $diam['available'] = 1;
                  $diam['has_cert'] = null;
                  $diam['cert_link'] = null;
                  $diam['has_image'] = null;
                  $diam['image_link'] = null;
                  $diam['has_video'] = null;
                  $diam['video_link'] = null; 
                  $diam['plot'] = NULL; 
                  $diam['heart_image'] = $diamond->HEART_IMAGE; 
                  $diam['arrow_image'] = $diamond->ARROW_IMAGE; 
                  $diam['asset_image'] = $diamond->ASSET_IMAGE; 
                  $diam['milky'] = $diamond->MILKY; 
                  $diam['brown'] = $diamond->SHADE;
                  $diam['eye_clean'] = $diamond->EYE_CLEAN; 
                  $diam['supplier_id'] = 14; 

                  if (isset($diamond->CERTIFICATE) && !$diamond->CERTIFICATE == null) {
                        $diam['cert_link'] = $diamond->CERTIFICATE;
                        $diam['has_cert'] = 1;
                  }

                  if (isset($diamond->IMAGE) && !$diamond->IMAGE == null) {
                        //check rap
                        if (!strpos($diamond->IMAGE, 'SampleDiamondImages')) {
                          // $diam['image_link'] = $source[$id]['image_link_url'] . preg_replace('/RK-/', '', $diamond->{$source[$id]['stock']}).'.jpg';
                          $diam['image_link'] = $diamond->IMAGE;
                          $diam['has_image'] = 1;
                        }
                        
                  }


                  if (isset($diamond->VIDEO) ) {
                        $diam['video_link'] = $diamond->VIDEO;
                        $diam['has_video'] = 1;
                  }


                  if (preg_match('/(hong)/i', ($diamond->COUNTRY)) && $diamond->CARAT > 1.0 && $diamond->TOTAL_PRICE  > 3000 ) {
                        $diam['location'] = '1Hong Kong';
                  }else{
                        $diam['location'] = '3';                    
                  }
                  
                  if (isset($diamond->COLOR) && $diamond->COLOR == 'fancy' ) {
                        $diam['fancy_color'] = $diamond->F_COLOR;
                        $diam['fancy_intensity'] = $diamond->F_INTENSITY;
                        $diam['fancy_overtone'] = $diamond->F_OVERTONE;
                  }

                  $this->createSingleDiamondFromAPI($diam);

                  // $diamonds[] =$diam;
                }
                // dd(print_r($diamonds));
              }
            $success = 1;
        }
        


      }


      
      return $success;
    } 

    public function createSingleDiamondFromAPI($diamond){

            // dd($diamond);
            // $s_id = Supplier::where('id',14)->first();

            if (!empty($diamond['certificate']) ) {

                  $d = Diamond::where('certificate',$diamond['certificate'])->first();
                  // $invoiceDiamond = InvoiceDiamond::where('certificate',$diamond['certificate'])->first();

                      if (!isset($d)) {
                        $d = new Diamond;
                      }
                      $d->certificate = $diamond['certificate'];
                      $d->shape = $diamond['shape'];
                      $d->weight = $diamond['weight']; 
                      $d->color = $diamond['color'];
                      $d->clarity = $diamond['clarity']; 
                      $d->cut = $diamond['cut']?$diamond['cut']:0;
                      $d->polish = $diamond['polish']; 
                      $d->symmetry = $diamond['symmetry'];
                      $d->length = $diamond['length'];
                      $d->width = $diamond['width'];
                      $d->depth = $diamond['depth'];
                      $d->depth_percent = $diamond['depth_percent'];
                      $d->table_percent = $diamond['table_percent'];
                      $d->crown_angle = $diamond['crown_angle'];
                      $d->parvilion_angle = $diamond['parvilion_angle'];
                      $d->fluorescence = $diamond['fluorescence']?$diamond['fluorescence']:'None'; 
                      $d->lab = $diamond['lab'];
                      $d->location = $diamond['location']; 
                      $d->available = 1; 
                      $d->image_link = $diamond['image_link']?$diamond['image_link']:null;
                      $d->has_image = $diamond['has_image']?1:null;
                      $d->heart_image = $diamond['heart_image']?$diamond['heart_image']:null;
                      $d->arrow_image = $diamond['arrow_image']?$diamond['arrow_image']:null;
                      $d->asset_image = $diamond['asset_image']?$diamond['asset_image']:null;
                      $d->cert_link = $diamond['cert_link']?$diamond['cert_link']:null; 
                      $d->has_cert = $diamond['has_cert']?1:null; 
                      $d->video_link = $diamond['video_link']?$diamond['video_link']:null; 
                      $d->has_video = $diamond['has_video']?1:null; 
                      $d->milky = $diamond['milky'];
                      $d->brown = $diamond['brown'];
                      $d->eye_clean = $diamond['eye_clean'];
                      $d->supplier_id = $diamond['supplier_id'];

                      $this->notUpdateSuppliers($d, $d->supplier_id);
                      $this->checkDiamondFancyColor($d,$diamond);

                      $d->stock = 's'.$d->supplier_id.'-'. $diamond['stock'] ; 
                      $d->price = $diamond['price'];


                      $d->save();

                }


    }

    public function getSupplierTotalStones($selectedID = 'white_diamond'){

      $data = $this->guzzleRequest($this->diamondSource,$selectedID,1);

      return $data->SUMMARY->TOTAL_PAGES;
    }

    public function importDiamondFromAPI($startindex=1){

    $suppliers = ['white_diamond'];

    foreach ($suppliers as $s) {
      $this->importDiamondFromWebJson($s , $startindex);
    }

    // $this->resetAllApiDiamonds();
    return 1;


        return  response()
                  ->json([
                    'saved' => 'Insert Record successfully.'
                  ]);
    }


    public function importDiamondFromAPI_1000_PerBatch($countingPage, $selectedID = 'white_diamond'){
          $data = $this->guzzleRequest($this->diamondSource,$selectedID,$countingPage);
          // dd( config('global.oncall.id'));
          $extractedDiamonds = $this->importDiamondsFromWebJson($data,$selectedID);   

          return $extractedDiamonds;
    }


    public function importFancyDiamondFromAPI_1000_PerBatch($countingPage, $selectedID = 'fancy_color'){
          $data = $this->guzzleRequest($this->diamondSource,$selectedID,$countingPage);
          $extractedDiamonds = $this->importDiamondsFromWebJson($data,$selectedID);   

          return $extractedDiamonds;
    }

    public function importDiamondFromWebJson($name, $startindex){

      $selectedID = $name;
      
      $data = $this->guzzleRequest($this->diamondSource,$selectedID,$startindex);

      if ($this->diamondSource[$selectedID]['extraImport'] ==0) {
              $extractedImage = $this->extractImg($data,$selectedID);
              $data = $this->importImageAndVideoToDataBase($extractedImage);
      }

      if ($this->diamondSource[$selectedID]['extraImport'] ==1) {
              // $totalPage = ceil($data->SUMMARY->TOTAL_RECORDS/$data->SUMMARY->PAGE_SIZE);
              $totalPage = $data->SUMMARY->TOTAL_PAGES;
              $pageSize = $data->SUMMARY->PAGE_SIZE;
              // dd(print_r($totalPage));
              $countingPage = 1; 
              $postSets = [];

              // foreach (range(1, 4) as $k) {
              //   $set = $this->diamondSource;
              //   $countingPage += 1000;
              //   $set[$selectedID]['data']['startindex'] = $countingPage;
              //   $postSets[] = $set;  
              // }
              // dd(print_r($postSets));               

              foreach(range(1, $totalPage) as $p) {
              // dd(print_r($p)); 
                $data = $this->guzzleRequest($this->diamondSource,$selectedID,$countingPage);
                $extractedDiamonds = $this->importDiamondsFromWebJson($data,$selectedID);
                $countingPage += $pageSize;      
                // dd(print_r($extractedDiamonds));

                if ($extractedDiamonds == 0 ) {
                return ;
                }
              }
            // dd(print_r($po));
      }

      return 'update done';

    }

    public function guzzleRequest($diamondSource,$selectedID,$p){

      $diamondSource[$selectedID]['data']['startindex'] = $p;
      $client = new Client();

      // dd(print_r($diamondSource[$selectedID]['data']));
      $request = new Req($diamondSource[$selectedID]['method'], $diamondSource[$selectedID]['url'], $diamondSource[$selectedID]['header'] ,json_encode($diamondSource[$selectedID]['data']));

      $data = 0;

      try {
        $response = $client->send($request);

        if ($response->getStatusCode()==200) {
            $data = json_decode($response->getBody());
         } 

        // dd($data);
        
      } catch (Exception $e) {
        
      }

      return $data;
    }

    public function importDiamondsFromWebJson($data){

      $success = 0;

      if (!$data == 0) {

        if ($data->CODE == 1) {

              $data = $data->DATA;
              // dd(print_r($data));
              if (count($data)) {

                  foreach ($data as $diamond) {
                  $diam = [];
                  $diam['stock'] = $diamond->LOT_NO?$diamond->LOT_NO .'-c'. strrev( substr(strval( ceil( $diamond->AMOUNT ) ), 0,-1)  ) : 0;
                  $diam['price'] = $diamond->AMOUNT?$this->markPrice($diamond->AMOUNT):0;
                  $diam['shape'] = $diamond->SHAPE;
                  $diam['weight'] = round($diamond->CARAT,2);
                  $diam['color'] = $diamond->COLOR;
                  $diam['clarity'] = $diamond->CLARITY;
                  $diam['cut'] = $diamond->CUT?$diamond->CUT:0;
                  $diam['polish'] = $diamond->POLISH;
                  $diam['symmetry'] = $diamond->SYMM;
                  $diam['fluorescence'] = $diamond->FLURO;
                  $diam['length'] = is_numeric($diamond->LENGTH)?$diamond->LENGTH:0;
                  $diam['width'] = is_numeric($diamond->WIDTH)?$diamond->WIDTH:0;
                  $diam['depth'] = is_numeric($diamond->DEPTH)?$diamond->DEPTH:0;
                  $diam['depth_percent'] = is_numeric($diamond->DEPTH_PER)?$diamond->DEPTH_PER:0;
                  $diam['table_percent'] = is_numeric($diamond->TABLE_PER)?$diamond->TABLE_PER:0;
                  $diam['crown_angle'] = is_numeric($diamond->CROWNANGLE)?$diamond->CROWNANGLE:0;
                  $diam['parvilion_angle'] = is_numeric($diamond->PAVALIONANGLE)?$diamond->PAVALIONANGLE:0;
                  $diam['lab'] = $diamond->LAB;
                  $diam['certificate'] = is_numeric($diamond->CERTIFICATE_NO)?$diamond->CERTIFICATE_NO:0;
                  $diam['available'] = 1;
                  $diam['has_cert'] = null;
                  $diam['cert_link'] = null;
                  $diam['has_image'] = null;
                  $diam['image_link'] = null;
                  $diam['has_video'] = null;
                  $diam['video_link'] = null; 
                  $diam['plot'] = NULL; 
                  $diam['heart_image'] = $diamond->HEART_IMAGE; 
                  $diam['arrow_image'] = $diamond->ARROW_IMAGE; 
                  $diam['asset_image'] = $diamond->ASSET_IMAGE; 
                  $diam['milky'] = $diamond->MILKY; 
                  $diam['brown'] = $diamond->BROWN; 
                  $diam['green'] = $diamond->GREEN; 
                  $diam['eye_clean'] = $diamond->EYE_CLEAN; 
                  $diam['supplier_id'] = 14; 

                  if (isset($diamond->CERTIFICATE) && !$diamond->CERTIFICATE == null) {
                        $diam['cert_link'] = $diamond->CERTIFICATE;
                        $diam['has_cert'] = 1;
                  }

                  if (isset($diamond->IMAGE) && !$diamond->IMAGE == null) {
                        //check rap
                        if (!strpos($diamond->IMAGE, 'SampleDiamondImages')) {
                          // $diam['image_link'] = $source[$id]['image_link_url'] . preg_replace('/RK-/', '', $diamond->{$source[$id]['stock']}).'.jpg';
                          $diam['image_link'] = $diamond->IMAGE;
                          $diam['has_image'] = 1;
                        }
                        
                  }


                  if (isset($diamond->VIDEO) ) {
                        $diam['video_link'] = $diamond->VIDEO;
                        $diam['has_video'] = 1;
                  }


                  if (preg_match('/(hong)/i', ($diamond->LOCATION)) && $diamond->CARAT > 1.0 && $diamond->AMOUNT  > 3000 ) {
                        $diam['location'] = '1Hong Kong';
                  }else{
                        $diam['location'] = '3';                    
                  }
                  
                  if (isset($diamond->COLOR) && $diamond->COLOR == 'fancy' ) {
                        $diam['fancy_color'] = $diamond->F_COLOR;
                        $diam['fancy_intensity'] = $diamond->F_INTENSITY;
                        $diam['fancy_overtone'] = $diamond->F_OVERTONE;
                  }

                  $this->createSingleDiamondFromArray($diam);

                  // $diamonds[] =$diam;
                }
                // dd(print_r($diamonds));
              }
            $success = 1;
        }
        


      }


      
      return $success;

    }

    public function singleDiamondAvailability($diamond){
        
        // dd($diamond);
        $client = new Client();

        $requestData = ['url' => 'https://www.diamondsoncall.com/API/action.php',
                  'method' => 'post',
                  'header' => [],
                  'data' => ["action"=>"stone_available",
                            "email"=>  config('global.oncall.id') ,
                            "password"=> config('global.oncall.pw') ,
                            "certificate_no"=> $diamond->certificate ]];


        $request = new Req($requestData['method'], $requestData['url'], $requestData['header'] ,json_encode($requestData['data']));

        // dd($requestData['data']);

        $data = 0;


        try {
          $response = $client->send($request);
        // dd($response);

          if ($response->getStatusCode()==200) {
              $data = json_decode($response->getBody());
           } 

          // dd($data);
          
        } catch (Exception $e) {
          
        }

        if ($data->MESSAGE == 'DATA FOUND') {

            $this->importDiamondsFromWebJson($data,'white_diamond');

            $diamond->update(['available' => 1]);

            return response()->json(['available' => true]);
            
        }else{

            $diamond->update(['available' => NULL]);
            
            return response()->json(['available' => false]);

        }



    }
    
    public function createSingleDiamondFromArray($diamond){

            // dd($diamond);
            // $s_id = Supplier::where('id',14)->first();

            if (!empty($diamond['certificate']) ) {

                  $d = Diamond::where('certificate',$diamond['certificate'])->first();
                  // $invoiceDiamond = InvoiceDiamond::where('certificate',$diamond['certificate'])->first();

                      if (!isset($d)) {
                        $d = new Diamond;
                      }
                      $d->certificate = $diamond['certificate'];
                      $d->shape = $diamond['shape'];
                      $d->weight = $diamond['weight']; 
                      $d->color = $diamond['color'];
                      $d->clarity = $diamond['clarity']; 
                      $d->cut = $diamond['cut']?$diamond['cut']:0;
                      $d->polish = $diamond['polish']; 
                      $d->symmetry = $diamond['symmetry'];
                      $d->length = $diamond['length'];
                      $d->width = $diamond['width'];
                      $d->depth = $diamond['depth'];
                      $d->depth_percent = $diamond['depth_percent'];
                      $d->table_percent = $diamond['table_percent'];
                      $d->crown_angle = $diamond['crown_angle'];
                      $d->parvilion_angle = $diamond['parvilion_angle'];
                      $d->fluorescence = $diamond['fluorescence']?$diamond['fluorescence']:'None'; 
                      $d->lab = $diamond['lab'];
                      $d->location = $diamond['location']; 
                      $d->available = 1; 
                      $d->image_link = $diamond['image_link']?$diamond['image_link']:null;
                      $d->has_image = $diamond['has_image']?1:null;
                      $d->heart_image = $diamond['heart_image']?$diamond['heart_image']:null;
                      $d->arrow_image = $diamond['arrow_image']?$diamond['arrow_image']:null;
                      $d->asset_image = $diamond['asset_image']?$diamond['asset_image']:null;
                      $d->cert_link = $diamond['cert_link']?$diamond['cert_link']:null; 
                      $d->has_cert = $diamond['has_cert']?1:null; 
                      $d->video_link = $diamond['video_link']?$diamond['video_link']:null; 
                      $d->has_video = $diamond['has_video']?1:null; 
                      $d->milky = $diamond['milky'];
                      $d->brown = $diamond['brown'];
                      $d->green = $diamond['green'];
                      $d->eye_clean = $diamond['eye_clean'];
                      $d->supplier_id = $diamond['supplier_id'];

                      $this->notUpdateSuppliers($d);
                      $this->checkDiamondFancyColor($d,$diamond);

                      $d->stock = 's'.$d->supplier_id .'-'. $diamond['stock'] ; 
                      $d->price = $diamond['price'];


                      $d->save();


                }


    }

    public function notUpdateSuppliers($d){
      if($d->supplier_id == 168){
        return $d->save($d);
        // return $s_id->diamonds()->save($d);
      }

    }

    public function checkDiamondFancyColor($d,$diamond){
      if ($diamond['color'] == 'Fancy') {

        $d->fancy_color = $diamond['fancy_color'];
        $d->fancy_intensity = $diamond['fancy_intensity'];
        $d->fancy_overtone = $diamond['fancy_overtone'];

      }
      
    }
    public function importOncallHoldDiamond($certificate_no,$test='')
    {
         // dd($diamond);
        $client = new Client();


        try {
            
            $response = $client->post('https://' .$test. 'api.diamondsoncall.com/feed/holddiamond', [
                'headers' => ['Accept' => 'application/json','Authorization'=>'Bearer '. env('DIAMONDONCALL'.$test)],
                'form_params' =>["certificate_no"=> $certificate_no ],
            ]);


        // dd($response);

          if ($response->getStatusCode()==200) {
              $data = json_decode($response->getBody());

              return response()->json($data);
           } 

          dd($data);
          
        } catch (Exception $e) {
          
        }
    }

    public function importOncallConfirmDiamond($certificate_no,$test='')
    {
         // dd($diamond);
        $client = new Client();


        try {
            
            $response = $client->post('https://' .$test. 'api.diamondsoncall.com/feed/confirmdiamond', [
                'headers' => ['Accept' => 'application/json','Authorization'=>'Bearer '. env('DIAMONDONCALL'.$test)],
                'form_params' =>["certificate_no"=> $certificate_no ],
            ]);


        // dd($response);

          if ($response->getStatusCode()==200) {
              $data = json_decode($response->getBody());

              return response()->json($data);
           } 

          dd($data);
          
        } catch (Exception $e) {
          
        }
    }

}