<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Diamond;
use App\EngagementRing;
use App\Invoice;
use App\InvoiceDiamond;
use App\InvoiceItem;
use App\InvoicePost;
use App\Jewellery;
use App\Mail\Appointment;
use App\Page;
use App\Support\CronJob;
use App\Support\DiamondImport;
use App\Tag;
use Illuminate\Http\Request;


class TestController extends Controller
{

    public function test(){

	    $this->resetAllDiamonds();

		return response()
			->json(
			['sent' => true]
		);

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
      return $cron->runImportDiamondAPIPerBatch();      

      // $import = new DiamondImport();
      // return $import->getDiamondsFromSunrise();

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
    public function postTags(){

    	$invoicePosts = InvoicePost::with('invoice.invoiceDiamonds','invoice.engagementRings','invoice.weddingRings','invoice.jewelleries')->get();

    	foreach ($invoicePosts as $post) {

    		$page = Page::create(['url' => 'customer-jewellery/'.$post->id ,'paginable_id' => $post->id , 'paginable_type' => 'App\InvoicePost']);

    		$post = $post->invoice;
	    	$tags = [];


    		foreach ($post->jewelleries as $jewellery) {

    				// dd($jewellery);

    			if ($jewellery->prong) {


    				// dd($jewellery);
	    			// $diamond->weight = $diamondWeight;

	    			$columns = [ 67 =>'style', 68 =>'metal', 69 => 'gemstone' ];

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


    		foreach ($post->weddingRings as $weddingRing) {

    				// dd($engagementRing);

    			if ($weddingRing->style) {


    				// dd($engagementRing);
	    			// $diamond->weight = $diamondWeight;

	    			$columns = [ 78 =>'style', 79 =>'metal', 80 => 'sideStone' ];

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
	    			
	    			$page->tags()->sync($tags);
    			}

    			
    		}




    		



    	}




    } 

    public function testView(){
    	
    	return view('test.index');
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
