<?php

namespace App\Http\Controllers;

use App\Http\Support\CronJob;
use App\Http\Support\DiamondImport;
use App\Mail\Appointment;
use App\Models\Customer;
use App\Models\Diamond;
use App\Models\EngagementRing;
use App\Models\Image;
use App\Models\Invoice;
use App\Models\InvoiceDiamond;
use App\Models\InvoiceItem;
use App\Models\InvoicePost;
use App\Models\Jewellery;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class TestController extends Controller
{

    public function test(){
    	// dd( config('global.paymentMode'));
	    // return $this->postTags();
	    return $this->resetAllDiamonds();

	    return $this->oncall();
	    // return $this->copyAWS();
	    // return $this->bigSitemap();

		return response()
			->json(
			['sent' => true]
		);

    }
    public function copyAWS(){
    	// $images = Image::all();

    	foreach (range(1000, 4000) as $key => $image) {
    		// $file = Storage::disk('s3')->get('public/images/'.$image->image);
    		// dd($file);
	    	$file = Storage::disk('s3')->delete('public/images/'.$image.'.jpg');  
	    	// $file = Storage::disk('s3')->setVisibility('public/images/'.$image->id.'.jpg', 'public');  
	    	// dd('done');
    	}
    }
    public function bigSitemap(){
    	
	// use Illuminate\Support\Facades\Cache;
	// create new sitemap object
	$sitemap = app()->make('sitemap');

	$sitemap->setCache('tingdiamond.sitemap', 10);

	// dd($diamonds);
	// counters
	// $counter = 0;
	// $sitemapCounter = 0;

	$translations = [
			['language' => 'en', 'url' => url()->to('/en/')],
			['language' => 'zh-Hant', 'url' => url()->to('/hk/')],
			['language' => 'zh-Hans', 'url' => url()->to('/cn/')],
		];


	cache()->put('sitemap.sitemapCounter', 0);


	$pages = DB::table('pages')->orderBy('created_at', 'desc')
		->chunk(1000,function($pages) use (&$sitemap,$translations){

			// $counter = cache()->get('sitemap.counter');
			$sitemapCounter = cache()->get('sitemap.sitemapCounter');
				// add every product to multiple sitemaps with one sitemap index
				foreach ($pages as $p) {

					foreach ($translations as $trans) {

						$sitemap->add($trans['url'] . '/' . $p->url, now(), '0.9', 'daily');

					}

					// count number of elements
						// dd($sitemap);
				}
			
			// dd($sitemap->model->getItems());

			// dd($sitemap);
			$sitemap->store('xml', 'vendor/sitemap/pages/sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('vendor/sitemap/pages/sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			// $counter = 0;
			// count generated sitemap

			cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


	});

	cache()->put('sitemap.sitemapCounter', 0);


	$engagementRings = DB::table('engagement_rings')->where('published',1)->orderBy('created_at', 'desc')
		->chunk(1000,function($engagementRings) use (&$sitemap,$translations){

			// $counter = cache()->get('sitemap.counter');
			$sitemapCounter = cache()->get('sitemap.sitemapCounter');
				// add every product to multiple sitemaps with one sitemap index
				foreach ($engagementRings as $p) {

					foreach ($translations as $trans) {

						$sitemap->add($trans['url'] . '/engagement-rings/' . $p->id, now(), '0.8', 'daily');

					}

					// count number of elements
						// dd($sitemap);
				}
			
			// dd($sitemap->model->getItems());

			// dd($sitemap);
			$sitemap->store('xml', 'vendor/sitemap/engagement-rings/sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('vendor/sitemap/engagement-rings/sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			// $counter = 0;
			// count generated sitemap

			cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


	});

	cache()->put('sitemap.sitemapCounter', 0);

	$weddingRings = DB::table('wedding_rings')->where('published',1)->orderBy('created_at', 'desc')
		->chunk(1000,function($weddingRings) use (&$sitemap,$translations){

			// $counter = cache()->get('sitemap.counter');
			$sitemapCounter = cache()->get('sitemap.sitemapCounter');
				// add every product to multiple sitemaps with one sitemap index
				foreach ($weddingRings as $p) {

					foreach ($translations as $trans) {

						$sitemap->add($trans['url'] . '/wedding-rings/' . $p->id, now(), '0.8', 'daily');

					}

					// count number of elements
						// dd($sitemap);
				}
			
			// dd($sitemap->model->getItems());

			// dd($sitemap);
			$sitemap->store('xml', 'vendor/sitemap/wedding-rings/sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('vendor/sitemap/wedding-rings/sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			// $counter = 0;
			// count generated sitemap

			cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


	});

	cache()->put('sitemap.sitemapCounter', 0);


	$jewelleries = DB::table('jewelleries')->where('published',1)->orderBy('created_at', 'desc')
		->chunk(1000,function($jewelleries) use (&$sitemap,$translations){

			// $counter = cache()->get('sitemap.counter');
			$sitemapCounter = cache()->get('sitemap.sitemapCounter');
				// add every product to multiple sitemaps with one sitemap index
				foreach ($jewelleries as $p) {

					foreach ($translations as $trans) {

						$sitemap->add($trans['url'] . '/jewelleries/' . $p->id, now(), '0.8', 'daily');

					}

					// count number of elements
						// dd($sitemap);
				}
			
			// dd($sitemap->model->getItems());

			// dd($sitemap);
			$sitemap->store('xml', 'vendor/sitemap/jewelleries/sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('vendor/sitemap/jewelleries/sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			// $counter = 0;
			// count generated sitemap

			cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


	});

	cache()->put('sitemap.sitemapCounter', 0);

	$customerPosts = DB::table('invoice_posts')->where('published',1)->orderBy('created_at', 'desc')
		->chunk(1000,function($customerPosts) use (&$sitemap,$translations){

			// $counter = cache()->get('sitemap.counter');
			$sitemapCounter = cache()->get('sitemap.sitemapCounter');
				// add every product to multiple sitemaps with one sitemap index
				foreach ($customerPosts as $p) {

					foreach ($translations as $trans) {

						$sitemap->add($trans['url'] . '/customer-posts/' . $p->id, now(), '0.8', 'daily');

					}

					// count number of elements
						// dd($sitemap);
				}
			
			// dd($sitemap->model->getItems());

			// dd($sitemap);
			$sitemap->store('xml', 'vendor/sitemap/customer-posts/sitemap-' . $sitemapCounter);
			// add the file to the sitemaps array
			$sitemap->addSitemap(secure_url('vendor/sitemap/customer-posts/sitemap-' . $sitemapCounter . '.xml'));
			// reset items array (clear memory)
			$sitemap->model->resetItems();
			// reset the counter
			// $counter = 0;
			// count generated sitemap

			cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


	});

	cache()->put('sitemap.sitemapCounter', 0);

		// $pages = DB::table('pages')
  //               ->orderBy('updated_at','desc')
  //                   ->get();

  //       if ($pages != '') {
  //       	foreach ($translations as $translation ) {

		// 		foreach ($pages as $page ) {
		// 		$sitemap->add(secure_url($translation['url'] .'/'. $page->url), now(), '0.9', 'daily', [], null, $translations);
		// 		}
		// 	}

  //       }
		// generate new sitemapindex that will contain all generated sitemaps above


		// // get all diamonds from db (or wherever you store them)
		// $diamonds = DB::table('diamonds')->whereAvailable(1)->orderBy('created_at', 'desc')
		// 	->chunk(1000,function($diamonds) use (&$sitemap,$translations){

		// 		// $counter = cache()->get('sitemap.counter');
		// 		$sitemapCounter = cache()->get('sitemap.sitemapCounter');
		// 			// add every product to multiple sitemaps with one sitemap index
		// 			foreach ($diamonds as $p) {

		// 				foreach ($translations as $trans) {

		// 					$sitemap->add($trans['url'] . '/gia-loose-diamonds/' . $p->id, $p->updated_at, '0.5', 'monthly');

		// 				}

		// 				// count number of elements
		// 					// dd($sitemap);
		// 			}
				
		// 		// dd($sitemap->model->getItems());

		// 		// dd($sitemap);
		// 		$sitemap->store('xml', 'vendor/sitemap/big-sitemap/diamonds/sitemap-' . $sitemapCounter);
		// 		// add the file to the sitemaps array
		// 		$sitemap->addSitemap(secure_url('vendor/sitemap/big-sitemap/diamonds/sitemap-' . $sitemapCounter . '.xml'));
		// 		// reset items array (clear memory)
		// 		$sitemap->model->resetItems();
		// 		// reset the counter
		// 		// $counter = 0;
		// 		// count generated sitemap

		// 		cache()->put('sitemap.sitemapCounter', $sitemapCounter + 1);


		// });
		
		$sitemap->addSitemap(secure_url('vendor/sitemap/diamonds/sitemap.xml'));

		$sitemap->store('sitemapindex', 'sitemap_index');


		return redirect('sitemap_index.xml');

    }
    public function crawlCScr(){

      $diamonds = Diamond::where('available',1)->where('has_cert',1)->where('cert_cache', NULL)->chunk(500, function($diams){
            
            foreach ($diams as $dia) {
            	$url = file_get_contents('https://www.diamondselections.com/GetCertificate.aspx?diamondid=124152814');

            	dd(strpos($url, ' src="'));
                $dia->loadCachedCert();
              // dd($dia->id);
            }  

            // sleep($this->sleepSeconds);

      });


      return 1;

    }
    public function oncall(){

  		// dd('tests');

      $import = new DiamondImport();
      return $import->importOncallHoldDiamond(1389415018,"TEST");
      // return $import->importOncallHoldDiamond(1389415018,"");
      



      return 'reset images';

    }
    public function resetAllDiamonds(){


      // return $predis->get('batchNumber');
      // return $this->resetAllDiamonds2days();

      // return $import->resetAllRapDiamonds();

      // return;

      $cron = new CronJob();
      return $cron->runImportDiamondAPIPerBatch();      

      // $import = new DiamondImport();
      // return $import->deleteAllDiamonds();

      $import = new DiamondImport();
      // return $import->importFancyDiamondFromAPI_1000_PerBatch(1);
      // return Cache::get('batchNumber');
      return $import->getDiamondsFromSunrise();
      // return $import->preloadCerts();
      // return $import->preloadImages();

      // $import = new DiamondImport();
      // return $import->resetAllApiDiamonds();  

      



      return 'reset images';

    }
    public function postTags(){

    	$invoicePosts = InvoicePost::with('invoice.invoiceDiamonds','invoice.engagementRings','invoice.weddingRings','invoice.jewelleries')->get();


    	foreach ($invoicePosts as $post) {


    		$page = Page::create(['url' => 'customer-jewellery/'.$post->id ,'paginable_id' => $post->id , 'paginable_type' => 'App\Models\InvoicePost']);
    		$postType = $post->postable_type;
	    	// dd($postType);

    		$post = $post->invoice;
	    	$tags = [];

	    	if ($postType == 'App\Models\Jewellery') {
	    		foreach ($post->jewelleries as $jewellery) {

	    				// dd($jewellery);

	    			if ($jewellery->type != 'Misc') {


	    				// dd($jewellery);
		    			// $diamond->weight = $diamondWeight;

		    			$columns = [ 104 =>'type', 105 => 'gemstone',106 =>'metal', ];

		    			foreach ($columns as $key => $column) {

		    			// dd($key);

		    				$tag = Tag::where('type','Jewellery')
		    							->where('upper_id', $key )
		    							->where('content',$jewellery->{$column} )->first();

		    				if (isset($tag['id'])) {
		    					$tags[] = $tag['id'] ;
		    				}
		    			}
		    			// dd($tags);
		    			
	    			}

	    			
	    		}
	    	}

	    	if ($postType == 'App\Models\WeddingRing') {
	    		foreach ($post->weddingRings as $weddingRing) {

	    				// dd($engagementRing);

	    			if ($weddingRing->shape) {


	    				// dd($engagementRing);
		    			// $diamond->weight = $diamondWeight;

		    			$columns = [ 78 =>'shape', 79 =>'finish', 80 => 'metal', 81 =>'style', 82 =>'brand', 83 =>'origin',  ];

		    			foreach ($columns as $key => $column) {

		    			// dd($key);

		    				$tag = Tag::where('type','Wedding Ring')
		    							->where('upper_id', $key )
		    							->where('content',$weddingRing->{$column} )->first();

		    				if ($column == 'sideStone') {

			    				$tag = Tag::where('type','Wedding Ring')
			    							->where('upper_id', $key )
			    							->where('content',$weddingRing->{$column} ? 'sideStone': 'No Side-stone' )->first();
		    				}

		    				if (isset($tag['id'])) {
		    					$tags[] = $tag['id'] ;
		    				}
		    			}
		    			// dd($tags);
		    			
	    			}

	    			
	    		}
	    	}

	    	if ($postType == 'App\Models\EngagementRing') {

	    		foreach ($post->engagementRings as $engagementRing) {

	    				// dd($engagementRing);

	    			if ($engagementRing->prong) {


	    				// dd($engagementRing);
		    			// $diamond->weight = $diamondWeight;

		    			$columns = [ 67 =>'style', 68 =>'shoulder', 69 => 'prong' ];

		    			foreach ($columns as $key => $column) {

		    			// dd($key);

		    				$tag = Tag::where('type','Engagement Ring')
		    							->where('upper_id', $key )
		    							->where('content',$engagementRing->{$column} )->first();

		    				if (isset($tag['id'])) {
		    					$tags[] = $tag['id'] ;
		    				}
		    			}
		    			// dd($tags);
		    			
	    			}

	    			
	    		}

	    		
	    		foreach ($post->invoiceDiamonds as $diamond) {

	    			if ($diamond->weight) {
	    				$weights = [
	    							[ 'value' =>0.3, 'range' => '0.3-0.49'],
									[ 'value' =>0.5, 'range' => '0.5-0.79'],
									[ 'value' =>0.8, 'range' => '0.8-0.99'],
									[ 'value' =>1, 'range' => '1.0-1.19'],
									[ 'value' =>1.2, 'range' => '1.2-1.49'],
									[ 'value' =>1.5, 'range' => '1.5-1.99'],
									[ 'value' =>2, 'range' => '2.0-2.99'],
									[ 'value' =>3, 'range' => '3.0up'],
									];

	    				$diamondWeight ;

	    				foreach ($weights as $w => $weight) {
	    				// dd(floatval($diamond->weight));
	    					if ( floatval($diamond->weight) >= $weight['value']) {
	    						$diamondWeight = $weight['range'];
	    							// dd($diamond->weight);
	    					}
	    					    						// $wei[] = $w;

	    				}

	    				// dd($diamond);
		    			$diamond->weight = $diamondWeight;

		    			$columns = [
		    						5 =>'weight', 6 =>'shape',7 => 'color', 8 => 'clarity',
		    						9 => 'cut', 10 => 'polish', 11 => 'symmetry', 12 => 'fluorescence'];

		    			foreach ($columns as $key => $column) {

		    			// dd($key);

		    				$tag = Tag::where('type','diamond')
		    							->where('upper_id', $key )
		    							->where('content',$diamond->{$column} )->first();

		    				if (isset($tag['id'])) {
		    					$tags[] = $tag['id'] ;
		    				}
		    			}
		    			// dd($tags);
		    			
	    			}
	    		}
	    	}


		    $page->tags()->sync($tags);


    		



    	}




    } 

    public function testView(){
    	
    	return view('frontend.test.index');
    }

    public function setCache(){
    	
    }


    public function invoiceItemsCopy(){
    	
    	$invoices = Invoice::with('weddingRings.texts')->get();
    	// $invoices = $invoices->jewelleries();
    	foreach ($invoices as $invoice) {
    		// dd($invoice);
	    	foreach ($invoice->weddingRings as $weddingRing) {
	            if (isset($weddingRing['id'])) {
	            $weddingRings[] = $weddingRing['id'];

	            $weddingRingInvoiceItem = [
	            'customer_id' => $invoice->customer_id  ,
	            'invoice_itemable_id' =>  $weddingRing['id'] ,
	            'invoice_itemable_type' =>  'App\WeddingRing' ,
	            'title' =>  $weddingRing['texts'][0]['content'] ,
	            'unit_price' =>  $weddingRing['unit_price'] ,
	            ];
	            
	            $invoice->invoiceItems()
	            ->where('invoice_itemable_type', 'App\WeddingRing')
	            ->where('invoice_itemable_id', $weddingRing['id'])
	            ->updateOrcreate($weddingRingInvoiceItem) ;
	            // dd($invoice);
	            }

	        }
        }

    	$invoices = Invoice::with('engagementRings.texts')->get();
    	// $invoices = $invoices->jewelleries();
    	foreach ($invoices as $invoice) {
    		// dd($invoice);
	    	foreach ($invoice->engagementRings as $engagementRing) {
	            if (isset($engagementRing['id'])) {
	            $engagementRings[] = $engagementRing['id'];

	            $engagementRingInvoiceItem = [
	            'customer_id' => $invoice->customer_id  ,
	            'invoice_itemable_id' =>  $engagementRing['id'] ,
	            'invoice_itemable_type' =>  'App\EngagementRing' ,
	            'title' =>  $engagementRing['texts'][0]['content'] ,
	            'unit_price' =>  $engagementRing['unit_price'] ,
	            ];
	            
	            $invoice->invoiceItems()
	            ->where('invoice_itemable_type', 'App\EngagementRing')
	            ->where('invoice_itemable_id', $engagementRing['id'])
	            ->updateOrcreate($engagementRingInvoiceItem) ;
	            // dd($invoice);
	            }

	        }
        }

    	$invoices = Invoice::with('jewelleries.texts')->get();
    	// $invoices = $invoices->jewelleries();
    	foreach ($invoices as $invoice) {
    		// dd($invoice);
	    	foreach ($invoice->jewelleries as $jewellery) {
	            if (isset($jewellery['id'])) {
	            $jewelleries[] = $jewellery['id'];

	            $jewelleryInvoiceItem = [
	            'customer_id' => $invoice->customer_id  ,
	            'invoice_itemable_id' =>  $jewellery['id'] ,
	            'invoice_itemable_type' =>  'App\Jewellery' ,
	            'title' =>  $jewellery['texts'][0]['content'] ,
	            'unit_price' =>  $jewellery['unit_price'] ,
	            ];
	            
	            $invoice->invoiceItems()
	            ->where('invoice_itemable_type', 'App\Jewellery')
	            ->where('invoice_itemable_id', $jewellery['id'])
	            ->updateOrcreate($jewelleryInvoiceItem) ;
	            // dd($invoice);
	            }

	        }
        }

    }
}
