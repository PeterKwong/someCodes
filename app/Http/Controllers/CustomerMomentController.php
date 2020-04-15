<?php

namespace App\Http\Controllers;

use File;
use App\Text;
use App\Image;
use Carbon\Carbon;
use App\CustomerMoment;
use App\Support\ResizeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerMomentController extends Controller
{
    public function bladeIndex($locale)
    {


      return view('customerMoment.index');
 
    }

    public function index()
    {
        $customers = CustomerMoment::where('published',1)->orderBy('created_at', 'desc')
                ->with(['images', 'texts'])
                ->has('images', '>=', 1)
                ->paginate(request()->per_page);

        return response()
            ->json([
                'customers' => $customers
                ]);
    }

    public function admIndex()
    {
        $customers = CustomerMoment::orderBy('created_at', 'desc')
                ->with(['images', 'texts'])
                ->has('images', '>=', 1)
                ->paginate(request()->per_page);

        return response()
            ->json([
                'model' => $customers
                ]);
    }

    public function admBladeIndex(){

        return view('backEnd.customerMoment.index');

    }

    public function admBladeShow(){

        return view('backEnd.customerMoment.show');

    }

    public function admBladeForm(){

        return view('backEnd.customerMoment.form');

    }


    public function engagementTips($locale){

  
      return view('customerMoment.engagementTips');
        
    }

    public function create()
    {
        return response()
            ->json([
                'form' =>CustomerMoment::form(),
                'option' =>CustomerMoment::orderBy('id', 'desc')->first(['id'])
            ]); 
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'images' => 'required | array',
            'texts' => 'required | array | min:1',
            ]);


        $customerMoment = CustomerMoment::create($request->except(['texts','images']));

        return $customerMoment->storeItem($request,['toSquare']);

    }

      protected function getFileName($file)
    {
            return Carbon::now()->toDateString().'_' . str_random(). '.' .$file->extension();
    }

    public function show($id)
    {
        $CustomerMoment = CustomerMoment::with(['images','texts'])->findOrFail($id);

        return response()
            ->json([
                'model' => $CustomerMoment,

                ]);
    }

    public function edit($id)
    {
        $CustomerMoment = CustomerMoment::with(['images','texts'])->findOrFail($id);

        return response()
            ->json([
                'form' =>$CustomerMoment,
                'option' => []
                ]);
    }

    public function update(Request $request, $id)
    {
            $this->validate($request, [
            'texts' => 'required',
            ]);

        $customerMoment = CustomerMoment::with(['images','texts'])->findOrFail($id);

        return $customerMoment->updateItem($request,'App\CustomerMoment',['toSquare']);
    }

    public function destroy($id)
    {
        $customerMoment = CustomerMoment::with(['images','texts'])->findOrFail($id);
        
        return $customerMoment->destroyItem('App\CustomerMoment');

    }
}
