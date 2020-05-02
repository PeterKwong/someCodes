<?php

namespace App\Http\Controllers;

use App\Diamond;
use App\DiamondQuery;
use App\Supplier;
use App\Support\CronJob;
use App\Support\DiamondImport;
use App\Support\ResizeImage;
use Cache;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;


class DiamondController extends Controller
{
  
  public function bladeIndex($locale)
  {

    return view('diamond.index');

  }

  public function bladeShow($locale, $id)
  {
    
    $diamond  = Diamond::findOrFail($id);
    return view('diamond.show', compact('diamond'));

  }
  public function showLoadingImage($id){
    
  $diamond  = Diamond::findOrFail($id);

  return $diamond->loadCachedImage();

  }

  public function showLoadingCert($id){

  $diamond  = Diamond::findOrFail($id);

  return $diamond->loadCachedCert();

  }
  
  public function index(){

      $m = DiamondQuery::SearchPaginateAndOrder();
      
      // $m = DiamondQuery::SearchPaginateAndOrder();

      // $m = DB::table('diamonds')
      //   ->where(function($query){
      //   $query->whereNotNull('available');
      // });

      // $m = $m->where(function($query){
      //         $query->whereIn('color', explode(',', request()->color));
      //       });
      // $m = $m->where(function($query){
      //         $query->whereIn('clarity', explode(',', request()->clarity));
      //       });
      // $m = $m->where(function($query){
      //         $query->whereIn('cut', explode(',', request()->cut));
      //       });
      // $m = $m->where(function($query){
      //         $query->whereIn('polish', explode(',', request()->polish));
      //       });
      // $m = $m->where(function($query){
      //         $query->whereIn('symmetry', explode(',', request()->symmetry));
      //       });

      // $m = $m->where(function($query){
      //         $query->whereIn('fluorescence', explode(',', request()->fluorescence));
      //       });

      // $m = $m->where(function($query){
      //         $query->whereIn('shape', explode(',', request()->shape));
      //       });

      // $m = $m->where(function($query){
      //         $query->whereIn('location', explode(',', request()->location));
      //       });

      // $m = $m->where(function($query){
      //         $query->whereBetween('weight', explode(',', request()->weight));
      //       });

      // $m = $m->where(function($query){
      //         $query->whereBetween('price', explode(',', request()->price));
      //       })

      // ->orderBy(request()->column, request()->direction)
      // ->paginate(request()->per_page);

      
   
    	$columns = Diamond::$columns;

    	return response()
    		->json([
    		'model' => $m,
    		'columns' => $columns,
        // 'storage' =>config('CF_s3') . 'public/diamond/',
    		]);
  }

  public function admIndex(){

    $model = Diamond::AdmSearchPaginateAndOrder();
        // $model = Diamond::all();
   
      $columns = Diamond::$columns;
      return response()
        ->json([
        'model' => $model,
        'columns' => $columns,
        ]);
  }

  public function create(){

        return response()
            ->json([
                'form' =>Diamond::form(),
                'option' =>Diamond::orderBy('id', 'desc')->first(['id']),
                'suppliers' => Supplier::get(['name']),
            ]); 
    }

  public function show($id){
    // dd($id);
    $diamond  = DiamondQuery::findOrFail($id);

    // $this->guzzleRequest();

      return response()
        ->json([
          'diamond' =>$diamond,
          
          ]);
    }


    public function store(Request $request){

      $import = new DiamondImport();

      return $import->getRapGuzzle();
        
      // return $this->getFromRap();

      // return $this->instPrice();

        $path = $this->getFileName($request->csv[0]);
        $request->csv[0]->move(base_path('public/files'), $path);

        $results = Excel::load('public/files/'.$path, function($reader){
                                                $reader->all();
                                                })->get();

        // dd($results);
        unlink(base_path('public/files/').$path);
        $this->importToDatabase($results);

        return  response()
                  ->json([
                    'saved' => 'Insert Record successfully.'
                  ]);

    }

    public function importAPI(){

    $import = new DiamondImport();
      return $import->importDiamondFromAPI();
      return 'done';

    }

    public function importRap(){

      $cron = new CronJob();
      // $cron->runResetAllApiDiamonds();
      $cron->runImportDiamondRap();
      return 'done';

    }
    
    public function rapDiscountPrice(){
      $request = request();
      // dd($request);
      $diamond = new DiamondImport();
      return $diamond->getDiscountDiamondPrice($request);

    }

    public function checkDiamondAvailability($locale, $id){
      // dd(request());
      $import = new DiamondImport();
      return $import->diamondAvailability($id);
    }

    public function resetAllDiamonds(){

      // $predis = Redis::Connection();
      // $predis->incr('oncall');
      // $predis->set('batchNumber', 50);
      // $predis->decr('oncall');

      // return $predis->get('batchNumber');
      // return $this->resetAllDiamonds2days();

      // return $import->resetAllRapDiamonds();

      // $diamond = new Diamond();

      // $diamond->where('available',NULL)->chunk(1000, function($data){
      //     foreach ($data as $diamond) {
      //       $diamond->update();
      //       // dd($diamond);
      //     }
          
      // });

      $cron = new CronJob();
      return $cron->runDiamondQueryCopy();      

      // $import = new DiamondImport();
      // return $import->insertOrUpdateAndDelete();

      // $import = new DiamondImport();
      // return $import->runCronManually();
      // return Cache::get('batchNumber');
      // return $import->getSupplierTotalStones();
      // return $import->preloadCerts();
      // return $import->preloadImages();

      // $import = new DiamondImport();
      // return $import->resetAllApiDiamonds();  

      



      return 'reset images';

    }

    public function toogleAvailable($id){
        $diamond = Diamond::findOrFail($id);
        $diamond->update(['available' => $diamond->available?0:1 ]);
          // echo "<script>window.close();</script>";
        // dd($diamond);
    }

    public function resetAllDiamonds2days(){

      $import = new DiamondImport();
      return $import->resetAllDiamonds2daysBefore();
      
    }
    public function diamondDiscPrice(){
      
      return view('backEnd.diamond.discPrice');

    }

    public function bladeVideo($locale, $id){
      $diamond  = Diamond::findOrFail($id);

    // $this->guzzleRequest();

      return view('diamond.video', compact('diamond'));
    }
   

    public function admBladeIndex(){

        return view('backEnd.diamond.index');

    }

    public function admBladeShow(){

        return view('backEnd.diamond.show');

    }

    public function admBladeForm(){

        return view('backEnd.diamond.form');

    }

    
    public function roundCut($locale)
    {


      return view('diamond.roundCut');
 
    }
    
    public function p03roundCut($locale)
    {


      return view('diamond.p03roundCut');
 
    }

    public function p05roundCut($locale)
    {


      return view('diamond.p05roundCut');
 
    }
    

    public function p08roundCut($locale)
    {


      return view('diamond.p08roundCut');
 
    }

    public function p10roundCut($locale)
    {


      return view('diamond.p10roundCut');
 
    }

    public function p12roundCut($locale)
    {


      return view('diamond.p12roundCut');
 
    }

    public function p15roundCut($locale)
    {


      return view('diamond.p15roundCut');
 
    }

    public function p20roundCut($locale)
    {


      return view('diamond.p20roundCut');
 
    }

    public function p30roundCut($locale)
    {


      return view('diamond.p30roundCut');
 
    }

    //fancy cut Diamond
    
    public function fancyCutDiamond($locale)
    {


      return view('diamond.fancyCutDiamond');
 
    }

    public function fancyCutHeart($locale)
    {


      return view('diamond.fancyCutHeart');
 
    }
    public function fancyCutPrincess($locale)
    {


      return view('diamond.fancyCutPrincess');
 
    }
    public function fancyCutEmerald($locale)
    {


      return view('diamond.fancyCutEmerald');
 
    }
    public function fancyCutAsscher($locale)
    {


      return view('diamond.fancyCutAsscher');
 
    }
    public function fancyCutOval($locale)
    {


      return view('diamond.fancyCutOval');
 
    }
    public function fancyCutRadiant($locale)
    {


      return view('diamond.fancyCutRadiant');
 
    }
    public function fancyCutPear($locale)
    {


      return view('diamond.fancyCutPear');
 
    }
    public function fancyCutMarquise($locale)
    {


      return view('diamond.fancyCutMarquise');
 
    }
    public function fancyCutCushion($locale)
    {


      return view('diamond.fancyCutCushion');
 
    }
    
   //fancy Color
    public function fancyColor($locale)
    {


      return view('diamond.fancyColor');
 
    }

    public function fancyColorYellow($locale)
    {


      return view('diamond.fancyColorYellow');
 
    }

    public function fancyColorPink($locale)
    {


      return view('diamond.fancyColorPink');
 
    }
    public function fancyColorPurple($locale)
    {


      return view('diamond.fancyColorPurple');
 
    }
    public function fancyColorBlue($locale)
    {


      return view('diamond.fancyColorBlue');
 
    }
    public function fancyColorGreen($locale)
    {


      return view('diamond.fancyColorGreen');
 
    }
    public function fancyColorOrange($locale)
    {


      return view('diamond.fancyColorOrange');
 
    }
    public function fancyColorBrown($locale)
    {


      return view('diamond.fancyColorBrown');
 
    }
    public function fancyColorBlack($locale)
    {


      return view('diamond.fancyColorBlack');
 
    }
    public function fancyColorGrey($locale)
    {


      return view('diamond.fancyColorGrey');
 
    }
}
