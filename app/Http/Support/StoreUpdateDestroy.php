<?php

namespace App\Support;

use File;
use App\Text;
use App\Image;
use App\Support\ResizeImage;
use Illuminate\Support\Facades\Storage;

trait StoreUpdateDestroy{

    public $videoPath = 'public/videos';
    public $video360Path = 'public/video360';
    public $imagePath = 'public/images';

	public function storeItem($request, $sizeTypes = []){
		
		$texts = [];
        
        foreach ($request->texts as $text) {
            if (!empty($text['content'])) {
                $txt = new Text($text);
                $texts [] = $txt;
            }
        }
        $this->texts()->saveMany($texts);
        
        $images =[];
        
        foreach ($request->images as $image) {
            if (!empty($image['image'])) {
                $imgFileName= ResizeImage::getFileName($image['image']);

                // $image['image']->move(base_path('public/images'),$imgFileName);
                // var_dump(die($image['image']));
                
                $this->saveImageToDifferentSizes($imgFileName, $image, $sizeTypes);

                // File::delete(base_path('public/images/'. $imgFileName ) );

                $images[] = new Image(['image' => $imgFileName,
                                        'type' => $image['type']
                                        ]);
            }
        }
        $this->images()->saveMany($images);        

        // dd($texts);
        if ($request->video) {
            $vid= ResizeImage::getFileName($request->video);

            $path = $request->video->storeAs($this->videoPath, $vid, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');  
            
            // Storage::disk('s3')->put($this->videoPath.$vid , $request->file('video'), 'public');
            // $request->video->move(base_path('public/videos'),$vid);
            $this->video = $vid;
            $this->save();
        }
        // dd(print_r($this->video));





    	return response()
    		->json([
    			'saved' => true
    			]);

	}

	public function updateItem($request, $type, $sizeTypes = []){
		
        // dd(print_r($request->all()));

        if (request('texts')) {
            foreach ($request->texts as $k=>$text) {
                if (isset($text['content'])) {
                    // dd(print_r($text));
                    Text::where('textable_id', $this->id)
                        ->where('textable_type', $type)
                        ->where('locale', $text['locale'])
                        ->update(['content' => $text['content']]);
                }
            }
        }

        $images =[];
        if (request('images')) {
            foreach ($request->images as $k=>$image) {
                // print_r($image);
                if (!empty($image['id'])) {
                    if (!empty($image['image'])) {
                        if (!is_string($image['image'])) {
                            $oriImg= Image::where('id', $image['id'])->get()->toArray();
                            $imgFileName= ResizeImage::getFileName($image['image']);

                            $this->saveImageToDifferentSizes($imgFileName, $image, $sizeTypes);
                            // $image['image']->move(base_path('public/images'),$imgFileName);
                            // var_dump(die($image['image']));
                            
                            $this->deleteAllSizeImages($oriImg);               

                            // File::delete(base_path('public/images/'. $oriImg[0]['image']));
                            // File::delete(base_path('public/images/thm-'. $oriImg[0]['image']));

                            Image::where('id', $image['id'])
                                ->update(['image' => $imgFileName,]);
                        }
                        Image::where('id', $image['id'])
                                ->update(['type' => $image['type']
                                            ]);
                    }

                }else{
                    if (!empty($image['image'])){
                        $imgFileName= ResizeImage::getFileName($image['image']);
                            
                        $this->saveImageToDifferentSizes($imgFileName, $image, $sizeTypes);

                        $images[] = new Image(['image' => $imgFileName,
                                        'type' => $image['type']
                                        ]);
                    }
                }
            }
            
        }
        


        if ($request->hasFile('video')) {
            $vid= ResizeImage::getFileName($request->video);

            Storage::disk('s3')->delete($this->videoPath.$this->video);
            $path = $request->video->storeAs($this->videoPath, $vid, 's3');
            // dd($path);
            Storage::disk('s3')->setVisibility($path, 'public');   

            $this->video = $vid;
        }

    	$this->update($request->except(['texts','images','video']));
        $this->images()->saveMany($images);

    	return response()
    		->json([
    			'saved' => true
    			]);


	}

	public function destroyItem($type){
		
        foreach ($this->images as $k=>$image) {
            $oriImg= Image::where('id', $image['id'])->get()->toArray();

            $this->deleteAllSizeImages($oriImg);

            Image::where('id', $image['id'])
                ->delete();
        }

        Text::where('textable_id', $this->id)
                    ->where('textable_type', $type)
                    ->delete();
        
        // File::delete(base_path('public/videos/'. $this->video));
        Storage::disk('s3')->delete($this->videoPath .'/'.$this->video);
        
    	$this->delete();

        
    	return response()
    		->json([
    			'deleted' => true
    			]);

	}

    public function saveImageToDifferentSizes($imgFileName, $image, $sizeTypes){
        
        ResizeImage::setLarge($imgFileName,$image['image']);
        ResizeImage::setThumb($imgFileName,$image['image']);

        foreach ($sizeTypes as $sizeType) {
            ResizeImage::$sizeType($imgFileName,$image['image']);
        }
    }

    public function deleteAllSizeImages($oriImg){

        Storage::disk('s3')->delete($this->imagePath .'/'. $oriImg[0]['image']);
        Storage::disk('s3')->delete($this->imagePath .'/thm-'. $oriImg[0]['image']);
        Storage::disk('s3')->delete($this->imagePath .'/sq-'. $oriImg[0]['image']);
    }


}