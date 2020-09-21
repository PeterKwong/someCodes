<?php

namespace App\Support\Diamond;

use App\Diamond;
use App\Supplier;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as Req;
use GuzzleHttp\Exception\RequestException;


trait Sunrise{


    public function getDiamondsFromSunrise(){

      $client = new Client();

      $headers = ['Content-type'=>'application/x-www-form-urlencoded'];

      $request = new Req('GET', 'https://www.sunrisediamonds.com.hk/inventory/TingBoni.JSON', $headers);

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
              $d->price = $this->markPrice($diamond['Net Amt($)'])*1.03;
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
              $d->length = $diamond['Length'];
              $d->width = $diamond['Width'];
              $d->depth = $diamond['Depth'];
              $d->depth_percent = $diamond['DepthPer'];
              $d->table_percent = $diamond['TablePer'];
              $d->crown_angle = $diamond['CrAng'];
              $d->parvilion_angle = $diamond['PavAng'];
              $d->fluorescence = $diamond['Fls']?$diamond['Fls']:'None'; 
              $d->lab = $diamond['Lab'];
              $d->location = $diamond['Location'] == 'Hong Kong'?'1Hong Kong':'2'; 
              $d->available = 1; 
              $d->image_link = $diamond['Other Image']?$diamond['Other Image']:null;
              $d->has_image = $diamond['Other Image']?1:null;

              // $d->video_link = $diamond['Other Video']?$diamond['Other Video']:null; 
              // $d->has_video = $diamond['Other Video']?1:null; 

              $s_id->diamonds()->save($d);

          }
  


    }



}