<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InvDiamond;
use App\Diamond;


class InvDiamondController extends Controller
{
     public function index()
    {
    	return response()
    		->json([
    			'model' =>InvDiamond::filterPaginateOrder()
    			]);
    }

    public function create()
    {
    	return response()
    		->json([
    			'form' =>InvDiamond::form(),
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

        if ( InvDiamond::where('certificate', $request->certificate)->count() == 0 )  {
            $invDiamond = InvDiamond::create($request->all());
            $saved = true;         
        }

    	return response()
    		->json([
    			'saved' => $saved
    			]);
    }

    public function show($id)
    {
    	$invDiamond = InvDiamond::findOrFail($id);

    	return response()
    		->json([
    			'model' => $invDiamond
    			]);
    }

    public function edit($id)
    {
    	$invDiamond = InvDiamond::findOrFail($id);

    	return response()
    		->json([
    			'form' =>$invDiamond,
    			'option' => []
    			]);
    }

    public function createFormDiamond($id) {
        $invDiamond = Diamond::findOrFail($id);

        return response()
            ->json([
                'form' =>$invDiamond,
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
        
        $invDiamond = InvDiamond::findOrFail($id);

        if ( $invDiamond )  {
            $invDiamond->update($request->all());
            $saved = true;         
        }

        return response()
            ->json([
                'saved' => $saved
                ]);
    }
    public function admBladeIndex(){

        return view('backEnd.invDiamond.index');

    }

    public function admBladeShow(){

        return view('backEnd.invDiamond.show');

    }

    public function admBladeForm(){

        return view('backEnd.invDiamond.form');

    }

    public function setDiamondDueToday($id){
        $invoice = InvDiamond::findOrFail($id);
        $invoice->update(['due_date' => now()]);
        // dd($invoice);
         echo "<script>window.close();</script>";
    }

    public function onStockDiamond(){
        
        $month = [];

        foreach (range(1, 12) as $value) {
            $data = ['amount'=> 0, 'quantity' => 0];
            $invDiamond = InvDiamond::where('invoice_id',null)->whereMonth('created_at',$value)
                        ->select('price as amount')->get();
            // $invoice->map(function($dat){ 
            //                 return $dat->balance ;
            //                 });
            // dd($invoice);

            $month[] = $invDiamond;

        }

        return response()->json([
            'model' => $month,
            'labels' => range(1,12),
        ]);


    }

    public function onStockDiamondPaginate(){

        request()->column = 'weight';

        $invDiamond = InvDiamond::where('invoice_id',null)
                    ->filterPaginateOrder();


        return response()->json([
            'model' => $invDiamond,
        ]);



    }

    //Accounting

    public function stockExport(){
        
        // dd(request()->all());
        $request = request()->all();

        $stock = InvDiamond::where('invoice_id',null)
                    ->get();


        return response()->json([
            'model' => $stock,
        ]);
    }

    public function destroy($id)
    {
    	$invDiamond = InvDiamond::findOrFail($id);
    	$invDiamond->delete();

    	return response()
    		->json([
    			'deleted' => true
    			]);
    }
}
