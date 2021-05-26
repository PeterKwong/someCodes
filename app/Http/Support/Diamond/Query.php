<?php

namespace App\Http\Support\Diamond;

/**
 * 
 */

use App\Models\Diamond;
use App\Models\DiamondQuery;
use Carbon\Carbon;
use Cache;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

trait Query
{

  public function copyDiamonds(){

    // Cache::pull('diamondQueryPrimary');
    // dd(Cache::get('diamondQueryPrimary'));

    if (!Cache::get('diamondQueryPrimary')) {

      // $queryLast = DiamondQuery::orderBy('id', 'desc')->first()->id + 1;
      Cache::forever('diamondQueryPrimary', 1 );
      // dd($queryLast);
    }

    // dd(Cache::get('diamondQueryPrimary'));

    $diamondLast = Diamond::orderBy('id', 'desc')->first()->id;

    while ($diamondLast >= Cache::get('diamondQueryPrimary') ){

      $diamondData = Diamond::find( Cache::get('diamondQueryPrimary') )->toArray();
      $diamond = DiamondQuery::insert($diamondData);
      Cache::increment('diamondQueryPrimary');

      // dd($diamond);
    }
    
    return 1;

  } 

  public function updateAllAvailableDiamonds(){
      
      // $queryDiamonds = DiamondQuery::where('available',1)->chunk(100, function($diamonds){

      //       foreach ($diamonds as $diamond) {
      //           $diam = Diamond::find($diamond->id)->toArray();
      //           $diamond = $diamond->update($diam);
      //           // dd($diamond);
      //       }
      // });

      // return 1;

      DB::table('diamond_queries')->truncate();

      $queryDiamonds = Diamond::where('available',1)->chunk(100, function($diamonds){

            foreach ($diamonds as $diamond) {
                
                  $diam = DiamondQuery::updateOrInsert($diamond->toArray());
                  // dd($diam);


            }
      });

      return 1;
  } 


  public function deleteAllNotAvailableDiamonds(){

      $queryDiamonds = DiamondQuery::where('available', '!=' , 1)->chunk(100, function($diamonds){

            foreach ($diamonds as $diamond) {

                $diamond = $diamond->delete();
                // dd($diamond);
            }
      });

      return 1;
  } 
  
  public function insertOrUpdate(){
      

      $queryDiamonds = Diamond::where('available',1)->chunk(1000, function($diamonds){

            foreach ($diamonds as $diamond) {

                  $d = DiamondQuery::where('id', $diamond->id)->first();

                  if(!isset($d)){
                    $d = new DiamondQuery();
                    $d = $d->insert($diamond->turnHiddenToEmpty()->toArray());
                  }else{
                    $d = $d->update($diamond->turnHiddenToEmpty()->toArray());
                  }

                  // dd($d);

            }
      });

      return 1;
  }

    public function truncateAndInsert(){
      
      DB::table('diamond_queries')->truncate();

      $queryDiamonds = Diamond::where('available',1)
                    ->chunk(1000, function($diamonds){

            foreach ($diamonds as $diamond) {
  
                  $diam = DiamondQuery::insert($diamond->turnHiddenToEmpty()->toArray());
                  // dd($diam);
            }
      });

      // $this->deleteAllDiamonds();

      return 1;
  }

    public function deleteAllDiamonds(){

      $diamonds = Diamond::where('available', NULL)->chunk(1000, function($diamonds){

        // dd($diamonds);
        $this->oneQuarterBeforeResetOnDiamondQuery($diamonds);

        return 1;

      });


    }

    public function oneQuarterBeforeResetOnDiamondQuery($diamonds){

          if (count($diamonds)) {
            $dt = Carbon::now()->subDays(91);
            foreach ($diamonds as $diamond) {
              // dd($diamond->updated_at);
              if (!$dt->isBefore($diamond->updated_at)) {
                $diamond->delete();

              }
            }
          }
         // dd('end');
        return 1;
      
    }

}