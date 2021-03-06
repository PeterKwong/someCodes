<?php

namespace App\Http\Controllers;

use App\Models\EngagementRing;
use App\Models\InvoicePost;
use App\Support\EngagementRingFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class EngagementRingController extends Controller
{


    public function bladeIndex($locale)
    {


      return view('frontend.engagementRing.index');
 
    }

    public function solitaireRingSetting($locale){

  

          return view('frontend.engagementRing.solitaireRingSetting');
        
    }

    public function sideStonesSetting($locale){

  

          return view('frontend.engagementRing.sideStonesSetting');
        
    }

    public function haloSetting($locale){

  

          return view('frontend.engagementRing.haloSetting');
        
    }

    public function bladeShow($locale, $id)
    {

        $meta = EngagementRing::with(['texts'=>function($texts){
                        $texts->where('locale',app()->getLocale());
                    }, 'images'])->findOrFail($id);
        // dd($meta);
        $title = $meta->title();
        $tags = $meta->tags();

        return view('frontend.engagementRing.show', ['meta'=>$meta, 'title' => $title, 'tags' => $tags] );
 
    }

    public function admBladeIndex(){

        return view('backEnd.engagementRing.index');

    }

    public function admBladeShow(){

        return view('backEnd.engagementRing.show');

    }

    public function admBladeForm(){

        return view('backEnd.engagementRing.form');

    }

    //CRUD

	public function index()
    {
    	return response()
    		->json([
    			'model' =>EngagementRing::where('published',1)->orderBy('created_at','desc')->SearchPaginateAndOrder()
    			]);
    }

    public function admIndex()
    {
        return response()
            ->json([
                'model' =>EngagementRing::FilterPaginateOrder()
                ]);
    }

    public function create()
    {
    	return response()
    		->json([
    			'form' =>EngagementRing::form(),
    			'option' =>EngagementRing::orderBy('id', 'desc')->first(['id'])
    		]);	
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'stock'  => 'required| unique:engagement_rings',
            'texts' => 'required',
            'unit_price' => 'required | numeric |min:1',
    		]);
    	
        // dd($request->all());
        // dd($request->video360['hasFile']);

        $engagementRing = EngagementRing::create($request->except(['video','texts','images','video360']));

        return $engagementRing->storeItem($request);
    }

      protected function getFileName($file)
    {
            return str_random(). '.' .$file->extension();
    }

    public function show($id)
    {   
        // return Cache::remember('engagementRing.show.'.$id.'.'.app()->getLocale(), 3600, 
        //             function()use($id){ 
                           return $this->hasCachedShow($id);
                    // });

    }
    public function hasCachedShow($id){
        
        $engagementRing = EngagementRing::where('published',1)->with(['images','texts'])->findOrFail($id);
        // $posts = EngagementRing::where('published',1)->findOrFail($id)
        //             ->invoices()->whereHas('invoicePosts',function(Builder $inv){
        //                     return $inv->where('published',1);})
        //             ->with([
        //             'invoicePosts',
        //             'invoicePosts.texts',
        //             'invoicePosts.images',
        //             ])->orderBy('created_at','desc')->get();

        // $invoicePosts = [];
        // $posts = EngagementRing::where('published',1)->whereId($id)
        //                             ->with([
        //                                 'posts'=>function($posts){
        //                                         // dd($posts->first());
        //                                     foreach ($posts as $key => $post) {
        //                                         dd($post->id);

        //                                     }
        //                                     return $posts->title();
        //                                 },
        //                                 'posts.images'
        //                             ])->get();
        // dd($posts->images);
        // $posts = InvoicePost::where('published',1)
        //                     ->where('postable_type','App\Models\EngagementRing')
        //                     ->where('postable_id',$id)
        //                     ->with([
        //                         'images',
        //                         ])->orderBy('created_at','desc')->get();
        // dd($posts);
        $posts = InvoicePost::where('published',1)
                            ->where('postable_type','App\Models\EngagementRing')
                            ->where('postable_id',$id)
                            ->with([
                                'images',
                                ])->orderBy('created_at','desc')->get();
        $invoicePosts = [];
        // $titles = $posts;

        // $this->posts = $this->posts->toArray();

        // foreach ($titles as $key => $title) {

        //     $this->posts['data'][$key]['invoice'] = $title->title($title->id);

        // }

        // dd($posts->toArray()); 
        
        app()->setlocale(request()->locale);
        
        foreach ($posts as $key => $post ) {

                $post['texts']['content'] = $post->title($post->id);
                // dd($post);
                $invoicePosts['invoicePosts'][] = $post;
                // dd($invoicePosts['invoicePosts'][$post->id]['texts']);
                // $invoicePosts['invoicePosts'][$post->id]['texts'] = $post->title($post->id);
        }

        return response()
            ->json([
                'model' => $engagementRing,
                'posts' => $invoicePosts,
                ]);
    }

    public function admShow($id)
    {
        $engagementRing = EngagementRing::with(['images','texts'])->findOrFail($id);
        $posts = EngagementRing::findOrFail($id)->invoices()->with('invoicePosts.images')->get();

        $invoicePosts = [];

        // dd(count($posts)); 
        
        
        foreach ($posts as $p ) {
            if (isset($p->invoicePosts[0])) {
                $invoicePosts['invoicePosts'][] = $p->invoicePosts[0];
            }
        }

        return response()
            ->json([
                'model' => $engagementRing,
                'posts' => $invoicePosts,
                ]);
    }

    public function edit($id)
    {
    	$engagementRing = EngagementRing::with(['images','texts'])->findOrFail($id);

    	return response()
    		->json([
    			'form' =>$engagementRing,
    			'option' => []
    			]);
    }

    public function update(Request $request, $id)
    {
    	    $this->validate($request, [
            'stock'  => 'required',
            'texts' => 'required',
            'unit_price' => 'required | numeric |min:0',
            ]);

    	$engagementRing = EngagementRing::with(['images','texts'])->findOrFail($id);

        return $engagementRing->updateItem($request,'App\Models\EngagementRing');
    }

    public function destroy($id)
    {
    	$engagementRing = EngagementRing::with(['images','texts'])->findOrFail($id);

        return $engagementRing->destroyItem('App\Models\EngagementRing');

    }
}
