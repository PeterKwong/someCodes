<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Page;
use App\Models\InvoicePost;
use App\Models\Invoice;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


class InvoicePostController extends Controller
{


    public function bladeIndex($locale)
    {


      return view('frontend.customerJewellery.index');
 
    }


    public function bladeShow($locale, $id)
    {
    // DB::connection()->enableQueryLog();

    // $cache = Cache::remember('customerJew:'.$id, 1, function()use($id) {
    //          return $meta = InvoicePost::with(['texts'=>function($texts){
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


     $meta = InvoicePost::findOrFail($id)->title($id);

      return view('frontend.customerJewellery.show', compact('meta'));
 
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
        $form = InvoicePost::form();

        return response()
            ->json([
                'form' =>$form,
                'option' => Invoice::with(['engagementRings','weddingRings','jewelleries','invoiceDiamonds'])->orderBy('id')
                ->get(),
                'tags' => Tag::all(),
                ]);
    }

    public function index()
    {
        $posts = InvoicePost::where('published',1)->orderBy('date', 'desc')
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
                'model' => InvoicePost::with('texts','images')->filterPaginateOrder(),
                ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'invoice_id' => 'required | max:255',
            'images' => 'required | array',
            'texts' => 'required | array | min:1',
            ]);


        $invoicePost = InvoicePost::create($request->except(['video','texts','images','video360']));

        $page = Page::create(['url' => 'customer-jewellery/'.$invoicePost->id ,'paginable_id' => $invoicePost->id , 'paginable_type' => 'App\Models\InvoicePost']);
        $tags;
        foreach ($request->tags as $key => $tag) {
            $tags[]=$tag['id'];
        }
        $page->tags()->sync($tags);
        // dd($page);
        // dd(print_r($invoicePost));
        return $invoicePost->storeItem($request);

        
    }

    protected function getFileName($file)
    {
    		return str_random(). '.' .$file->extension();
    }

    public function show($id)
    {
    		// $post = InvoicePost::with(['contents'=> function($query){$query->where('locale',app()->getLocale())->get();}])
    		// 		->findOrFail($id);
        
            $post = InvoicePost::with(['images','texts','invoice.engagementRings.images','invoice.engagementRings.texts','invoice.weddingRings.images','invoice.weddingRings.texts','invoice.jewelleries.images','invoice.jewelleries.texts','invoice.invoiceDiamonds'])
                    ->findOrFail($id);

            
    		// if (Invoice::whereId($post->invoice_id)) {
    		// 	$invoice = Invoice::whereId($post->invoice->id)->with(['invoiceDiamonds','jewelleries','engagementRings','weddingRings'])->get();
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
        
    $form = InvoicePost::with(['images','texts','invoice.engagementRings','invoice.weddingRings','invoice.jewelleries','invoice.invoiceDiamonds','page.tags'])
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
                    'option' => Invoice::with(['engagementRings','weddingRings','jewelleries','invoiceDiamonds'])->orderBy('id')
                        ->get(),
                    'tags' => Tag::all(),

                    ]);
    }


    public function update($id, Request $request)
    {
        
        // dd($id);
        $this->validate($request, [
            'texts' => 'required',
            ]);

        $invoicePost = InvoicePost::with(['images','texts'])->findOrFail($id);
        // dd($request->video);
        $tags=[];

        if ($request->has('tags')) {
            foreach ($request->tags as $tag) {
                $tags[]=$tag['id'];
            }
        }
        $invoicePost->page->tags()->sync($tags);


        // dd($invoicePost->page()->tags());
        return $invoicePost->updateItem($request, 'App\Models\InvoicePost');

    }

    public function destroy($id, Request $request)
    {
        $invoicePost = InvoicePost::with(['images','texts'])->findOrFail($id);

        return $invoicePost->destroyItem('App\Models\InvoicePost');

    }

}
