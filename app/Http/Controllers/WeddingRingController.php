<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use App\Support\WeddingRingFilter;
use App\Models\WeddingRing;

class WeddingRingController extends Controller
{
    public function index()
    {
    	return response()
    		->json([
    			'model' =>WeddingRing::orderBy('created_at','desc')->FilterPaginateOrder()
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
            'stock'  => 'required',
            'texts' => 'required',
            'unit_price' => 'required | numeric |min:0',
            ]);
        
        // dd($request->all());

        $weddingRing = WeddingRing::create($request->except(['video','texts','images']));

        $images =[];

 
        foreach ($request->images as $image) {
            $img= ResizeImage::getFileName($image);
            $image->move(base_path('public/images'),$img);
            $images[] = new Image(['image' => $img,
                                        'type' => $image['type']
                                        ]);
        }

        $texts = [];
        foreach ($request->texts as $text) {
            $txt = new Text($text);
            $texts [] = $txt;
        }

        // dd($texts);
        if ($request->video) {
            $vid= ResizeImage::getFileName($request->video);
            $request->video->move(base_path('public/videos'),$vid);
            $weddingRing->video = $vid;
            $weddingRing->save();
        }
        // dd(print_r($WeddingRing->video));

        $weddingRing->texts()->saveMany($texts);
        $weddingRing->images()->saveMany($images);
        


        return response()
            ->json([
                'saved' => true
                ]);
    }

      protected function getFileName($file)
    {
            return str_random(). '.' .$file->extension();
    }

    public function show($id)
    {
    	$WeddingRing = WeddingRing::findOrFail($id);

    	return response()
    		->json([
    			'model' => $WeddingRing
    			]);
    }

    public function edit($id)
    {
    	$WeddingRing = WeddingRing::findOrFail($id);

    	return response()
    		->json([
    			'form' =>$WeddingRing,
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
    	$WeddingRing = WeddingRing::findOrFail($id);

        // dd($request->all());
        $cover ='';
         if ($request->hasFile('cover')) {
            $cover = $this->getFileName($request->cover);
            $request->cover->move(base_path('public/images'), $cover);
            File::delete(base_path('public/images/'. $WeddingRing->cover));
            $WeddingRing->cover = $cover;
        }
        

        $image1= '';
        if ($request->hasFile('image1')) {
            $image1 = $this->getFileName($request->image1);
            $request->image1->move(base_path('public/images'), $image1);
            File::delete(base_path('public/images/'. $WeddingRing->image1));
            $WeddingRing->image1 = $image1;
        }
        
        
    	$WeddingRing->update($request->except(['cover','image1']));

    	return response()
    		->json([
    			'saved' => true
    			]);
    }

    public function destroy($id)
    {
    	$WeddingRing = WeddingRing::findOrFail($id);

        File::delete(base_path('public/images/'. $WeddingRing->cover));
        File::delete(base_path('public/images/'. $WeddingRing->image1));
        
    	$WeddingRing->delete();

    	return response()
    		->json([
    			'deleted' => true
    			]);
    }
}
