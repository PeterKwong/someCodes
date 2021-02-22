<?php

namespace App\Http\Support\Diamond;

use App\Models\Diamond;
use App\Models\Supplier;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Req;
use GuzzleHttp\Exception\RequestException;


trait Sunrise{


    public function getDiamondsFromSunrise(){

      $client = new Client();

      $headers = ['Content-type'=>'application/x-www-form-urlencoded'];

      $request = new Req('GET', 'https://sunrisediam.com/Api/URL?UN=amlnbmVzaA==&PD=cGF0ZWw=&TransId=90', $headers);

      $data = [];

      try {

          $response = $client->send($request);

          // dd(print_r($response));
          $data = json_decode($response->getBody(),true);

      }  catch (RequestException $e) {

      }
          // $response = $client->send($request, ['timeout' => 5]);

          // dd(print_r($data[0]));

          $this->importDiamondsToDatabase($data);
           
  
    }
    public function importDiamondsToDatabase($data){
        foreach ($data as $diamond) {
          $this->createSingleDiamondFromSunrise($diamond);
        }
    } 
    public function createSingleDiamondFromSunrise($diamond){

 
        $s_id = Supplier::where('id',168)->first();

        if (!empty($diamond['Certi No.'] &&  is_numeric($diamond['Certi No.']) )) {

            $d = Diamond::where('certificate',$diamond['Certi No.'])->first();
       
            if (!isset($d)) {

              $d = new Diamond;

              }

              $d->stock = 's'.$s_id->id .'-'. $diamond['Stock ID'] .'-c'. strrev( substr(strval( ceil( $diamond['Net Amt($)'] ) ), 0,-1) );
              $d->price = $this->markPrice($diamond['Net Amt($)']*1.03);
              $d->certificate = $diamond['Certi No.'];
              $d->shape = $diamond['Shape'];
              $d->weight = $diamond['Cts']; 
              $d->color = $diamond['Color'];
              $d->clarity = $diamond['Clarity']; 
              if ($diamond['Cut'] == '3EX') {
                $diamond['Cut'] = 'EX';
              }
              if ($diamond['Cut'] == 'G') {
                $diamond['Cut'] = 'GD';
              }
              $d->cut = $diamond['Cut']?$diamond['Cut']:0;
              $d->polish = $diamond['Polish']; 
              $d->symmetry = $diamond['Symm'];
              $d->length = $diamond['Length']?$diamond['Length']:null;
              $d->width = $diamond['Width']?$diamond['Width']:null;
              $d->depth = $diamond['Depth']?$diamond['Depth']:null;
              $d->depth_percent = $diamond['DepthPer']?$diamond['DepthPer']:null;
              $d->table_percent = $diamond['TablePer']?$diamond['TablePer']:null;
              $d->crown_angle = $diamond['CrAng']?$diamond['CrAng']:null;
              $d->parvilion_angle = $diamond['PavAng']?$diamond['PavAng']:null;
              $d->fluorescence = $diamond['Fls']?$diamond['Fls']:'None'; 
              $d->lab = $diamond['Lab'];
              $d->location = $diamond['Location'] == 'Hong Kong' && $diamond['Cts'] > 1.0 && $diamond['Net Amt($)'] >3000 ?'1Hong Kong':'2'; 
              $d->available = 1; 
              // $d->image_link = $diamond['View Image']?$diamond['View Image']:null;
              // $d->has_image = $diamond['View Image']?1:null;

              // $d->video_link = $diamond['Other Video']?$diamond['Other Video']:null; 
              // $d->has_video = $diamond['Other Video']?1:null; 

              $s_id->diamonds()->save($d);

          }
  

    }



}