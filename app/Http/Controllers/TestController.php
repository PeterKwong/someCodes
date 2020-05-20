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

use Illuminate\Http\Request;
use App\Mail\Appointment;


class TestController extends Controller
{

    public function test(){

    $this->invoiceItemsCopy();

	return response()
		->json(
		['sent' => true]
	);

    	// return response()->download(base_path('public/front_end/contact/Winnie_Kwong.vcf'));
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
