<?php
namespace App\Support;
use Image;
use Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Intervention\Image\Exception\NotReadableException;

trait ResizeImage{

	// protected $filename = 'test.jpg';
	// protected $percent = 0.5;
	// File and new size
	
	protected $imageLocation = 'public/images/';

	

	public static function getFileName($file)
    {
        return self::generateUniqueCode() . '.' .$file->extension();
    }


	public static function generateUniqueCode()
    {
    	// dd(Carbon::now()->toDateString().'_' . Str::random());
        return Carbon::now()->toDateString().'_' . Str::random();
    }

	public static function crop16to9($file){
		$targetFile = $file;
		
		$new = imagecreatefromjpeg(base_path('public/images/') . $targetFile);

	    $crop_width = imagesx($new);
	    $crop_height = imagesy($new);
	                
	            $size = min($crop_width, $crop_height);
	            
	            
	            if($crop_width >= $crop_height) {
	            $newx= ($crop_width-$crop_height)/2;
	            
	            $im2 = imagecrop($new, ['x' => $newx, 'y' => 0, 'width' => $size, 'height' => $size]);
	            }
	            else {
	                $newy= ($crop_height-$crop_width)/2;
	            
	                $im2 = imagecrop($new, ['x' => 0, 'y' => $newy, 'width' => $size, 'height' => $size]);
	                }
	            
	                
	    return imagejpeg($im2,base_path('public/images/') .'sq-'. $targetFile,90);
	}

	public static function toSquare($file, $content){

		$targetFile = $file;

		// $content = base_path('public/images/') . $targetFile;
		
		// dd($file);

		Image::configure(array('driver' => 'imagick'));

		$width = Image::make($content)->width();
		$height = Image::make($content)->height();
		$x = null;
		$y = null;

		// $img = Image::make($content)->resize(400,null, function ($constraint) {
  		//   				$constraint->aspectRatio(); 
		// 		});
		if ($width >= $height) {
			$x = round(($width - $height)/2);
			$width = $height;
		}else{
			$y = round(($height - $width)/2);			
			$height = $width;
		}

		$img =(String) Image::make($content)->crop($width,$height,$x,$y )->encode('jpg');

		// 将处理后的图片重新保存到其他路径

		// $img->save(base_path('public/images/') .'thm-'. $targetFile);
		Storage::disk('s3')->put('public/images/' . 'sq-'.$targetFile, $img, 'public');		


		// $manager = new ImageManager(array('driver' => 'imagick'));
	}


	public function resize($filename,$percent ){
		// Content type
		header('Content-Type: image/jpeg');

		// Get new sizes
		list($width, $height) = getimagesize($filename);
		$newwidth = $width * $percent;
		$newheight = $height * $percent;

		// Load
		$thumb = imagecreatetruecolor($newwidth, $newheight);
		$source = imagecreatefromjpeg($filename);

		// Resize
		imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		// Output
		imagejpeg($thumb);

		}

	public static function cropCenter($file){

		$targetFile = $file;

		$content = base_path('public/images/') . $targetFile;
		
		Image::configure(array('driver' => 'imagick'));

		// $img = Image::make($content)->fit(400);

		// $img->save(base_path('public/images/') .'sq-'. $targetFile);

		$img =(String) Image::make($content)->fit(400)->encode('jpg');

		Storage::disk('s3')->put('public/images/sq-' .$targetFile, $img, 'public');		
		
	}

	public static function setLarge($file, $content){

		$targetFile = $file;

		// $content = base_path('public/images/') . $targetFile;

		Image::configure(array('driver' => 'imagick'));

		$maxWidth = Image::make($content)->width();

		if ($maxWidth > 1100) {
			// $img = Image::make($content)->resize(1100,null, function ($constraint) {
			// 	$constraint->aspectRatio(); 
			// });

			$img =(String) Image::make($content)->resize(1100,null, function ($constraint) {
				$constraint->aspectRatio(); 
			})->encode('jpg');

		}else{
			// $img = Image::make($new)->resize($maxWidth,null, function ($constraint) {
			// 	$constraint->aspectRatio(); 
			// });

			$img =(String) Image::make($content)->resize($maxWidth,null, function ($constraint) {
				$constraint->aspectRatio(); 
			})->encode('jpg');
		}

		// 将处理后的图片重新保存到其他路径
		// $img->save(base_path('public/images/'). $targetFile);

		Storage::disk('s3')->put('public/images/' .$targetFile, $img, 'public');		

		// $manager = new ImageManager(array('driver' => 'imagick'));
		
	}

	public static function setThumb($file, $content){

		$targetFile = $file;

		// $content = base_path('public/images/') . $targetFile;
		
		// Image::configure(array('driver' => 'imagick'));

		// $img = Image::make($content)->resize(400,null, function ($constraint) {
  		//   				$constraint->aspectRatio(); 
		// 		});

		$img =(String) Image::make($content)->resize(400,null, function ($constraint) {
			$constraint->aspectRatio(); 
		})->encode('jpg');

		// 将处理后的图片重新保存到其他路径

		// $img->save(base_path('public/images/') .'thm-'. $targetFile);
		Storage::disk('s3')->put('public/images/' . 'thm-'.$targetFile, $img, 'public');		


		// $manager = new ImageManager(array('driver' => 'imagick'));
		
	}

	public static function setBase64ImageToThumb($folderName, $content, $key){

		$targetFile = $folderName;

		$image = str_replace('data:image/jpeg;base64,', '', $content);
        $content = str_replace(' ', '+', $image);
		


		$img =(String) Image::make($content)->resize(400,null, function ($constraint) {
			$constraint->aspectRatio(); 
		})->encode('jpg');

		
		Storage::disk('s3')->put('public/video360/' .$targetFile. '/thm-'.$key . '.jpg', $img, 'public');		


	}

	public static function setBase64ImageToLarge($folderName, $content, $key){

		$targetFile = $folderName;

		$image = str_replace('data:image/jpeg;base64,', '', $content);
        $content = str_replace(' ', '+', $image);
		

		$maxWidth = Image::make($content)->width();

		if ($maxWidth > 1100) {
			// $img = Image::make($content)->resize(1100,null, function ($constraint) {
			// 	$constraint->aspectRatio(); 
			// });

			$img =(String) Image::make($content)->resize(1100,null, function ($constraint) {
				$constraint->aspectRatio(); 
			})->encode('jpg');

		}else{
			// $img = Image::make($new)->resize($maxWidth,null, function ($constraint) {
			// 	$constraint->aspectRatio(); 
			// });

			$img =(String) Image::make($content)->resize($maxWidth,null, function ($constraint) {
				$constraint->aspectRatio(); 
			})->encode('jpg');
		}


		
		Storage::disk('s3')->put('public/video360/' .$targetFile. '/'.$key . '.jpg', $img, 'public');		


	}

	public static function spaceImage($content,$filename,$maxWidth,$thmWidthSize=0,$path='/public/images/'){
		
		Image::configure(array('driver' => 'imagick'));
					// dd(print_r($content));
		 // dd(Image::make($content)->mime());
		$error = 1;

		try {
			$imageWidth = Image::make($content)->width();
		} catch (NotReadableException $e) {
			return $error =0;
		}


		// $waterMark = Image::make(base_path('public/front_end/company/logo_PNG_sq_60x60_1.png'));
		// dd($waterMark);

		if ($imageWidth > $maxWidth) {
			$img =(String) Image::make($content)->resize($maxWidth,null, function ($constraint) {
				$constraint->aspectRatio(); 
			})->encode('jpg');
			// $img->insert($waterMark, 'bottom-right');
		}else{
			$img =(String) Image::make($content)->resize($imageWidth,null, function ($constraint) {
				$constraint->aspectRatio(); 
			})->encode('jpg');
			// $img->insert($waterMark, 'bottom-right');
		}
			// dd($img);

		Storage::disk('s3')->put($path.$filename.'.jpg', $img, 'public');

		// $fileExisted = Storage::disk('s3')->exists($path.$filename.'.jpg') ;
		// if (!$fileExisted) {
		// 	$error = 1;
		// }

		//save thumb image
		if ($thmWidthSize != 0) {
			$img = (String) Image::make($content)->resize($thmWidthSize ,null, function ($constraint) {
				$constraint->aspectRatio(); })->encode('jpg');
			// $img = header('Content-Type: image/'.$img->mime());
			// dd($img);

			Storage::disk('s3')->put($path . 'thm-'.$filename.'.jpg', $img, 'public');
		}

		// $fileExisted = Storage::disk('s3')->exists($path. 'thm-'.$filename.'.jpg') ;
		// if (!$fileExisted) {
		// 	$error = 1;
		// }

		return $error;

	}


	

}
?>