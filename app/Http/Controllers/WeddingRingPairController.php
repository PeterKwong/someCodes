<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Support\ResizeImage;
use App\Models\Text;
use App\Models\WeddingRing;
use App\Models\WeddingRingPair;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class WeddingRingPairController extends Controller
{


    public $videoPath = 'public/videos';
    public $imagePath = 'public/images';
    public $video360Path = 'public/video360';


    public function bladeIndex($locale)
    {
        // dd($locale);
      return view('frontend.weddingRing.index');
    }


    public function timelessOnes($locale)
    {
      return view('frontend.weddingRing.timelessOnes'); 
    }
    public function angerosa($locale)
    {
      return view('frontend.weddingRing.angerosa'); 
    }
    public function feeriePorte($locale)
    {
      return view('frontend.weddingRing.feeriePorte'); 
    }
    public function forge($locale)
    {
      return view('frontend.weddingRing.forge');
    }
    public function japanese($locale)
    {
      return view('frontend.weddingRing.japanese');
    }


    public function classic($locale)
    {


      return view('frontend.weddingRing.classic');
 
    }

    public function vintage($locale)
    {


      return view('frontend.weddingRing.vintage');
 
    }


    public function bladeShow($locale, $id)
    {
      $weddingRings = WeddingRingPair::with(['weddingRings.texts'=>function($texts){
                    $texts->where('locale',app()->getLocale());
                }])->findOrFail($id);
      // dd($weddingRings->weddingRings[0]->title());

      $meta = $weddingRings->weddingRings[0];

      $title = $meta->title();
      $tags =[];
      foreach ($weddingRings->weddingRings as $key => $tag) {
            $tags[] = $tag->tags();
      }

      return view('frontend.weddingRing.show', compact('meta', 'title' ,'weddingRings','tags'));
 
    }

    public function admBladeIndex(){

        return view('backEnd.weddingRing.index');

    }

    public function admBladeShow(){

        return view('backEnd.weddingRing.show');

    }

    public function admBladeForm(){

        return view('backEnd.weddingRing.form');

    }

    public function index()
    {
        $weddingRingIds = WeddingRing::weddingRingPairsFilter();                   

        $weddingRingPair = WeddingRingPair::OrderBy('updated_at','desc')->whereIn('id',$weddingRingIds)->with('weddingRings.images');

    	return response()
    		->json([
                'model' => $weddingRingPair->paginate(request()->per_page)
                ]);
    }

    public function admIndex()
    {
        return response()
            ->json([
                'model' =>WeddingRing::FilterPaginateOrder()
                ]);
    }

    public function show($id)
    {
        $weddingRingPairs = WeddingRingPair::with(['weddingRings'=>function($q){
                $q->where('published',1);
            }
            ,'weddingRings.images','weddingRings.texts'])->findOrFail($id);

        // dd(print_r($weddingRingPairs->weddingRings));
        $invoicePosts = WeddingRingPair::with(['weddingRings.invoices.invoicePosts.images','weddingRings.invoices.invoicePosts.texts'])->findOrFail($id);
        // $invoicePosts = $invoicePosts->weddingRings;
        
        // $posts = [];
        // foreach ($invoicePosts as $weddingRing) {
        //     if (!empty($weddingRing->invoices[0])) {
        //        $posts []= $weddingRing->invoices[0]->invoicePosts;
        //     }
            
        // }
        
        return response()
            ->json([
                'model' => $weddingRingPairs,
                'posts' => $invoicePosts,
            ]);
    }

        public function admShow($id)
    {
        $weddingRingPairs = WeddingRingPair::with(['weddingRings','weddingRings.images','weddingRings.texts'])->findOrFail($id);

        // dd(print_r($weddingRingPairs->weddingRings));
        $invoicePosts = WeddingRingPair::with(['weddingRings.invoices.invoicePosts.images'])->findOrFail($id);
        // $invoicePosts = $invoicePosts->weddingRings;
        
        // $posts = [];
        // foreach ($invoicePosts as $weddingRing) {
        //     if (!empty($weddingRing->invoices[0])) {
        //        $posts []= $weddingRing->invoices[0]->invoicePosts;
        //     }
            
        // }
        
        return response()
            ->json([
                'model' => $weddingRingPairs,
                'posts' => $invoicePosts,
            ]);
    }

    public function create()
    {
        return response()
            ->json([
                'form' =>WeddingRing::form(),
                'option' =>WeddingRing::orderBy('id', 'desc')->first(['id'])
            ]); 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'form[*].stock'  => 'required| unique:wedding_rings',
            'form[*].texts' => 'required',
            'form[*].unit_price' => 'required | numeric |min:0',
            ]);
        
        // dd(print_r($request->all()));
        $requestAll = $request->all();
        // dd($requestAll);
        $weddingRings = [];

        foreach ($requestAll as $req) {
            $weddingRings [] = WeddingRing::create(Arr::except($req, ['video','texts','images','video360']));
        }
  
        $weddingRingPair = WeddingRingPair::create();
        $weddingRingPair->weddingRings()->saveMany($weddingRings);
        // $weddingRing = WeddingRing::create($request->except(['video','texts','images']));
       
        $published = [0 => false, 1 => false];

        // dd($weddingRingPair);
        foreach ($requestAll as $key=>$req) {

            if ($req['published'] == 1) {
                $published[$key] = true;
            }


            $texts = [];
        
            foreach ($req['texts'] as $k=>$text) {
                if (!empty($req['texts'][$k]['content'])) {
                    $txt = new Text($text);
                    $texts [] = $txt;
                }
                
            }
            
            $images =[];

            // print_r($req);

            foreach ($req['images'] as $k=>$image) {
                if (!empty($image['image'])) {

                    $imgFileName= ResizeImage::getFileName($image['image']);

                    // $image['image']->move(base_path('public/images'),$imgFileName);
                    // var_dump(die($image['image']));
                    ResizeImage::setLarge($imgFileName,$image['image']);
                    ResizeImage::setThumb($imgFileName,$image['image']);

                    // $image['image']->move(base_path('public/images'),$img);
                    // ResizeImage::setLarge($img);
                    // ResizeImage::setThumb($img);
                    $images[] = new Image(['image' => $imgFileName,
                                        'type' => $image['type']
                                        ]);
                }
                
            }
            

            if ($req['video360']) {

                $video360Code= ResizeImage::generateUniqueCode();

                $this->video360 = $video360Code;
                $this->save();

                $this->saveVideo360($req['video360']);


            }

            
            if ($req['video']) {
                $vid= ResizeImage::getFileName($req['video']);
                

                $path = $req['video']->storeAs($this->videoPath, $vid, 's3');
                Storage::disk('s3')->setVisibility($path, 'public');  

                // Storage::disk('s3')->put($this->videoPath.$vid , $request->file('video'), 'public');
    // 1        $request->video->move(base_path('public/videos'),$vid);
                $weddingRings[$key]->video = $vid;
                $weddingRings[$key]->save();
            }
            // dd(print_r($WeddingRings[$key]->video));

            $weddingRings[$key]->texts()->saveMany($texts);
            $weddingRings[$key]->images()->saveMany($images);
        }
        
        $published = array_filter( $published, function($data){ return $data == true ;} );
        // dd($published);

        if (count($published) > 0) {
            $weddingRingPair->published = 1;
        }else{
            $weddingRingPair->published = 0;
        }

        $weddingRingPair->save();        


        return response()
            ->json([
                'saved' => true
                ]);
    }

    public function edit($id)
    {
        $weddingRings = WeddingRingPair::with(['weddingRings','weddingRings.images','weddingRings.texts'])->findOrFail($id);

        return response()
            ->json([
                'form' =>$weddingRings->weddingRings,
                'option' => []
                ]);
    }

    public function update(Request $request, $id)
    {

            $this->validate($request, [
            '.*.stock'  => 'required| unique:wedding_rings',
            '.*.texts' => 'required',
            '.*.unit_price' => 'required | numeric |min:0',
            ]);

        $weddingRingPair = WeddingRingPair::with(['weddingRings','weddingRings.images','weddingRings.texts'])->findOrFail($id);

        // dd(print_r($weddingRingPair->weddingRings[0]->id));
        // dd(print_r($request->all()));

        // dd($weddingRingPair->published);
        $published = [0 => false, 1 => false];


        $requestAll = array_slice($request->all(),0,2);
        // dd(print_r($requestAll));


        foreach ($requestAll as $key=>$req) {

            if ($req['published'] == 1) {
                $published[$key] = true;
            }


                if (is_array($req)) {

                        $texts = [];
                        
                        // print_r($req);
                            foreach ($req['texts'] as $k=>$text) {
                                if (isset($text['content'])) {
                                    // dd(print_r($text));
                                    Text::where('textable_id', $weddingRingPair->weddingRings[$key]->id)
                                        ->where('textable_type', 'App\WeddingRing')
                                        ->where('locale', $text['locale'])
                                        ->update(['content' => $text['content']]);
                                }
                                
                            }
                    }
            // dd(print_r($texts));

            $images =[];

            // dd(print_r($req));
            if (!empty($req['images'])) {
                foreach ($req['images'] as $k=>$image) {
                if (!empty($image['id'])) {
                       if (!is_string($image['image'])&&!empty($image['image'])) {
                            $oImg= Image::where('id', $image['id'])->get()->toArray();
                            $imgFileName= ResizeImage::getFileName($image['image']);

                            // $image['image']->move(base_path('public/images'),$imgFileName);
                            // var_dump(die($image['image']));
                            ResizeImage::setLarge($imgFileName,$image['image']);
                            ResizeImage::setThumb($imgFileName,$image['image']);

                            Storage::disk('s3')->delete($this->imagePath .'/'. $oImg[0]['image']);
                            Storage::disk('s3')->delete($this->imagePath .'/thm-'. $oImg[0]['image']);

                            // $image['image']->move(base_path('public/images'),$img);
                            // ResizeImage::setLarge($img);
                            // ResizeImage::setThumb($img);
                            // File::delete(base_path('public/images/'. $oImg[0]['image']));
                            // File::delete(base_path('public/images/thm-'. $oImg[0]['image']));

                            Image::where('id', $image['id'])
                                ->update(['image' => $imgFileName]);
                        }   
                        Image::where('id', $image['id'])
                                ->update(['type' => $image['type']
                                            ]);

                    }else{
                        if (!empty($image['image'])){

                            $imgFileName= ResizeImage::getFileName($image['image']);

                            // $image['image']->move(base_path('public/images'),$imgFileName);
                            // var_dump(die($image['image']));
                            ResizeImage::setLarge($imgFileName,$image['image']);
                            ResizeImage::setThumb($imgFileName,$image['image']);


                            // $image['image']->move(base_path('public/images'),$img);
                            // ResizeImage::setLarge($img);
                            // ResizeImage::setThumb($img);

                            $images[] = new Image(['image' => $imgFileName,
                                        'type' => $image['type']
                                        ]);
                        }
                    }
                
                }
            }
            
            // dd(print_r($images));
            

            if (!empty($req['video']) && !is_string($req['video'])) {

                $vid= ResizeImage::getFileName($req['video']);

                if ($weddingRingPair->weddingRings[$key]->video) {
                    Storage::disk('s3')->delete($this->videoPath.'/'.$weddingRingPair->weddingRings[$key]->video);
                }
                
                $path = $req['video']->storeAs($this->videoPath, $vid, 's3');
                // dd($path);
                Storage::disk('s3')->setVisibility($path, 'public');  

                $weddingRingPair->weddingRings[$key]->video = $vid;
            }
            
                // dd(Arr::except($req,['texts','images','video']));
            $weddingRingPair->weddingRings[$key]->update(Arr::except($req,['texts','images','video']));
            $weddingRingPair->weddingRings[$key]->images()->saveMany($images);


            if (!empty($req['video360']) && !is_string($req['video360'])) {

                if (!$this->video360) {
                    $video360Code= ResizeImage::generateUniqueCode();

                    $this->video360 = $video360Code;
                    $this->save();
                }else{

                    Storage::disk('s3')->deleteDirectory($this->video360Path .'/'. $this->video360);
                        // dd('deleted');                
                }

                $this->saveVideo360($req['video360']);

            }


        }

        $published = array_filter( $published, function($data){ return $data == true ;} );
        // dd($published);

        if (count($published) > 0) {
            $weddingRingPair->published = 1;
        }else{
            $weddingRingPair->published = 0;
        }

        $weddingRingPair->save();        


        return response()
            ->json([
                'saved' => true
                ]);
    }

    public function destroy($id)
    {

        $weddingRingPair = WeddingRingPair::with(['weddingRings','weddingRings.images','weddingRings.texts'])->findOrFail($id);

        foreach ($weddingRingPair->weddingRings as $key => $weddingRing) {

            foreach ($weddingRing->images as $k=>$image) {
                $oImg= Image::where('id', $image['id'])->get()->toArray();

                Storage::disk('s3')->delete($this->imagePath .'/'. $oImg[0]['image']);
                Storage::disk('s3')->delete($this->imagePath .'/thm-'. $oImg[0]['image']);

                // File::delete(base_path('public/images/'. $oImg[0]['image']));
                // File::delete(base_path('public/images/thm-'. $oImg[0]['image']));

                Image::where('id', $image['id'])
                    ->delete();
            }
            
            Text::where('textable_id', $weddingRing->id)
                        ->where('textable_type', 'App\WeddingRing')
                        ->delete();


            if ($weddingRingPair->weddingRings[$key]->video) {
                Storage::disk('s3')->delete($this->videoPath.'/'.$weddingRingPair->weddingRings[$key]->video);
            }
            
            // File::delete(base_path('public/videos/'. $weddingRing->video));
            $weddingRing->delete();
            

        }

        $weddingRingPair->delete();
        
        return response()
            ->json([
                'deleted' => true
                ]);
    }

    public function saveVideo360($video360){
        
        $sorted = array_values(Arr::sort($video360, function ($value) {
                    return $value['name'];
        }));

        foreach ($sorted as $key => $video360File) {

            if (!empty($video360File['path'])) {
                // dd($video360File);
                // $pos = stripos($video360File['name'] , '.jpg');
                // $pos = intval( substr($video360File['name'], $pos-3, -4)) -1;
                $this->saveSequentImages($this->video360, $video360File['path'], $key);

            }
        }

    }

    public function saveSequentImages($folderName, $file,$key){
        ResizeImage::setBase64ImageToThumb($folderName,$file,$key);
        ResizeImage::setBase64ImageToLarge($folderName,$file,$key);

    } 
}
