<?php

namespace App\Http\Support\Diamond;

use App\Models\Diamond;
use App\Models\InvoiceDiamond;
use App\Models\Supplier;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as Req;


trait Rap{


    public function getRapGuzzle(){

      $p =[];
      $availableDiamonds = [];
      $perPage = 50;

      $tp = $this->getDiamonds(1,$perPage);


      $totalP = ceil($tp->response->body->search_results->total_diamonds_found/$perPage)-1;

      // dd(print_r($totalP));

      foreach ( range(1, $totalP) as $num) {

        $data = $this->getDiamonds($num,$perPage);

        // dd(print_r($data));
        $diamondsID = $this->getDiamondIDs($data);

        // $availableDiamonds[] = $diamondsID;
        if (count($diamondsID)) {
          // dd(print_r($diamondsID));
          foreach ($diamondsID as $diamond) {
            $this->getEachDiamond($diamond);
          }

        }
          
          // $p []= $num;


      }

      return response()->json([
            'total_page' => $p,
            'available_diamonds' =>$availableDiamonds
      ]);
      

    }

    public function getDiscountDiamondPrice($req){
        // dd($request);
            $reqBody = [ 
                  "request"=>[
                    "header"=>[
                      "username" => env('RID'),
                      "password" => env('RPW') ], 
                    "body"=>[
                      "shape" => $req->shape,
                      "size" => $req->weight,
                      "color" => $req->color,
                      "clarity" => $req->clarity,]

                      ] 
                    ];

        // dd($reqBody);
      $client = new Client();

      $headers = ['Content-type'=>'application/x-www-form-urlencoded'];

      $request = new Req('POST', 'https://technet.rapaport.com:449/HTTP/JSON/Prices/GetPrice.aspx', $headers,
      json_encode($reqBody));

      $data = [];
      try {
          $response = $client->send($request);
          $data = json_decode($response->getBody());

      }  catch (RequestException $e) {

        // $out = fopen( base_path('/public/files/result.txt'), 'w');
        // fwrite($out, print_r(array($data)));
        // fclose($out);

          // echo Psr7\str($e->getRequest());
          // if ($e->hasResponse()) {
          //     echo Psr7\str($e->getResponse());
          // }
      }
      
      // dd($data->response->body->caratprice);

      $originalPrice = $data->response->body->caratprice * ( 100 - $req->discount)/100 * $req->weight;
      $price = $this->markPrice($originalPrice);
      $tag = 'G'.$req->gia .'-c'. strrev( substr(strval( ceil( $originalPrice ) ), 0,-1) ) . '.D'. strval( $req->discount ) ;


      // dd($price);


      // dd(print_r($data));
      // $out = fopen( base_path('/public/files/result.txt'), 'w');
      // fwrite($out, print_r(array($data)));
      // fclose($out);
      //       dd(print_r($out));
      return response()->json([
                'price' => $price,
                'tag' => $tag
            ]);

    }

    public function getDiamonds($num,$p){

      $reqBody = [ 
                  "request"=>[
                    "header"=>[
                      "username" => env('RID'),
                      "password" => env('RPW') ], 
                    "body"=>[
                      "search_type" => "White",
                      'labs' => ['GIA'],
                      "shapes" => ["Round", "Pear", "Princess", "Marquise", "Oval", "Radiant", "Emerald", "Heart", "Cushion", "Asscher"],
                      "size_from" => "0.3",
                      "size_to" => "20",
                      "color_from" => "D",
                      "color_to" => "M",
                      'clarity_from'=> 'I1',
                      'clarity_to'=> 'IF',
                      'cut_from'=> 'Good',
                      'cut_to'=> 'Excellent',
                      'polish_from'=> 'Good',
                      'polish_to'=> 'Excellent',
                      'symmetry_from'=> 'Good',
                      'symmetry_to'=> 'Excellent',
                      "page_number" => $num, 
                      "page_size" => $p, 
                      "sort_by" => "price", 
                      "sort_direction" => "Asc" ]]
                        
                      ];

      $client = new Client();

      $headers = ['Content-type'=>'application/x-www-form-urlencoded'];

      $request = new Req('POST', 'https://technet.rapaport.com/HTTP/JSON/RetailFeed/GetDiamonds.aspx', $headers,
      json_encode($reqBody));

      $data = [];
      try {
          $response = $client->send($request);
          $data = json_decode($response->getBody());

      }  catch (RequestException $e) {

        // $out = fopen( base_path('/public/files/result.txt'), 'w');
        // fwrite($out, print_r(array($data)));
        // fclose($out);

          // echo Psr7\str($e->getRequest());
          // if ($e->hasResponse()) {
          //     echo Psr7\str($e->getResponse());
          // }
      }
      

      // dd(print_r($response));


      // dd(print_r($data));
      // $out = fopen( base_path('/public/files/result.txt'), 'w');
      // fwrite($out, print_r(array($data)));
      // fclose($out);
      //       dd(print_r($out));
      return $data;

    }
    public function getDiamondIDs($response){

      $diamondsID = [];
      
      $diamonds = $response;
      // dd($diamonds);
      if (isset($diamonds->response->header->error_code) && $diamonds->response->header->error_code == 0) {
        foreach ($diamonds->response->body->diamonds as $d) {
          $diamondsID[] = $d->diamond_id; 
        }
      }
        
            // dd($diamondsID);
        return $diamondsID;
    }

    public function getEachDiamond($diamond){

      $client = new Client();

      $headers = ['Content-type'=>'application/x-www-form-urlencoded'];

        $reqBody = [ 
                  "request"=>[
                    "header"=>[
                      "username" => env('RID'),
                      "password" => env('RPW')], 
                    "body"=>[
                      "diamond_id" => $diamond ]]
                        
                      ];
            // dd(print_r($reqBody));

        $request = new Req('POST', 'https://technet.rapaport.com/HTTP/JSON/RetailFeed/GetSingleDiamond.aspx', $headers,
        json_encode($reqBody));

      $data = [];

      try {

          $response = $client->send($request);

          // dd(print_r($response));
          $data = json_decode($response->getBody());

      }  catch (RequestException $e) {

      }
          // $response = $client->send($request, ['timeout' => 5]);

          // dd(print_r($data));
        if (isset($data->response->header->error_code) && $data->response->header->error_code==0) {

           $this->importDiamondToDatabase($data->response->body);
           
            return response()->json(['available' => true]);

        }else{

            Diamond::where('r_id', $diamond)->update(['available' => 0]);

            return response()->json(['available' => false]);

        }

    }

    public function importDiamondToDatabase($data){

      $trans = [
                'ROUND'=>'Round',
                'PRINCESS'=>'Prince',
                'HEART'=>'Heart',
                'EMERALD'=>'Emerald',
                'PEAR'=>'Pear',
                'MARQUISE'=>'Marquise',
                'OVAL'=>'Oval',
                'RADIANT'=>'Radiant',
                'CUSHION'=>'Cushion',
                'ASSCHER'=>'Asscher',
                'Excellent'=>'EX',
                'Very Good'=>'VG',
                'Good'=>'GD',
                'None'=>'NON',
                'Faint'=>'FNT',
                'Medium'=>'MED',
                'Strong'=>'STG',
                'Very Strong'=>'VST',
              ];
      if (! Supplier::where('r_id',$data->seller->account_id)->count()) {
                  $n_s= new Supplier;
                  // dd($data->seller);
                  $n_s->r_id = $data->seller->account_id;
                  $n_s->name = $data->seller->company;
                  $n_s->country = $data->seller->country;

                  $n_s->save();
                }
                $s_id = Supplier::where('r_id',$data->seller->account_id)->first();

                if (!empty($data->diamond->cert_num &&  is_numeric($data->diamond->cert_num))) {

                    $d = Diamond::where('certificate',$data->diamond->cert_num)->first();
                    $invoiceDiamond = InvoiceDiamond::where('certificate',$data->diamond->cert_num)->first();
                    // dd(print_r($data['diamond']['cert_num']));
                    // dd(print_r($data->diamond->cert_num));
                    if (!isset($d)) {

                      $d = new Diamond;

                      }

                      $d->stock = 's'.$s_id->id .'-'. $data->diamond->stock_num .'-c'. strrev( substr(strval( ceil( $data->diamond->total_purchase_price ) ), 0,-1) );
                      $d->price = $this->markPrice($data->diamond->total_purchase_price);
                      $d->certificate = $data->diamond->cert_num;
                      $d->shape = $data->diamond->shape;
                      $d->weight = round($data->diamond->size, 3); 
                      $d->color = $data->diamond->color;
                      $d->clarity = $data->diamond->clarity; 
                      $d->cut = $data->diamond->cut?
                                array_key_exists($data->diamond->cut, $trans)?$trans[$data->diamond->cut]:$data->diamond->cut
                                :0;
                      $d->polish = array_key_exists($data->diamond->polish, $trans)?$trans[$data->diamond->polish]:$data->diamond->polish; 
                      $d->symmetry = array_key_exists($data->diamond->symmetry, $trans)?$trans[$data->diamond->symmetry]:$data->diamond->symmetry; 
                      $d->length = $data->diamond->meas_length;
                      $d->width = $data->diamond->meas_width;
                      $d->depth = $data->diamond->meas_depth;
                      $d->depth_percent = $data->diamond->depth_percent>0?$data->diamond->depth_percent:0;
                      $d->table_percent = $data->diamond->table_percent>0?$data->diamond->table_percent:0;
                      $d->fluorescence = $data->diamond->fluor_intensity?
                                        array_key_exists($data->diamond->fluor_intensity, $trans)?$trans[$data->diamond->fluor_intensity]:$data->diamond->fluor_intensity
                                        :'None'; 
                      $d->lab = $data->diamond->lab;
                      $d->location = $data->diamond->country =='Hong Kong' && $this->isNotMemoSuppliers($s_id->id)
                                      ?'1'.$data->diamond->country:'2'; 
                      $d->available = $invoiceDiamond?NULL:1; 
                      $d->r_id = $data->diamond->diamond_id; 
                      $d->has_image = $this->allowImage($data->seller->account_id)?$data->diamond->has_image_file:0;        
                      // $d->image_link = $data->diamond->image_file_url; 
                      $d->has_cert = $data->diamond->has_cert_file; 
                      // $d->cert_link = ''; 
                      // $d->cert_link = $data->diamond->has_cert_file?'https://www.diamondselections.com/GetCertificate.aspx?diamondid='. $data->diamond->diamond_id:''; 
                      $d->cert_link = $data->diamond->has_cert_file?'https://www.diamondselections.com/GetCertificatePath.aspx?diamondid='. $data->diamond->diamond_id:'';
                      // $d->imageLink = $diamond['imagelink'];

                      // $newDiamonds[]= $d;

                      $s_id->diamonds()->save($d);

                  }
          


    }



}