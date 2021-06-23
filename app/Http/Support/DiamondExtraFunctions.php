<?php

namespace App\Http\Support;

use App\Http\Support\ResizeImage;
use Illuminate\Support\Facades\Storage;
use Imagick;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as Req;


trait DiamondExtraFunctions{

	public function loadCachedImage(){

      $this->directlyLoadImage();

      $loading['image'] = 1;

      return response()
        ->json([
          'loading' =>$loading,
          'diamond' =>$this,
          'storage' =>config('global.s3_cache') . 'public/diamond/',
          ]);
	}

  public function directlyLoadImage(){

        if ( !empty($this->image_link) ) {

          $originImage = Storage::disk('s3')->exists('/public/diamond/images/'.$this->id.'.jpg') ;
          $thmImage = Storage::disk('s3')->exists('/public/diamond/images/thm-'.$this->id.'.jpg') ;

          // dd($originImage);

          if ( !$originImage || !$thmImage ) {
            // $url = str_replace('//', 'http://', $this->image_link);
            $url = $this->image_link;
            if (!strpos($url, '.pdf')) {
              if (strpos($url, 'segoma.com')) {
                $url = str_replace('https://segoma.com/v.php?type=first&id=', '', $url);
                $url = str_replace('https://segoma.com/v.aspx?type=inner&id=', '', $url);
                $url = 'https://static1.segoma.com/ws/public/GetPhoto/first/0/' . $url.'.jpg';
              }

                // $url = file_get_contents($url);

              $curl_handle=curl_init();
              curl_setopt($curl_handle, CURLOPT_URL, $this->image_link);
              curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
              curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
              // dd($curl_oj);
              $query = curl_exec($curl_handle);

              $httpCode = curl_getinfo($curl_handle, CURLINFO_HTTP_CODE);
              $contentType = curl_getinfo($curl_handle, CURLINFO_CONTENT_TYPE);
              $contentSize = curl_getinfo($curl_handle, CURLINFO_SIZE_DOWNLOAD);

              // dd(print_r($query));
              curl_close($curl_handle);
            // dd($contentSize);

              if ($query && $httpCode != 404 && $contentType == 'image/jpeg') {
                $hasSavedImage = ResizeImage::spaceImage($query,$this->id,1100,150, '/public/diamond/images/');
                // Storage::disk('spaces')->put('/public/images/'.$this->id.'.jpg', $contents, 'public');
                if ($hasSavedImage !=0) {
                  $this->image_cache = 1;
                  $this->update();
                }
              }else{
                $this->image_link = NULL;
                $this->update();
              }
                 
                
            }
                  // $name = substr($url, strrpos($url, '/') + 1);
          // $contents->move(base_path('/public/pdf'), $$this->id);
          // dd(print_r($contents));
        }
        
      }
      // dd($this->find($id));


  }


	public function loadCachedCert(){

                  // dd($this->r_id);

	      if ( $this->has_cert ) {
            
            if (!empty($this->cert_link) || $this->plot == NULL) {

              $certFileExisted = Storage::disk('s3')->exists('/public/diamond/certs/'.$this->id.'.jpg') ;
              $plotFileExisted = Storage::disk('s3')->exists('/public/diamond/plots/'.$this->id.'.jpg') ;

              // dump(die(print_r($certFileExisted)));
  	          if ( !$certFileExisted || !$plotFileExisted ) {
  	            $url = $this->cert_link;
  	            // dd($url);
    	            // if (strpos($url, 'www.diamondselections.com')) {
    	            //   $url = file_get_contents($this->cert_link);
    	            // }
                  // if (strpos($url, 'myapps.gia.edu/ReportCheckPOC/') || !strpos($url, 'http')) {
                  //   return 'url';
                  // }
                // dd($url);
                  // if(!empty($this->r_id)){

                  //   $url = $this->scarpeCertFromRap($this->r_id); 
                  //   dd($url);
                  // }
                   // create Imagick object
                   $im = new Imagick();

                   // Reads image from PDF
                   $im->setResolution(180,180);

                   try {
                      
                        $im->readImage($url);


                   } catch ( ImagickException $e) {

                        $e->getMessage();

                   }finally{

                        $this->has_cert = NULL;
                        $this->update();

                   }

                  $im->setImageFormat ("jpeg");
                  $geometry = $im->getImageGeometry();



                  if (!$certFileExisted) {
                      $path = Storage::disk('s3')->put('/public/diamond/certs/'.$this->id.'.jpg', $im->__toString() , 'public');
                      $certFileExisted = Storage::disk('s3')->exists('/public/diamond/certs/'.$this->id.'.jpg') ;
                  }



                   if ($geometry['width'] > '1900') {
                    if (!$this->checkFancyCert($url)) {
                        $this->plot = 1;
                        $this->update();
                        $this->trimLargeCertClarityPlot($im);
                        $plotFileExisted = Storage::disk('s3')->exists('/public/diamond/plots/'.$this->id.'.jpg') ;
                     }else{
                        $this->plot = 0;
                        $this->update();                                            
                     }

                   }
                       

                      
                    if ($certFileExisted) {
                      $this->cert_cache = 1;
                      $this->update();
                    }else{
                      $this->has_cert = NULL;
                      $this->update();
                    }


                   // }


  	            // }

  	        }

          }
	        
	      }

	      $loading = ['cert' => 1];

	      return response()
	        ->json([
	          'diamond' =>$this,
	          'loading' =>$loading,
	          'storage' =>config('global.s3_cache') . 'public/diamond/',
	          ]);
		
	}
  public function scarpeCertFromRap($diamond){

       
        // dd($diamond);
        $client = new Client();

        $requestData = ['url' => 'https://www.diamondselections.com/GetCertificate.aspx?diamondid='. $diamond,
                  'method' => 'GET',
                  'header' => [],
                  'data' => []
                  ];


        $request = new Req($requestData['method'], $requestData['url'], $requestData['header'] ,json_encode($requestData['data']));

        // dd($requestData['data']);

        $data = 0;


        try {
          $response = $client->send($request);
        // dd($response->getBody()->getContents());

          if ($response->getStatusCode()==200) {
              $data =$response->getBody()->getContents();
              $reg = preg_match_all("/(<iframe).*/",$data,$m);
              $reg = preg_match_all("/(src=).*></",$m[0][0],$o);
              $reg = str_replace('src="', '', $o[0][0]);
              $reg = str_replace('"><', '', $reg);
              // dd($reg);
              return $reg;
           } 
          
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


  public function trimLargeCertClarityPlot($im){
      
      $im->cropImage(560, 300, 720, 740);
      $path = Storage::disk('s3')->put('/public/diamond/plots/'.$this->id.'.jpg', $im->__toString() , 'public');

  }

  public function checkFancyCert($url){

      $image = new Imagick();

                   // Reads image from PDF
                   $image->setResolution(180,180);

                   try {
                      
                   $image->readImage($url);
                   // $image->readImage('https://diamondsoncall.s3.us-east-2.amazonaws.com/certi/2196267633.pdf');
                   // $image->readImage('https://diamondsoncall.s3.us-east-2.amazonaws.com/certi/6275892943.pdf');


                   } catch ( ImagickException $e) {

                        $e->getMessage();

                   }finally{

                        $this->has_cert = NULL;
                        $this->update();

                   }

                  $image->setImageFormat ("jpeg");
                  // $geometry = $image->getImageGeometry();


      $image->cropImage(50, 30, 1300, 200);
      // $image->blackthresholdimage("#FFFFFF");
      // $image->getColorspace();
      $image->__toString();
      return $image->getImageLength()>400?true:false ; 
      //484  fancy
      //334  D-Z
      // return print_r( dump(die($image)));
    
  }

}

