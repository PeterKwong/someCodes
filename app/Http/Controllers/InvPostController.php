<?php

namespace App\Http\Controllers;

use App\Tag;
use App\InvPost;
use App\Invoice;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class InvPostController extends Controller
{


    public function bladeIndex($locale)
    {


      return view('customerJewellery.index');
 
    }


    public function bladeShow($locale, $id)
    {
    // DB::connection()->enableQueryLog();

    // $cache = Cache::remember('customerJew:'.$id, 1, function()use($id) {
    //          return $meta = InvPost::with(['texts'=>function($texts){
    //                 $texts->where('locale',app()->getLocale());
    //             }])->findOrFail($id);   
    // });


    // $log = DB::getQueryLog(); 


    // dd(print_r($log));

    // $storage = Redis::Connection();


    // if (!$storage->zScore('customerJew', 'page:'.$id)) {
    //     // $views = $storage->incr('page:'.$id.':views');
    //     // $storage->zIncrBy('customerJew', 1, 'page:'.$id);
    // }

    // $storage->pipeline(function($pipe)use($id){
    //    $pipe->zIncrBy('customerJew', 1, 'page:'.$id);
    //    $pipe->incr('page:'.$id.':views');
    // });

    // $getViews = $storage->get('page:'.$id.':views');

    // $r = 'This is ' .$id. ' ,has ' . $getViews;
    // return dd($r) ;


     $meta = InvPost::with(['texts'=>function($texts){
                    $texts->where('locale',app()->getLocale());
                }])->findOrFail($id);

      return view('customerJewellery.show', compact('meta'));
 
    }

    public function admBladeIndex(){

        return view('backEnd.customerJewellery.index');

    }

    public function admBladeShow(){

        return view('backEnd.customerJewellery.show');

    }

    public function admBladeForm(){

        return view('backEnd.customerJewellery.form');

    }

    public function create()
    {
        $form = InvPost::form();

        return response()
            ->json([
                'form' =>$form,
                'option' => Invoice::with(['engagementRings','weddingRings','jewelleries','invDiamonds'])->orderBy('id')
                ->get()
                ]);
    }

    public function index()
    {
        $posts = InvPost::where('published',1)->orderBy('date', 'desc')
                ->with(['images' => function($query){ 
                                    $query->where('type','cover');
                                    }, 'texts'])
                ->paginate(request()->per_page);

        return response()
            ->json([
                'model' => $posts
                ]);
    }

    public function admIndex()
    {
                
        return response()
            ->json([
                'model' => InvPost::with('texts')->filterPaginateOrder(),
                ]);
    }

    public function store(Request $request)
    {
        // dd(print_r($request->all()));
        $this->validate($request, [
            'invoice_id' => 'required | max:255',
            'images' => 'required | array',
            'texts' => 'required | array | min:1',
            ]);


        $invPost = InvPost::create($request->except(['video','texts','images']));

        // dd(print_r($invPost));
        return $invPost->storeItem($request);

        
    }

    protected function getFileName($file)
    {
    		return str_random(). '.' .$file->extension();
    }

    public function show($id)
    {
    		// $post = InvPost::with(['contents'=> function($query){$query->where('locale',app()->getLocale())->get();}])
    		// 		->findOrFail($id);
        
            $post = InvPost::with(['images','texts','invoice.engagementRings.images','invoice.engagementRings.texts','invoice.weddingRings.images','invoice.weddingRings.texts','invoice.jewelleries.images','invoice.jewelleries.texts','invoice.invDiamonds'])
                    ->findOrFail($id);

            
    		// if (Invoice::whereId($post->invoice_id)) {
    		// 	$invoice = Invoice::whereId($post->invoice->id)->with(['invDiamonds','jewelleries','engagementRings','weddingRings'])->get();
    		// }

            
    		// if (Jewellery::invoices($post->invoice->id)->get()) {
    		// 	$jewelleries = Jewellery::invoices($post->invoice->id)->get();
    		// }
            return response()
                ->json([
                    'model' => $post,
                    ]);

    		// return response()
    		// 	->json([
    		// 		'post' => $post,
    		// 		'invoice' =>$invoice,
      //               'locale' =>app()->getLocale()
    		// 		]);

    }

    public function edit($id, Request $request)
    {
        
    $form = InvPost::with(['images','texts','invoice.engagementRings','invoice.weddingRings','invoice.jewelleries','invoice.invDiamonds'])
            ->findOrFail($id);


        // $form = $requ()
        //     ->with(['ingredients' => function($query){
        //         $query->get(['id', 'name', 'qty']);
        //     }, 'directions' =>function($query){
        //         $query->get(['id', 'description']);
        //     }])
        //     ->findOrFail($id, [
        //         'id', 'name', 'description', 'image'
        //         ]);

        return response()
                ->json([
                    'form' =>$form,
                    'option' => Invoice::with(['engagementRings','weddingRings','jewelleries','invDiamonds'])->orderBy('id')
                        ->get()

                    ]);
    }


    public function update($id, Request $request)
    {
        
        $this->validate($request, [
            'texts' => 'required',
            ]);

        $invPost = InvPost::with(['images','texts'])->findOrFail($id);


        // dd(print_r($request->all()));
        return $invPost->updateItem($request, 'App\InvPost');

    }

    public function destroy($id, Request $request)
    {
        $invPost = InvPost::with(['images','texts'])->findOrFail($id);

        return $invPost->destroyItem('App\InvPost');

    }

}
