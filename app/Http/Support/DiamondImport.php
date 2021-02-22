<?php

namespace App\Http\Support;

use App\Models\Diamond;
use App\Http\Controllers\DiamondController;
use App\Support\CronJob;
use App\Support\Diamond\Oncall;
use App\Support\Diamond\Rap;
use App\Support\Diamond\Sunrise;
use App\Support\Diamond\Reset;
use App\Support\Diamond\Query;
use Carbon\Carbon;
use Storage;
use App\Support\Telegram;
/**
* 
*/
class DiamondImport extends DiamondController
{
	
  public $sleepSeconds = 70;

  use Oncall, Rap, Sunrise, Reset, Telegram, query;

      protected $lookup = [ 'VG' => 'Very Good',
                            'Very Good' => 'Very Good',
                            'FR' => 'Fair',
                            'Fair' => 'Fair',
                            'GD' => 'Good',
                            'Good' => 'Good',
                            'EX' => 'Excellent',
                            'Excellent' => 'Excellent',
                            'NONE' => 'None',
                            'NON' => 'None',
                            'Faint' => 'Faint',
                            'FNT' => 'Faint',
                            'Medium' => 'Medium',
                            'MED' => 'Medium',
                            'STG' => 'Strong',
                            'STR' => 'Strong',
                            'Strong' => 'Strong',
                            'VST' => 'Very Strong',
                            'Very Strong' => 'Very Strong',
                            'RD' => 'Round',
                            'ROUND' => 'Round',
                            'Pear' => 'Pear',
                            'PEAR' => 'Pear',
                            'PS' => 'Pear',
                            'Princess' => 'Princess',
                            'PRINCESS' => 'Princess',
                            'PR' => 'Princess',
                            'Marquise' => 'Marquise',
                            'MARQUISE' => 'Marquise',
                            'Oval' => 'Oval',
                            'OVAL' => 'Oval',
                            'Radiant' => 'Radiant',
                            'RADIANT' => 'Radiant',
                            'Emerald' => 'Emerald',
                            'EMERALD' => 'Emerald',
                            'Heart' => 'Heart',
                            'HEART' => 'Heart',
                            'Cushion' => 'Cushion',
                            'CUSHION' => 'Cushion',
                            'Asscher' => 'Asscher',
                            'ASSCHER' => 'Asscher',
                            '' => 0,

                        ];
  
    public function runCronManually(){
        $test = new CronJob();
        $test->run();
    }

    public function preloadImages(){
      $diamonds = Diamond::where('available',1)->where('has_image',1)->where('image_cache',NULL)->chunk(500, function($diams){


            foreach ($diams as $dia) {

                $dia->loadCachedImage();
              // dd($dia->id);
            }  

            // sleep($this->sleepSeconds);
      });


      return 1;
      
    }

    public function preloadCerts(){

      $diamonds = Diamond::where('available',1)->where('has_cert',1)->where('cert_cache', NULL)->chunk(500, function($diams){
            
            foreach ($diams as $dia) {

                $dia->loadCachedCert();
              // dd($dia->id);
            }  

            // sleep($this->sleepSeconds);

      });


      return 1;
      
    }


    public function preloadPlots(){

      $diamonds = Diamond::where('available',1)->where('has_cert',1)->whereNULL('plot')->chunk(500, function($diams){
            
            foreach ($diams as $dia) {

                $dia->loadCachedCert();

            }  


      });


      return 1;
      
    }

    public function importImageAndVideoToDataBase($imagesAndVideos){
      foreach ($imagesAndVideos as $diamond) {
        $d = Diamond::where('certificate', $diamond['certificate']);
        if (!empty($d->first())) {
          $d->update($diamond);
          // dd($d);         
        }
      }
    }

    public function extractImg($data,$id){
      $source = ['GLOW STAR'=>['pre'=>'PKTDTL','image_link'=>'DIAMONDIMG_URL',
                                'video_link'=>'VIDEO_URL', 'certificate'=> 'CertiNo'],
                  'VRU STAR (HK) LIMITED'=>['pre'=>'DATA','image_link'=>'DIAMONDIMG_URL',
                                'video_link'=>'VIDEO_URL', 'certificate'=> 'CertiNo'],
                              ];
      $diamonds = [];
      $data = $data->{$source[$id]['pre']};
      // dd($data);
      foreach ($data as $diamond) {
        $diam = [];
        $diam['certificate'] = $diamond->{$source[$id]['certificate']};
        if (isset($diamond->{$source[$id]['image_link']}) && !$diamond->{$source[$id]['image_link']} == 0) {
              $diam['has_image'] = 1;
              $diam['image_link'] = $diamond->{$source[$id]['image_link']};
        }
        if (isset($diamond->{$source[$id]['video_link']}) && strpos($diamond->{$source[$id]['video_link']}, 'segoma.com') ) {
              $diam['video_link'] = $diamond->{$source[$id]['video_link']};
        }
        $diamonds[] =$diam;
      }
      // dd(print_r($diamonds));
      return $diamonds;
    }
    
 

    public function getDiamondJson(Request $request){
      
      // dd(print_r($request->all()));
      // $allDiamonds = [];
      // foreach ($request->diamonds as $diamonds) {
      //     // foreach ($diamonds as $diamond) {
      //       $allDiamonds [] = $diamonds;
      //     // }
      // }
      // dd($allDiamonds);
      // $diamonds = $request->diamonds;
      // dd(print_r($diamonds));
      return $this->JsonToDataBase($request->diamonds);

      $fp = fopen(base_path('/public/files/d.csv'), 'w');

      foreach ($request->diamonds as $diamond) {
          fputcsv($fp, $diamond);
      }

      fclose($fp);

      // $out = fopen( base_path('/public/files/d.csv'), 'w');
      // fputcsv($out, array(print_r($request->all())));
      // fclose($out);
      
    }
    
    public function importDiamondFromRap(){

      $diamondsID = $this->getRapGuzzle();

        return 1;  
        
    }



    public function delDPF(){

      $diamonds = Diamond::where('cert_cache',1)->get();

      if (count($diamonds)) {
          foreach ($diamonds as $diamond) {
          if ($diamond->available == 0 && $diamond->cert_cache == 1) {
            Storage::disk('s3')->delete('/diamond/public/pdf/'. $diamond->id. '.pdf');
            $diamond->cert_cache = 0;
            $diamond->update();
          }
        }
        return 1;
      }
      
    }

    public function delImage(){

      $diamonds = Diamond::where('image_cache',1)->get();

      if (count($diamonds)) {
          foreach ($diamonds as $diamond) {
          if ($diamond->available == 0 && $diamond->image_cache == 1) {
            Storage::disk('s3')->delete('/diamond/public/images/'. $diamond->id. '.jpg');
            Storage::disk('s3')->delete('/diamond/public/images/thm-'. $diamond->id. '.jpg');
            $diamond->image_cache = 0;
            $diamond->update();
          }
        }
        return 1;
      }
      
    }

    public function JsonToDataBase($data){

      // dd(print_r($data));
       // $newDiamonds = [];
       // $updateDiamonds = [];
      if(!empty($data)){

              foreach ($data as $key => $diamond) {

                if (! Supplier::where('r_id',$diamond['supplier']['r_id'])->count()) {
                  $n_s= new Supplier;
                  $n_s->r_id = $diamond['supplier']['r_id'];
                  $n_s->name = $diamond['supplier']['name'];
                  $n_s->country = $diamond['supplier']['country'];

                  $n_s->save();
                }
                $s_id = Supplier::where('r_id',$diamond['supplier']['r_id'])->first();

                if (!empty($diamond['diamond']['cert_num']) ) {

                  $existedDiamond = Diamond::where('certificate',$diamond['diamond']['cert_num']);
                  // dd(print_r($diamond['diamond']['cert_num']));
                    // dd(print_r($existedDiamond));
                    if ($existedDiamond->count()) {
                    $d = [];
                    $d['stock'] = $diamond['diamond']['stock_num']; 
                    $d['price'] = $this->markPrice($diamond['diamond']['total_sales_price']);
                    $d['certificate'] = $diamond['diamond']['cert_num'];
                    $d['shape'] = $diamond['diamond']['shape'];
                    $d['weight'] = $diamond['diamond']['size']; 
                    $d['color'] = $diamond['diamond']['color'];
                    $d['clarity'] = $diamond['diamond']['clarity']; 
                    $d['cut'] = $diamond['diamond']['cut']?$diamond['diamond']['cut']:0;
                    $d['polish'] = $diamond['diamond']['polish']; 
                    $d['symmetry'] = $diamond['diamond']['symmetry'];
                    $d['fluorescence'] = $diamond['diamond']['fluor_intensity']?$diamond['diamond']['fluor_intensity']:'None'; 
                    $d['lab'] = $diamond['diamond']['lab'];
                    $d['location'] = $diamond['diamond']['country'] =='Hong Kong'?'1'.$diamond['diamond']['country']:'2'.$diamond['diamond']['country']; 
                    $d['available'] = 1; 
                    $d['r_id'] = $diamond['diamond']['diamond_id']; 
                    $d['has_image'] = $this->allowImage($diamond['supplier']['r_id'])?$diamond['diamond']['has_image_file']:0;        
                    $d['image_link'] = $diamond['diamond']['image_file_url']; 
                    $d['has_cert'] = $diamond['diamond']['has_cert_file']; 

                    // $existedDiamond->imageLink = $diamond['diamond']['imagelink'];
                    // dd(print_r($d));
                    // $updateDiamonds[] = $d; 
                    $existedDiamond->update($d);

                    }else{

                    $d = new Diamond;

                    $d->stock = $diamond['diamond']['stock_num']; 
                    $d->price = $this->markPrice($diamond['diamond']['total_sales_price']);
                    $d->certificate = $diamond['diamond']['cert_num'];
                    $d->shape = $diamond['diamond']['shape'];
                    $d->weight = $diamond['diamond']['size']; 
                    $d->color = $diamond['diamond']['color'];
                    $d->clarity = $diamond['diamond']['clarity']; 
                    $d->cut = $diamond['diamond']['cut']?$diamond['diamond']['cut']:0;
                    $d->polish = $diamond['diamond']['polish']; 
                    $d->symmetry = $diamond['diamond']['symmetry'];
                    $d->fluorescence = $diamond['diamond']['fluor_intensity']?$diamond['diamond']['fluor_intensity']:'None'; 
                    $d->lab = $diamond['diamond']['lab'];
                    $d->location = $diamond['diamond']['country'] =='Hong Kong'?'1'.$diamond['diamond']['country']:'2'.$diamond['diamond']['country']; 
                    $d->available = 1; 
                    $d->r_id = $diamond['diamond']['diamond_id']; 
                    $d->has_image = $this->allowImage($diamond['supplier']['r_id'])?$diamond['diamond']['has_image_file']:0;        
                    $d->image_link = $diamond['diamond']['image_file_url']; 
                    $d->has_cert = $diamond['diamond']['has_cert_file']; 
                    // $d->imageLink = $diamond['imagelink'];

                    // $newDiamonds[]= $d;

                    $s_id->diamonds()->save($d);

                    }

                  }
                }  
           
          }
              return 1 ;
    }
    public function allowImage($s_id){

      $blacklist = array('');
      if (!in_array($s_id, $blacklist)) {
         return false;
       } 

    }
    public function importToDatabase($data)
    {


        $lookup = [
        'stock' => 'stock',
        'Stock' => 'stock',
        'weight' => 'weight',
        'carat' => 'weight',

         ];

        // dd(print_r($data));
         $diamonds = [];
        if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {
                  
                  $d = new Diamond;

                  $d->stock = $value->stock; 
                  $d->price = $this->markPrice($value->price);
                  $d->certificate = $value->certificate;
                  $d->shape = $value->shape;
                  $d->weight = $value->weight; 
                  $d->color = $value->color;
                  $d->clarity = $value->clarity; 
                  $d->cut = $value->cut;
                  $d->polish = $value->polish; 
                  $d->symmetry = $value->symmetry;
                  $d->fluorescence = $value->fluorescence; 
                  $d->lab = $value->lab;
                  $d->location = $value->location; 
                  $d->imageLink = $value->imagelink;

                  $diamonds[]= $d;

                  $d->save();

                }
             
            }
                return  ;
        }

      protected function getFileName($file)
    {
        return str_random(). '.' .$file->extension();
    }

      protected function markPrice($price)
    {
      $price = ceil($price);
      $usRate = 7.85;

      // dd(print_r($price));

      $priceRange = [
                  // '300' => '1.40',
                  // '500' => '1.30',
                  // '1000' => '1.25',
                  // '4000' => '1.18',

                  '300' => '1.20',
                  '4000' => '1.15',
                  '7000' => '1.15',
                  '10000' => '1.13', 
                  '15000' => '1.11', 
                  '20000' => '1.09', 
                  '30000' => '1.08', 
                  '50000' => '1.07', 
                  '75000' => '1.06', 
                  '100000' => '1.05', 
                  '1000000000' => '1.04'
                ];

      foreach ($priceRange as $range => $priceFactor) {
          if ($price <= $range) {
            $price *= $priceFactor * $usRate;
            // dd(print_r($price));
            return round($price,-2);
          }
      }
      
        
    }
    
    public function isNotMemoSuppliers($suppplier_id){

      $noMemo = ['153','167'];

      return !in_array($suppplier_id, $noMemo);

      
    }

    public function deleteSpace(){
        
          foreach (range(270000, 532673) as $key) {
          Storage::disk('spaces')->delete('/public/images/'. $key. '.jpg');
          Storage::disk('spaces')->delete('/public/images/thm-'. $key. '.jpg');
          Storage::disk('spaces')->delete('/public/pdf/'. $key. '.pdf');
           }      

    }


    public function diamondAvailability($id){

      $diamond = Diamond::where('id',$id)->first();
      // dd($diamond->toJson());


      $stockReverse = preg_replace('/(-c).*/','', $diamond->stock);
      $stockReverse = preg_replace('/s\w*(-)/','', $stockReverse);

      if (!$diamond->r_id) {

          $data = $this->singleDiamondAvailability($diamond);

          // dd($teleData);


      }
   
      if ($diamond->r_id != NULL) {

          $data = $this->getEachDiamond($diamond->r_id);
    
      }


      $teleData = ['Stock' => $stockReverse,
                    'GIA#' => $diamond->certificate,
                    'Available' => $diamond->available,
                    'Diamond' => $diamond->weight . ', ' . $diamond->color . ', ' . $diamond->clarity,
                    'Cut' =>  $diamond->cut,
                    'Symmetry' =>  $diamond->symmetry,
                    'Polish' =>  $diamond->polish,
                    'Fluorescence' =>  $diamond->fluorescence,
                    'Location' =>  $diamond->location,
                    'Cert' => 'https://cfr.tingdiamond.com/public/diamond/certs/'.$diamond->id . '.jpg'
                    ];

      $this->sendArray( $teleData , 's'.$diamond->supplier_id . "\n",'purchaseIds', 'TELEGRAM_TOKEN_PURCHASE');
      
      return $data;



    }


}