<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Diamond;
use App\EngagementRing;
use App\InvoiceDiamond;
use App\InvoicePost;
use App\Invoice;
use App\Jewellery;
use App\Order;
use App\WeddingRing;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class InvoiceController extends Controller
{

    public function index()
    {
                
    	return response()
    		->json([
    			'model' => Invoice::with('customer', 'invoicePosts','invoicePosts.images')->filterPaginateOrder(),
    			]);
    }

    public function admBladeIndex(){

    return view('backEnd.invoice.index');

    }

    public function admBladeShow(){

    return view('backEnd.invoice.show');

    }

    public function admBladeForm(){

    return view('backEnd.invoice.form');

    }
    public function admBladePrint(){

    return view('backEnd.invoice.print');

    }
    public function create()
    {
    	return response()
    		->json([
    			'form' =>Invoice::form(),
    			'option' => [
                    'invoice_diamonds' => InvoiceDiamond::where('invoice_id',NULL)->orderBy('certificate')->select('id','certificate as text','weight','color','clarity','stock','price', 'account_price')->get(),
                    'customers' => Customer::orderBy('name')->select('id','phone as text')->get(),
                    'jewelleries' => Jewellery::select('id','stock as text','unit_price')->with('texts','images')->get(),
                    'engagement_rings' => EngagementRing::select('id','stock as text','unit_price')->with('texts','images')->get(),
                    'wedding_rings' => WeddingRing::select('id','stock as text','unit_price')->with('texts','images')->get()
    			]
    			]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                'customer_id' => 'required | exists:customers,id',
                'title' => 'required',
                'date' => 'required | date_format:Y-m-d',
                // 'due_date' => 'required | date_format:Y-m-d',
                'discount' => 'required | numeric | min:0',
                'deposit' => 'required | numeric | min:0',
                'total' => 'required | numeric | min:0',
            ]);

        $data = $request->except('diamonds','jewelleries','engagementRings','weddingRings');
        $data['sub_total'];

        $diamonds = [];
        $jewelleries = [];
        $engagementRings = [];
        $weddingRings = [];
        $invoice_diam = [] ;
        
        dd($request);
        // if (!empty($request->invoice_diamonds)) {
        //         foreach ($request->invoice_diamonds as $diamond) {
        //         $diamonds[] = new InvoiceDiamond($diamond);
        //     }
        // }

        // $invoice_diamonds = array_filter($invoice_diamonds, 
        //                         function($data){return preg_match('/s.td/i', $data['stock']);});


        if (!empty($request->invoice_diamonds)) {
            
            $diams = [];
            
            if ( isset($request->source) ) {
                $diamonds = Diamond::whereIn('id', $request->input('invoice_diamonds.*.id') )->get()->toArray();
                    foreach ($diamonds as $diamond) {
                        Arr::pull($diamond, 'id');
                        $diamond = InvoiceDiamond::create($diamond);
                        $diams[] = $diamond->id;
                    }
                // dd($diams);

            }else{
                foreach ($request->invoice_diamonds as $diamond) {
            
                    $diams[] =  Arr::pull($diamond, 'id');;
                }
                // dd($diams);
            }

           
            $invoice_diamonds = InvoiceDiamond::whereIn('id', $diams)->get();
            $invoice_diamonds->filter(function($value,$key){
                    return $value->update( ['price' => request()->input('invoice_diamonds.'.$key.'.price'),
                                            'account_price' => request()->input('invoice_diamonds.'.$key.'.account_price'),
                                            'stock' => request()->input('invoice_diamonds.'.$key.'.stock'),
                                            ]);
            });

                $invoice_diam = $invoice_diamonds->reject(function($data){ 
                                return !preg_match('/td/i', $data->stock);
                            })->map(function($data){
                                return $data->id;
                                });
            // dd($invoice_diamonds);
        }

        if ( count($invoice_diam) != 0  || $request->deposit_method != 'cash' || $request->balance_method != 'cash') {
            $data['invoice_no'] = Invoice::max('invoice_no') + 1;

        }

        // dd($data['invoice_no']);

        $data['total'] = $data['sub_total'] - $data['discount'];
        $data['balance'] = $data['total'] - $data['deposit'];

        $invoice = Invoice::create($data);

        if (!empty($request->invoice_diamonds)) {
            $invoice->invoiceDiamonds()
        		->saveMany($invoice_diamonds);
        }

        if ( isset($request->source) ) {
            $invoice->order()->save( Order::where('id',$request->source)->first() );
        }
        
        foreach ($request->jewelleries as $jewellery) {
            if (isset($jewellery['id'])) {
            $jewelleries[] = $jewellery['id'];
            }
        }
        foreach ($request->engagement_rings as $engagementRing) {
            if (isset($engagementRing['id'])) {
            $engagementRings[] = $engagementRing['id'];
            }
        }
        foreach ($request->wedding_rings as $weddingRing) {
            if (isset($weddingRing['id'])) {            
            $weddingRings[] = $weddingRing['id'];
            }
        }

        $invoice->jewelleries()->sync($jewelleries);
        $invoice->engagementRings()->sync($engagementRings);
        $invoice->weddingRings()->sync($weddingRings);

        return response()
        		->json([
        			'saved' =>true
        			]);
    }

    public function show($id)
    {
    	$invoice  = Invoice::with('customer', 'invoiceDiamonds', 'jewelleries','jewelleries.texts','jewelleries.images', 'engagementRings', 'engagementRings.texts','engagementRings.images', 'weddingRings', 'weddingRings.texts', 'weddingRings.images')->findOrFail($id);

    	return response()
    		->json([
    			'model' =>$invoice,
                'company' => config('global.company'),
    			]);
    }

    public function edit($id)
    {
    	$invoice  = Invoice::with([
                'invoiceDiamonds',
                'jewelleries',
                 'engagementRings',
                 'weddingRings',
                ])->findOrFail($id);

    	return response()
    		->json([
    			'form' => $invoice,
    			'option' => [
                    'customers' => Customer::orderBy('name')->select('id','phone as text')->get(),
                    'invoice_diamonds' => InvoiceDiamond::orderBy('certificate')->select('id','certificate as text','weight','color','clarity','stock','price', 'account_price')->get(),
                    'jewelleries' => Jewellery::select('id','stock as text','unit_price')->with('texts','images')->get(),
                    'engagement_rings' => EngagementRing::select('id','stock as text','unit_price')->with('texts','images')->get(),
                    'wedding_rings' => WeddingRing::select('id','stock as text','unit_price')->with('texts','images')->get()
                ]
    			]);
    }

    public function update(Request $request, $id)
    {
    	$this->validate($request,[
                'customer_id' => 'required |exists:customers,id',
                'title' => 'required',
                'balance' => 'required | integer',
                // 'count' => 'required | boolean',
                'date' => 'required | date_format:Y-m-d',
                // 'due_date' => 'required | date_format:Y-m-d',
                'discount' => 'required | numeric | min:0',
            ]);

    	$invoice = Invoice::findOrFail($id);

        // dd(print_r($invoice));

        $data = $request->except('invoice_diamonds','jewelleries','engagement_rings','wedding_rings');
        // $data['sub_total'] = 0;

        $diamonds = [ ];
        $diamondIds = [ ];
        $invoice_diam = [] ;

        // dd($request->all());

        // foreach ($request->invoice_diamonds as $diamond) {
        //     // $data['sub_total'] += $item['unit_price'] * $item['qty']; 
        //     if (isset($diamond['id'])) {

        //     	InvoiceDiamond::whereId($diamond['id'])
        //     		->whereInvoiceId($invoice->id)
        //     		->update($diamond);

        //                 $diamondIds[] = $diamond['id'];
        //     }else{
        //     	$diamonds[ ] = new InvoiceDiamond($diamond);
        //     }
        // }
        
        $invoice->invoiceDiamonds()->update(['invoice_id' => null]);

        if (count($request->invoice_diamonds)) {

            // dd($request->input('invoice_diamonds.*'));
            $diamonds = $request->invoice_diamonds;

            foreach ($diamonds as $diamond) {

                $diamond = InvoiceDiamond::whereId($diamond['id'])->update(
                                ['price' => $diamond['price'],
                                'account_price' => $diamond['account_price'],
                                'stock' => $diamond['stock'],
                                ]);
            };

                // $invoice_diamonds = InvoiceDiamond::whereIn('id', $request->input('invoice_diamonds.*.id'))->get();
                // $invoice_diamonds->filter(function($value,$key){
                //         return $value->update( ['price' => request()->input('invoice_diamonds.'.$key.'.price'),
                //                                 'stock' => request()->input('invoice_diamonds.'.$key.'.stock'),
                //                                 ]);
                // });
            
            $invoice_diamonds = InvoiceDiamond::whereIn('id', $request->input('invoice_diamonds.*.id'))->get();

            $invoice_diam = $invoice_diamonds->reject(function($data){ 
                                return !preg_match('/td/i', $data->stock);
                            })->map(function($data){
                                return $data->id;
                                });

        }
        
        // dd($invoice_diam);

        if ($request->invoice_no == 0 ) {
            
            if ( count($invoice_diam) != 0  || $request->deposit_method != 'cash' || $request->balance_method != 'cash') {
                $data['invoice_no'] = Invoice::max('invoice_no') + 1;

            }
        }


        // $data['total'] = $data['sub_total'] - $data['discount'];

        $invoice->update($data);

        if (!empty($request->invoice_diamonds)) {
            $invoice->invoiceDiamonds()
                ->saveMany($invoice_diamonds);

            // dd($invoice->invoiceDiamonds );
        }

        $jewelleries = [];
        $engagementRings = [];
        $weddingRings = [];

        foreach ($request->jewelleries as $jewellery) {
            if (isset($jewellery['id'])) {
            $jewelleries[] = $jewellery['id'];
            }
        }

        foreach ($request->engagement_rings as $engagementRing) {
            if (isset($engagementRing['id'])) {
            $engagementRings[] = $engagementRing['id'];
            }
        }

        foreach ($request->wedding_rings as $weddingRing) {
            if (isset($weddingRing['id'])) {            
            $weddingRings[] = $weddingRing['id'];
            }
        }

        $invoice->jewelleries()->sync($jewelleries);
        $invoice->engagementRings()->sync($engagementRings);
        $invoice->weddingRings()->sync($weddingRings);

        return response()
        		->json([
        			'saved' =>true
        			]);
    }

    public function setInvoiceDueToday($id){
        $invoice = Invoice::findOrFail($id);
        $invoice->update(['due_date' => now()]);
        
         echo "<script>window.close();</script>";
    }


    // Account

        //API
        public function APIindex(){

            $user = auth()->user();

            $invoices = Customer::where('user_id', $user->customers[0]->user_id)->first()
                        ->invoices()->paginate(10);
            // dd($invoices);

            return response()->json([
                        'model' => $invoices
            ]);
        }

        public function APIshow($id){

            return $this->show($id);

        }

        // Referral

        public function records(){
            
            $coupon = auth()->user()->coupons()->first()->code;
            $order = Order::where('coupon_code', $coupon)->with(['invoice.invoiceDiamonds', 'invoice.customer'])->paginate(10);

            return response()->json([
                        'model' => $order
            ]);
        }

        public function refund(){
            $records = $this->records();

            return response()->json([
                    'model' => ''
            ]);
        }



    //Admin

    //accounting

    public function invoiceExport(){
        
        // dd(request()->all());
        $request = request()->all();

        $invoice = Invoice::whereYear('date',$request['year'])
                    ->whereMonth('date', $request['month'])
                    ->with('jewelleries', 'invoiceDiamonds','weddingRings','engagementRings')
                    ->get();


        return response()->json([
            'model' => $invoice,
        ]);
    }

    public function duedProgress(){
        
        // dd('hi');

        $month = [];

        foreach (range(1, 12) as $value) {
            $data = ['amount'=> 0, 'quantity' => 0];
            $invoice = Invoice::where('due_date',null)->whereMonth('created_at',$value)
                        ->whereHas('invoiceDiamonds', function($query){
                                    $query->whereNotNull('due_date');
                                })
                        ->select('balance as amount')->get();
            // $invoice->map(function($dat){ 
            //                 return $dat->balance ;
            //                 });
            // dd($invoice);

            $month[] = $invoice;

        }

        return response()->json([
            'model' => $month,
            'labels' => range(1,12),
        ]);
    }
    
    public function duedProgressPaginate(){

        $invoice = Invoice::where('due_date',null)
                    ->whereHas('invoiceDiamonds', function($query){
                        $query->whereNotNull('due_date');
                    })
                    ->with('customer', 'invoicePosts')
                    ->with(['invoiceDiamonds' => function($query){ return $query->whereNotNull('due_date')->get() ; }])
                    ->filterPaginateOrder();

        // $invoice->map(function($dat){ 
        //                 return $dat->balance ;
        //                 });
        // dd($invoice);

        return response()->json([
            'model' => $invoice,
        ]);
    }

    public function onProgress(){

        $month = [];

        foreach (range(1, 12) as $value) {
            $data = ['amount'=> 0, 'quantity' => 0];
            $invoice = Invoice::where('due_date',null)->whereMonth('created_at',$value)
                        // ->whereHas('invoiceDiamonds', function($query){
                        //             $query->whereNotNull('due_date');
                        //         })
                        ->select('balance as amount')->get();
            // $invoice->map(function($dat){ 
            //                 return $dat->balance ;
            //                 });
            // dd($invoice);

            $month[] = $invoice;

        }

        return response()->json([
            'model' => $month,
            'labels' => range(1,12),
        ]);
    }
    
    public function onProgressPaginate(){

        $invoice = Invoice::where('due_date',null)
                    // ->whereHas('invoiceDiamonds', function($query){
                    //     $query->whereNotNull('due_date');
                    // })
                    ->with('customer', 'invoicePosts')
                    ->with(['invoiceDiamonds' => function($query){ return $query->whereNotNull('due_date')->get() ; }])
                    ->filterPaginateOrder();

        // $invoice->map(function($dat){ 
        //                 return $dat->balance ;
        //                 });
        // dd($invoice);

        return response()->json([
            'model' => $invoice,
        ]);
    }

    public function onProgressSettledDiamond(){

        $month = [];

        foreach (range(1, 12) as $value) {
            $data = ['amount'=> 0, 'quantity' => 0];
            $invoice = Invoice::where('due_date',null)->whereMonth('created_at',$value)
                        ->with(['invoiceDiamonds' => function($query){ return $query->whereNotNull('due_date')->get() ; }])
                        ->get();
            // $invoice->map(function($dat){ 
            //                 return $dat->balance ;
            //                 });
            // dd($invoice);

            $month[] = $invoice;

        }

        return response()->json([
            'model' => $month,
            'labels' => range(1,12),
        ]);

    }

    public function onProgressSettledDiamondPaginate(){

        $invoice = Invoice::where('due_date',null)
                    ->with('customer', 'invoicePosts')
                    ->with(['invoiceDiamonds' => function($query){ return $query->whereNotNull('due_date')->get() ; }])
                    ->filterPaginateOrder();


        return response()->json([
            'model' => $invoice,
        ]);

    }

    public function destroy($id)
    {
    	$invoice = Invoice::findOrFail($id);
    	InvoiceDiamond::whereInvoiceId($invoice->id)
    		->delete();
        $invoice->jewelleries()->detach();
        $invoice->engagementRings()->detach();
        $invoice->weddingRings()->detach();
    	$invoice->delete();

    	return response()
    		->json([
    			'deleted' => true
    			]);
    }
}