<?php

namespace App\Support\Diamond;

use App\Diamond;
use Carbon\Carbon;


trait Reset{

	public function setCertToNULL(){
		
		$diamonds = Diamond::where('available',1)->where('has_cert',1)->where('cert_cache',1 )
								->chunk(1000, function($diamonds){

						                foreach ($diamonds as $diamond) {
						                  // dd(print_r($diamond->updated_at));
						                      $diamond->cert_cache = NULL;
						                      $diamond->update();
						                  
						                }

								});
	      

	      
	    return 'reset certs';
	}

	public function setImageToNULL(){
		
		$diamonds = Diamond::where('available',1)->where('has_image',1)->where('image_cache',1 )
								->chunk(1000, function($diamonds){

						                foreach ($diamonds as $diamond) {
						                  // dd(print_r($diamond->updated_at));
						                      $diamond->image_cache = NULL;
						                      $diamond->update();
						                  
						                }

								});
	      

	      
	    return 'reset images';
	}

	public function resetAllDiamonds2daysBefore(){

        $diamonds = Diamond::where('available',1)->get();

        // dd(print_r($diamonds->first())); 
        if (count($diamonds)) {
          $dt = Carbon::now();
          // dd(print_r($dt));

          $dtSub1 = $dt->subDay();
          // $dtSub2 = $dtSub1->subDay();
          $dt = Carbon::now(); 

          foreach ($diamonds as $diamond) {
            // dd(print_r($diamond->updated_at));
            // dd(print_r($dt));

            if (!$dt->isSameDay($diamond->updated_at) && !$dtSub1->isSameDay($diamond->updated_at) ) {
                  // dd($diamond->updated_at);
              $diamond->update(['available' => NULL]);

            }

          }

        }
         // dd('end');
        return 1;
    }


    public function resetAllRapDiamonds(){
      $diamonds = Diamond::where('available',1)->where('r_id','!=',null)->get();

          $this->oneDaysBeforeReset($diamonds);
                
        return 1;

    }

    public function resetAllApiDiamonds(){
      $diamonds = Diamond::where('r_id',null)->where('available','1')->get();

        $this->oneDaysBeforeReset($diamonds);

      return 1;

    }

    public function test(){
      $diamonds = Diamond::where('available',0)->chunk(1000, function($data){
        
          foreach ($data as $diamond) {
            $diamond->update(['available' => NULL]);
            // dd($diamond);
          }
          
      });

    }

    public function oneDaysBeforeReset($diamonds){

          if (count($diamonds)) {
            $dt = Carbon::now();
            foreach ($diamonds as $diamond) {
              // dd(print_r($diamond->updated_at));
              if (!$dt->isSameDay($diamond->updated_at)) {
                $diamond->update(['available' => NULL]);

              }
            }
          }
         // dd('end');
        return 1;
      
    }

    public function twoDaysBeforeReset($diamonds){

        if (count($diamonds)) {
          $dt = Carbon::now();
          // dd(print_r($dt));

          $dtSub1 = $dt->subDay();
          // $dtSub2 = $dtSub1->subDay();
          $dt = Carbon::now(); 

          foreach ($diamonds as $diamond) {
            // dd(print_r($diamond->updated_at));
            // dd(print_r($dt));

            if (!$dt->isSameDay($diamond->updated_at) && !$dtSub1->isSameDay($diamond->updated_at) ) {
                  // dd($diamond->updated_at);
              $diamond->update(['available' => NULL]);

            }

          }

        }
         // dd('end');
        return 1;
      
    }

}