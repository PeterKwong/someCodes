<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvDiamond;
use App\Models\Jewellery;
use App\Support\ResizeImage;

class JewelleryController extends Controller
{

     public function bladeIndex($locale)
    {

      return view('frontend.jewellery.index');
 
    }

    public function admIndex(){
        return response()

        ->json([
            'model' =>Jewellery::with('texts')->filterPaginateOrder()
            ]);
    }

    public function admShow($id){
        $jewellery = Jewellery::with(['images','texts'])->findOrFail($id);

        return response()
            ->json([
                'model' => $jewellery
                ]);
    }

    public function admBladeIndex(){

        return view('backEnd.jewellery.index');

    }

    public function admBladeShow(){

        return view('backEnd.jewellery.show');

    }

    public function admBladeForm(){

        return view('backEnd.jewellery.form');

    }


     public function index()
    {
    	return response()
            ->json([
                'model' =>Jewellery::where('published',1)->orderBy('created_at','desc')->SearchPaginateAndOrder()
                ]);
    }

    public function create()
    {
    	return response()
    		->json([
    			'form' =>Jewellery::form(),
    			'option' =>Jewellery::orderBy('id', 'desc')->first(['id'])
    		]);	
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'stock'  => 'required',
            'texts' => 'required',
            'unit_price' => 'required | numeric |min:0',
    		]);

        $jewellery = Jewellery::create($request->except(['video','texts','images','video360']));

        return $jewellery->storeItem($request);
        
    }

      protected function getFileName($file)
    {
            return str_random(). '.' .$file->extension();
    }


    public function bladeShow($locale, $id)
    {

     $meta = Jewellery::with(['texts'=>function($texts){
                    $texts->where('locale',app()->getLocale());
                }])->findOrFail($id);
     $jewellery = $meta;
     $title = $meta->title();
     $tags = $meta->tags();


      return view('frontend.jewellery.show', compact('meta','title','tags','jewellery'));
 
    }

    public function show($id)
    {
        
        $jewellery = Jewellery::where('published',1)->with(['images','texts'])->findOrFail($id);
        $posts = Jewellery::where('published',1)->findOrFail($id)->invoices()->with(
                    ['invoicePosts'=>function($inv){
                                    return $inv->where('published',1);},
                    'invoicePosts.images','invoicePosts.texts'])->orderBy('created_at','desc')->get();

        $invoicePosts = [];

        // dd(count($posts)); 
        
        
        foreach ($posts as $p ) {
            if (isset($p->invoicePosts[0])) {
                $invoicePosts['invoicePosts'][] = $p->invoicePosts[0];
            }
        }

        return response()
            ->json([
                'model' => $jewellery,
                'posts' => $invoicePosts,
                ]);

    }

    public function edit($id)
    {
    	$jewellery = Jewellery::with(['images','texts'])->findOrFail($id);

    	return response()
    		->json([
    			'form' =>$jewellery,
    			'option' => []
    			]);
    }

    public function update(Request $request, $id)
    {
    	    $this->validate($request, [
            'stock'  => 'required',
            'texts' => 'required',
            'unit_price' => 'required | numeric |min:0',
            ]);
    	$jewellery = Jewellery::with(['images','texts'])->findOrFail($id);

        return $jewellery->updateItem($request,'App\Jewellery');
       
    }

    public function destroy($id)
    {

        $jewellery = jewellery::with(['images','texts'])->findOrFail($id);

        return $jewellery->destroyItem('App\Jewellery');

    }

    public function ring($locale)
    {


      return view('frontend.jewellery.ring');
 
    }

    public function diamondRing($locale)
    {


      return view('frontend.jewellery.diamondRing');
 
    }

    public function fancyDiamondRing($locale)
    {


      return view('frontend.jewellery.fancyDiamondRing');
 
    }

    public function necklace($locale)
    {


      return view('frontend.jewellery.necklace');
 
    }

    public function earring($locale)
    {


      return view('frontend.jewellery.earring');
 
    }

    public function bracelet($locale)
    {


      return view('frontend.jewellery.bracelet');
 
    }

    public function pendant($locale)
    {


      return view('frontend.jewellery.pendant');
 
    }

}
