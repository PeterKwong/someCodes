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
    // $diamond  = Diamond::findOrFail($id);
    $diamond  = DiamondQuery::findOrFail($id);
    return view('diamond.show', ['diamond' => $diamond]);

  }
  public function showLoadingImage($id){
    
  // $diamond  = Diamond::findOrFail($id);
  $diamond  = DiamondQuery::findOrFail($id);

  return $diamond->loadCachedImage();

  }

  public function showLoadingCert($id){

  // $diamond  = Diamond::findOrFail($id);
  $diamond  = DiamondQuery::findOrFail($id);

  return $diamond->loadCachedCert();

  }
  
  public function index(){

      $m = DiamondQuery::SearchPaginateAndOrder();
      
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

      // dd($request->starred);
      $this->validate($request, ['price'=>'required | numeric |min:1',
                        'certificate' => 'required | numeric |min:1',
                        'weight' => 'required | numeric |min:0.001',
                      ]);

      $diamond = new Diamond();
      $diamondQuery = new DiamondQuery();
      $array = $request->toArray();
      $array['cert_link'] = 'https://myapps.gia.edu/ReportCheckPOC/pocservlet?IPAddress=1.1.1.1&Method=DownloadPDF&ReportNumber=' . $array['certificate'];

      $diamond = $diamond->create($array);
      $array['id'] = $diamond->id;
      $diamondQuery->create($array);

      // dd($diamond);



        return  response()
                  ->json([
                    'saved' => 'Insert Record successfully.',
                    'url' => $this->toggleStarredDiamondbeforeRedirect($diamond->id),
                  ]);

    }
    
    public function edit($id){
      $diamond = Diamond::findOrFail($id);

      return response()->
              json(['form' => $diamond, 'option'=>'']);  
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
        'price'  => 'required',
        'clarity' => 'required',
        'weight' => 'required',
        'color' => 'required',
        'polish' => 'required',
        'symmetry' => 'required',
        'fluorescence' => 'required',
        'lab' => 'required',
        'certificate' => 'required',
        'shape' =>'required',
        ]);


        $saved = 'same diamond';
        
        $invoiceDiamond = Diamond::findOrFail($id);
        $request = $request->except(['created_at']);
        $request['updated_at'] = now()->toDateTimeString();

        if ( $invoiceDiamond )  {
            $invoiceDiamond->update($request);
            $saved = true;         
        }

        return response()
            ->json([
                'saved' => $saved
                ]);
    }

    public function batchStore(Request $request){

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
    
    public function printLabel(){
      return view('backEnd.diamond.printLabel');
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

    public function toggleStarredDiamond($id){

      $diamond = Diamond::findOrFail($id);
      $diamond->update(['starred' => $diamond->starred?NULL: now() ]);

      $url = $this->toggleStarredDiamondbeforeRedirect($id);

      if ($url) {
        return redirect( $url
                ); 
      }

      echo "<script>window.close();</script>";

    }
    public function toggleStarredDiamondbeforeRedirect($id){
        
      $diamond = Diamond::findOrFail($id);

        $url = '';

        if ( $diamond->starred ) {

          $url = '/adm/diamonds/print-label?gia=' . $diamond->certificate .
                  '&price=' . $diamond->price . 
                  '&weight=' . $diamond->weight . 
                  '&color=' . $diamond->color . 
                  '&clarity=' . $diamond->clarity . 
                  '&stock=' . $diamond->stock . '&' ;

        }

        return $url;

    }

    public function starredDiamondsExport(){
      
      // dd(request()->all());
      $request = request()->all();

      $diamonds = Diamond::whereNotNull('starred')
                  ->with('supplier')
                  ->get();

      // dd($diamonds);

      return response()->json([
          'model' => $diamonds,
      ]);
    }

    public function resetAllDiamonds(){


      // $predis = Redis::Connection();
      // $predis->incr('oncall');
      // $predis->set('batchNumber', 50);
      // $predis->decr('oncall');

      // return $predis->get('batchNumber');
      // return $this->resetAllDiamonds2days();

      // return $import->resetAllRapDiamonds();

      // return;

      $cron = new CronJob();
      return $cron->generateDiamondSitemap();      

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

    public function admBladeBatchForm(){

        return view('backEnd.diamond.batchForm');

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
