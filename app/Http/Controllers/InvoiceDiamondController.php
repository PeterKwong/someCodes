<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvoiceDiamond;
use App\Diamond;


class InvoiceDiamondController extends Controller
{
     public function index()
    {
    	return response()
    		->json([
    			'model' =>InvoiceDiamond::filterPaginateOrder()
    			]);
    }

    public function create()
    {
    	return response()
    		->json([
    			'form' =>InvoiceDiamond::form(),
    			'option' =>[]
    		]);	
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'price'  => 'required',
            'clarity' => 'required',
            'weight' => 'required',
            'color' => 'required',
            'cut' => 'required',
            'polish' => 'required',
            'symmetry' => 'required',
            'fluorescence' => 'required',
            'lab' => 'required',
            'certificate' => 'required',
            'shape' =>'required',
    		]);

        $saved = false;

        if ( InvoiceDiamond::where('certificate', $request->certificate)->count() == 0 )  {

            $diamond = Diamond::where('certificate', $request->certificate);
            if($diamond->count()){
                $diamond->update(['starred'=> null, 'available' => null ]);
            }
                            
            $invoiceDiamond = InvoiceDiamond::create($request->all());
            $saved = true;         
        }

    	return response()
    		->json([
    			'saved' => $saved
    			]);
    }

    public function show($id)
    {
    	$invoiceDiamond = InvoiceDiamond::findOrFail($id);

    	return response()
    		->json([
    			'model' => $invoiceDiamond
    			]);
    }

    public function edit($id)
    {
    	$invoiceDiamond = InvoiceDiamond::findOrFail($id);

    	return response()
    		->json([
    			'form' =>$invoiceDiamond,
    			'option' => []
    			]);
    }

    public function createFormDiamond($id) {
        $invoiceDiamond = Diamond::findOrFail($id);

        return response()
            ->json([
                'form' =>$invoiceDiamond,
                'option' => []
                ]);
    }

    public function update(Request $request, $id)
    {
    	    	$this->validate($request, [
    		'price'  => 'required',
            'clarity' => 'required',
            'weight' => 'required',
            'color' => 'required',
            'cut' => 'required',
            'polish' => 'required',
            'symmetry' => 'required',
            'fluorescence' => 'required',
            'lab' => 'required',
    		'certificate' => 'required',
    		'shape' =>'required',
    		]);


        $saved = 'same diamond';
        
        $invoiceDiamond = InvoiceDiamond::findOrFail($id);

        if ( $invoiceDiamond )  {
            $invoiceDiamond->update($request->all());
            $saved = true;         
        }

        return response()
            ->json([
                'saved' => $saved
                ]);
    }
    public function admBladeIndex(){

        return view('backEnd.invoiceDiamond.index');

    }

    public function admBladeShow(){

        return view('backEnd.invoiceDiamond.show');

    }

    public function admBladeForm(){

        return view('backEnd.invoiceDiamond.form');

    }

    public function setDiamondDueToday($id){
        $invoice = InvoiceDiamond::findOrFail($id);
        $invoice->update(['due_date' => now()]);
        // dd($invoice);
         echo "<script>window.close();</script>";
    }

    public function onStockDiamond(){
        
        $month = [];

        foreach (range(1, 12) as $value) {
            $data = ['amount'=> 0, 'quantity' => 0];
            $invoiceDiamond = InvoiceDiamond::where('invoice_id',null)->whereMonth('created_at',$value)
                        ->select('price as amount')->get();
            // $invoice->map(function($dat){ 
            //                 return $dat->balance ;
            //                 });
            // dd($invoice);

            $month[] = $invoiceDiamond;

        }

        return response()->json([
            'model' => $month,
            'labels' => range(1,12),
        ]);


    }

    public function onStockDiamondPaginate(){

        request()->column = 'weight';

        $invoiceDiamond = InvoiceDiamond::where('invoice_id',null)
                    ->filterPaginateOrder();


        return response()->json([
            'model' => $invoiceDiamond,
        ]);



    }

    //Accounting

    public function stockExport(){
        
        // dd(request()->all());
        $request = request()->all();

        $stock = InvoiceDiamond::where('invoice_id',null)
                    ->get();


        return response()->json([
            'model' => $stock,
        ]);
    }

    public function destroy($id)
    {
    	$invoiceDiamond = InvoiceDiamond::findOrFail($id);
    	$invoiceDiamond->delete();

    	return response()
    		->json([
    			'deleted' => true
    			]);
    }
}
