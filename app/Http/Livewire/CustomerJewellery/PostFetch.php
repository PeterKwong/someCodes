<?php

namespace App\Http\Livewire\CustomerJewellery;

use App\Models\InvoicePost;
use App\Models\Tag;
use App\Models\Page;
use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostFetch extends Component
{	

	public $selectingType = 'diamond';
  public $tagShowMore = ['show'=>false, 'count' => 0];
	public $search_conditions;
	public $tagIds=[];
	public $requestAll=[];

	//
	protected $listeners = ['addPage'];
	public $per_page = 12;

	public $posts;
	public $tags = [];
	public $upperId;
	public $selectedTags = [];


    public function render()
    {
    	$this->setTags();
        return view('livewire.customer-jewellery.post-fetch',['model'=>$this->getModel()]);

    	//
    	$this->getTags();
    	$this->getPosts();

    	cache()->remember('tagsCount', config('global.cache.day'), function () {
		    return  $this->tagsCount();
		});

        return view('livewire.customer-jewellery.post-fetch');
    }
    public function mount(){

    	$this->requestAll = request()->except(['jtype']);
			$this->getRequestParams();
    	$this->{Str::camel($this->selectingType). 'QueryCondition'}();
			$this->setSearchConditions();

		// dd($this->search_conditions);
    	//
    	$this->resetUpperId();
    }
	public function toggleShowMoreTags()
    {	

		$this->tagShowMore['show'] = !$this->tagShowMore['show'];

	}
	public function toggleSelectingType($type)
	{
		$this->selectingType = $type;
		$this->getRequestParams();
    $this->{Str::camel($this->selectingType). 'QueryCondition'}();
		$this->setSearchConditions();
	}
	public function resetAll(){

		return redirect(app()->getLocale() . '/customer-jewellery');


	}
	public function getRequestParams(){

		if (request()->has('jtype')) {
			$this->selectingType = request()->input('jtype');
		}

		
		// dd(request()->input());
		if (request()->has('weight')) {
			$weights = [
						[ 'value' =>0.01, 'range' => ''],
						[ 'value' =>0.3, 'range' => '0.3-0.49'],
						[ 'value' =>0.5, 'range' => '0.5-0.79'],
						[ 'value' =>0.8, 'range' => '0.8-0.99'],
						[ 'value' =>1, 'range' => '1.0-1.19'],
						[ 'value' =>1.2, 'range' => '1.2-1.49'],
						[ 'value' =>1.5, 'range' => '1.5-1.99'],
						[ 'value' =>2, 'range' => '2.0-2.99'],
						[ 'value' =>3, 'range' => '3.0up'],
						];

			$diamondRange ;

			foreach ($weights as $w => $weight) {
				if ( floatval(request()->input('weight')) >= $weight['value']) {
					$diamondRange = $weight['range'];
				}
			}
			$this->requestAll['weight'] = $diamondRange;

		}

		foreach ($this->requestAll as $key => $tag) {
			// dd($tag);
			$newTag = new Tag();

			if($this->selectingType =='wedding ring' || $this->selectingType =='jewellery'){
				$newTag = $newTag->where('type',$this->selectingType);
			}
						$upperId = $newTag->where('content', $key)
							->first();

			$newTag = new Tag();
			if($this->selectingType =='wedding ring' || $this->selectingType =='jewellery'){
				$newTag = $newTag->where('type',$this->selectingType);
			}			
			$tagData = $newTag->whereIn('content', explode(',', $tag))->get();	

			// dd($tagData->pluck('content')->all());

			$this->tagIds = array_merge($this->tagIds, $tagData->pluck('id')->all());
			$this->tags[$key] = $tagData->pluck('content')->all();

		}
		// dd($this->tagIds);
	}
	public function setSearchConditions()
	{	
		foreach ($this->tagIds as $tag) {
			foreach($this->search_conditions as $i =>$cons){
				foreach ($cons as $j => $con) {
					if ($con['tagId'] == $tag) {
						$this->search_conditions[$i][$j]['clicked'] = true;
					}
				}
			}
		}

	}
	public function clearTags($tag)
	{	
		$this->tagIds = array_diff($this->tagIds, Arr::pluck($this->search_conditions[strtolower($tag)],'tagId'));

	}
    public function setTags(){

    	// dd($this->tagIds);
		$type = Tag::whereIn('id', $this->tagIds)->get();
		// dd($type->pluck('upper_id')->all());

		$upperId = Tag::whereIn('id', $type->pluck('upper_id')->all() )->get();

		$this->tags = [];
		foreach($upperId as $upper){
			$id = $upper->id;
			// dd($type->filter(function($q)use($id){return $q->upper_id == $id;}));
			$this->tags[$upper->content] = $type->filter(function($q)use($id){return $q->upper_id == $id;})->pluck('content')->all();			
		}
		// dd($this->tags);



    }
    public function toggleValue($data)
    {	
		if ( in_array($data,$this->tagIds) ) {

			unset($this->tagIds[array_search($data,$this->tagIds)]);

		}else{

			array_push($this->tagIds,$data);

		}

	}
	public function getModel()
	{
		// $this->tagIds = range(11, 66);
    	$ids = $this->tagIds;
    	$model =  InvoicePost::where('published',1)
					->whereDate('date','<', now())
					->orderBy('date', 'desc');




			if($this->selectingType =='diamond' || $this->selectingType =='engagement ring'){
				$queryRanges = [
											//diamond
											range(13,20),
											range(21,30),
											range(31,42),
											range(43,51),
											range(53,55),
											range(62,66),

											//engagementRing
											range(70,72),
											range(73,75),
											range(76,77),

											];


			}
			if($this->selectingType =='jewellery'){
				    $queryRanges = [
												//jewellery
												range(107,111),
												range(112,116),
												range(117,119),
												];
			}

			if($this->selectingType =='wedding ring'){
					   $queryRanges = [
												//wedding ring
												range(84,87),
												range(88,91),
												range(92,95),
												range(96,98),
												range(99,101),
												range(102,103),
												];
				// $queryRanges = $this->{Str::camel($this->selectingType). 'Posts'}();
			}



			foreach($queryRanges as $r){
				$arr = array_intersect($r,$ids);
				if (count($arr)>0) {
			    	$model =  $model->whereHas('page.tags',function($q)use($arr){ $q->whereIn('id',$arr);});						
				}
			}

    $model =  $model->paginate($this->per_page);

		return $model;
	}

  public function engagementRingQueryCondition()
  {
    	$this->search_conditions = [
															'style'=>[
																'solitaire' => ['clicked'=>false,
																			  'value' => ['solitaire'],
																			  'tagId'=>70,
																			  'image'=>'1',
																			],
						                    'side-stone' => ['clicked'=>false,
						                                  'value' => ['side-stone'],
						                                  'tagId'=>71,
						                                  'image'=>'2',
						                              ],
																'halo' => ['clicked'=>false,
																			  'value' => ['halo'],
																			  'tagId'=>72,
																			  'image'=>'3',
																			],
																],
						                    'shoulder'=>[
						                        'tapering' => ['clicked'=>false,
						                                      'value' => ['tapering'],
						                                      'tagId'=>73,
						                                      'image'=>'6',
						                                  ],
						                        'parallel' => ['clicked'=>false,
						                                      'value' => ['parallel'],
						                                      'tagId'=>74,
						                                      'image'=>'4',
						                                  ],
						                        'twisted' => ['clicked'=>false,
						                                      'value' => ['twisted'],
						                                      'tagId'=>75,
						                                      'image'=>'5',
						                                  ],
						                        ],
															'prong'=>[
																'4-prong' => ['clicked'=>false,
																			  'value' => ['4-prong'],
																			  'tagId'=>76,
																			],
																'6-prong' => ['clicked'=>false,
																			  'value' => ['6-prong'],
																			  'tagId'=>77,
																			],
																],
														];

    }

    public function weddingRingQueryCondition()
    {
    	$this->search_conditions = [
									'shape'=>[
										'straight' => ['clicked'=>false,
													  'value' => ['straight'],
													  'tagId' => 84,
													  'image' => 1,
													],
                    'wave' => ['clicked'=>false,
                                  'value' => ['wave'],
                                  'tagId' => 86,
                                  'image' => 2,
                                ],
										'v-shape' => ['clicked'=>false,
													  'value' => ['v-shape'],
													  'tagId' => 85,
													  'image' => 3,
													],
										'cross' => ['clicked'=>false,
													  'value' => ['cross'],
													  'tagId' => 87,
													  'image' => 4,
													],
										],
                    'finish'=>[
                        'high polish' => ['clicked'=>false,
                                      'value' => ['high polish'],
                                      'tagId' => 88,
                                      'image' => 1,
                                    ],
                        'matte' => ['clicked'=>false,
                                      'value' => ['matte'],
                                      'tagId' => 89,
                                      'image' => 2,
                                    ],
                        'brushed' => ['clicked'=>false,
                                      'value' => ['brushed'],
                                      'tagId' => 90,
                                      'image' => 3,
                                    ],
                        'hammered' => ['clicked'=>false,
                                      'value' => ['hammered'],
                                      'tagId' => 91,
                                      'image' => 4,
                                    ],
                        ],
									'metal'=>[
										'18KW' => ['clicked'=>false,
													  'value' => ['18KW'],
													  'tagId'=>92,
													],
										'18KR' => ['clicked'=>false,
													  'value' => ['18KR'],
													  'tagId'=>93,
													],
										'PT' => ['clicked'=>false,
													  'value' => ['PT'],
													  'tagId'=>94,
													],
										'Mixed' => ['clicked'=>false,
													  'value' => ['Mixed'],
													  'tagId'=>95,
													],
										],
         //            'style'=>[
         //                'all' => ['clicked'=>false,
         //                              'value' => [''],
         //                              'tagId'=>null,
         //                            ],
         //                'milgrain' => ['clicked'=>false,
         //                              'value' => ['milgrain'],
         //                              'tagId'=>96,
         //                            ],
         //                'puzzle' => ['clicked'=>false,
         //                              'value' => ['puzzle'],
         //                              'tagId'=>97,
         //                            ],
         //                'forge' => ['clicked'=>false,
         //                              'value' => ['forge'],
         //                              'tagId'=>98,
         //                            ],
         //                ],

         //            'origin'=>[
         //                'all' => ['clicked'=>false,
         //                              'value' => [''],
         //                              'tagId'=>null,
         //                            ],
         //                'japan' => ['clicked'=>false,
         //                              'value' => ['japan'],
         //                              'tagId'=>103,
         //                            ],
         //                'local' => ['clicked'=>false,
         //                              'value' => ['local'],
         //                              'tagId'=>102,
         //                            ],
         //                ],

									// 'brand'=>[
         //              'all' => ['clicked'=>false,
         //                            'value' => [''],
         //                            'tagId'=>null,
         //                          ],
         //              'angerosa' => ['clicked'=>false,
         //                            'value' => ['angerosa'],
         //                            'tagId'=>99,
         //                          ],
         //              'feerie porte' => ['clicked'=>false,
         //                            'value' => ['feerie porte'],
         //                            'tagId'=>100,
         //                          ],
         //              'timeless ones' => ['clicked'=>false,
         //                            'value' => ['timeless ones'],
         //                            'tagId'=>101,
         //                          ],
									// 	],																		
								];

    }
    public function jewelleryQueryCondition()
    {
    	$this->search_conditions = [
									'type'=>[
										'ring' => ['clicked'=>false,
													  'value' => ['ring'],
													  'tagId' => 107,
													  'image' =>1,
													],
                    'necklace' => ['clicked'=>false,
                                  'value' => ['necklace'],
                                  'tagId' => 108,
                                  'image' =>2,
                                ],
										'earring' => ['clicked'=>false,
													  'value' => ['earring'],
													  'tagId' => 110,
													  'image' =>3,
													],
										'pendant' => ['clicked'=>false,
													  'value' => ['pendant'],
													  'tagId' => 111,
													  'image' =>4,
													],
										'bracelet' => ['clicked'=>false,
													  'value' => ['bracelet'],
													  'tagId' => 109,
													  'image' =>5,
													],
										],
                  'metal'=>[
                      '18KW' => ['clicked'=>false,
                                    'value' => ['18KW'],
                                    'tagId' => 112,
                                  ],
                      '18KR' => ['clicked'=>false,
                                    'value' => ['18KR'],
                                    'tagId' => 113,
                                  ],
                      '18KY' => ['clicked'=>false,
                                    'value' => ['18KY'],
                                    'tagId' => 114,
                                  ],
                      'PT' => ['clicked'=>false,
                                    'value' => ['PT'],
                                    'tagId' => 115,
                                  ],
                      'mixed' => ['clicked'=>false,
                                    'value' => ['mixed'],
                                    'tagId' => 116,
                                  ],
                      ],
									'gemstone'=>[
										'diamond' => ['clicked'=>false,
													  'value' => ['diamond'],
													  'tagId' => 117,
													],
										'pearl' => ['clicked'=>false,
													  'value' => ['pearl'],
													  'tagId' => 119,
													],
										'fancy diamond' => ['clicked'=>false,
													  'value' => ['fancy diamond'],
													  'tagId' => 118,
													],
										],
                                																
								];
    }
    public function diamondQueryCondition()
    {	
    	$this->search_conditions = [
    								'shape'=>[
										'round' => ['clicked'=>false,
													  'value' => ['round'],
													  'tagId' => 21,
													  'image'=>'22.png',
													],
										'heart' => ['clicked'=>false,
													  'value' => ['heart'],
													  'tagId' => 22,
													  'image'=>'22-6.png',
													],
										'princess' => ['clicked'=>false,
													  'value' => ['princess'],
													  'tagId' => 23,
													  'image'=>'22-3.png',
													],
										'emerald' => ['clicked'=>false,
													  'value' => ['emerald'],
													  'tagId' => 24,
													  'image'=>'22-2.png',
													],										
										'marquise' => ['clicked'=>false,
													  'value' => ['marquise'],
													  'tagId' => 28,
													  'image'=>'23-1.png',
													],
										'cushion' => ['clicked'=>false,
													  'value' => ['cushion'],
													  'tagId' => 26,
													  'image'=>'22-4.png',
													],
										'asscher' => ['clicked'=>false,
													  'value' => ['asscher'],
													  'tagId' => 25,
													  'image'=>'22-5.png',
													],
										'oval' => ['clicked'=>false,
													  'value' => ['oval'],
													  'tagId' => 27,
													  'image'=>'23.png',
													],
										'radiant' => ['clicked'=>false,
													  'value' => ['radiant'],
													  'tagId' => 29,
													  'image'=>'22-7.png',
													],
										'pear' => ['clicked'=>false,
													  'value' => ['pear'],
													  'tagId' => 30,
													  'image'=>'22-1.png',
													],
										],
									'color'=>[
										'D' => ['clicked'=>false,
													  'value' => ['D'],
													  'tagId' => 31],
										'E' => ['clicked'=>false,
													  'value' => ['E'],
													  'tagId' => 32],
										'F' => ['clicked'=>false,
													  'value' => ['F'],
													  'tagId' => 33],
										'G' => ['clicked'=>false,
													  'value' => ['G'],
													  'tagId' => 34],
										'H' => ['clicked'=>false,
													  'value' => ['H'],
													  'tagId' => 35],
										'I' => ['clicked'=>false,
													  'value' => ['I'],
													  'tagId' => 36],
										'J' => ['clicked'=>false,
													  'value' => ['J'],
													  'tagId' => 37],
										'K' => ['clicked'=>false,
													  'value' => ['K'],
													  'tagId' => 38],
										'L' => ['clicked'=>false,
													  'value' => ['L'],
													  'tagId' => 39],
										'M' => ['clicked'=>false,
													  'value' => ['M'],
													  'tagId' => 40],
										'N' => ['clicked'=>false,
													  'value' => ['N'],
													  'tagId' => 41],
										'Fancy' => ['clicked'=>false,
													  'value' => ['Fancy'],
													  'tagId' => 42],
										],
									'cut'=>[
										'Excellent' => ['clicked'=>false,
													  'value' => ['Excellent'],
													  'tagId' => 53,
													],
										'Very Good' => ['clicked'=>false,
													  'value' => ['Very Good'],
													  'tagId' => 54,
													],
										'Good' => ['clicked'=>false,
													  'value' => ['Good'],
													  'tagId' => 55,
													] 
										],
									'clarity'=>[
										'FL' => ['clicked'=>false,
													  'value' => ['FL'],
													  'tagId' => 43],
										'IF' => ['clicked'=>false,
													  'value' => ['IF'],
													  'tagId' => 44],
										'VVS1' => ['clicked'=>false,
													  'value' => ['VVS1'],
													  'tagId' => 45],
										'VVS2' => ['clicked'=>false,
													  'value' => ['VVS2'],
													  'tagId' => 46],
										'VS1' => ['clicked'=>false,
													  'value' => ['VS1'],
													  'tagId' => 47],
										'VS2' => ['clicked'=>false,
													  'value' => ['VS2'],
													  'tagId' => 48],
										'SI1' => ['clicked'=>false,
													  'value' => ['SI1'],
													  'tagId' => 49],
										'SI2' => ['clicked'=>false,
													  'value' => ['SI2'],
													  'tagId' => 50],
										'I1' => ['clicked'=>false,
													  'value' => ['I1'],
													  'tagId' => 51]
										],
									'fluorescence'=>[
										'None' => ['clicked'=>false,
													  'value' => ['None'],
													  'tagId' => 62,
													],
										'Faint' => ['clicked'=>false,
													  'value' => ['Faint'],
													  'tagId' => 63,
													],
										'Medium' => ['clicked'=>false,
													  'value' => ['Medium'],
													  'tagId' => 64,
													],
										'Strong' => ['clicked'=>false,
													  'value' => ['Strong'],
													  'tagId' => 65,
													],
										'Very Strong' => ['clicked'=>false,
													  'value' => ['Very Strong'],
													  'tagId' => 66,
													]
										],

									];


    }
	 //  public function engagementRingPosts()
	 //  {	

		// $queryRanges = [
		// 				range(70,72),
		// 				range(73,75),
		// 				range(76,77),
		// 				];


		// return $queryRanges;


	 //  }    
  //   public function diamondPosts()
  //   {	

		// $queryRanges = [
		// 				range(13,20),
		// 				range(21,30),
		// 				range(31,42),
		// 				range(43,51),
		// 				range(53,55),
		// 				range(62,66),
		// 				];

		// return $queryRanges;


  //   }
  //   public function weddingRingPosts(){
  //   			$queryRanges = [
		// 				//wedding ring
		// 				range(84,87),
		// 				range(88,91),
		// 				range(92,95),
		// 				range(96,98),
		// 				range(99,101),
		// 				range(102,103),
		// 				];

  //   	return $queryRanges;							
  //   }
  //   public function jewelleryPosts(){
  //   			$queryRanges = [
		// 				//jewellery
		// 				range(107,111),
		// 				range(112,115),
		// 				range(116,118),
		// 				];

  //   	return $queryRanges;							
  //   }
    public function getPosts(){
    	

        	// dd($this->posts);

        if (count($this->selectedTags)>0) {
        	// dd($this->selectedTags);

        	// $tags = [];
        	$this->posts = InvoicePost::where('published',1)
			->whereDate('date','<', now())
			->orderBy('date', 'desc');

        	foreach ($this->selectedTags as $key => $value) {
        		$tag = $value['id'];
        		
	        	$this->posts = $this->posts
				->whereHas('page.tags', function($query)use($tag){ 
						$query = $query->where('tag_id',$tag);
				
				});
        	}
        	return $this->queryPosts();


        }else{

        	cache()->remember('postFetch.noSelecdTags',config('global.cache.day'),function(){
        		// dd('cache');
    	    	$this->posts = InvoicePost::where('published',1)
					->whereDate('date','<', now())
					->orderBy('date', 'desc');

        		return $this->queryPosts();
        	});
        }


    }

    public function queryPosts()
    {
    	$this->posts = $this->posts

        				->with([
	                        	// 'texts',        						
        						'images' => function($query){ 
	                                    $query->where('type','cover');
	                                    }, 
	                    ])->paginate($this->per_page);

        $titles = $this->posts;

		$this->posts = $this->posts->toArray();

        foreach ($titles as $key => $title) {

        	$this->posts['data'][$key]['invoice'] = $title->title($title->id);

        }

    }

    public function addPage(){

		$this->per_page +=20;

	}
	public function getTags(){

		if (count(request()->input())) {
			$this->getRequestTags();
		}
		if ($this->upperId[0]['id'] == 0) {
			cache()->remember('postFetch.noUpperId',config('global.cache.day'),function(){
        		// dd('Uppercache');
    	    	return $this->tags = Tag::where('upper_id', $this->upperId[count($this->upperId)-1]['id'])
							// ->where('locale', app()->getLocale())
							->get();
        	});

		}

		$this->tags = Tag::where('upper_id', $this->upperId[count($this->upperId)-1]['id'])
							// ->where('locale', app()->getLocale())
							->get();

		if (count($this->tags) == 0) {
			$this->popLastArray();
		}

		// dd($this->tags);
	}
	public function getRequestTags(){

		// $types = ['Shape','Weight','Color','Clarity','Cut','Symmetry','Polish','Fluorescence'];
		// dd(request()->except(['type']));
		$tags = request()->except(['type']);
		$type = '';
		if (request()->has('type')) {
			$type = request()->query('type');
			// dd($type);
		}

		$selectedTags;

		if (request()->input()) {
			$tags = explode(',', request()->query('tag'));
		}


		if (request()->has('weight')) {
		// dd(request()->query('weight'));
			$weights = [
						[ 'value' =>0.01, 'range' => ''],
						[ 'value' =>0.3, 'range' => '0.3-0.49'],
						[ 'value' =>0.5, 'range' => '0.5-0.79'],
						[ 'value' =>0.8, 'range' => '0.8-0.99'],
						[ 'value' =>1, 'range' => '1.0-1.19'],
						[ 'value' =>1.2, 'range' => '1.2-1.49'],
						[ 'value' =>1.5, 'range' => '1.5-1.99'],
						[ 'value' =>2, 'range' => '2.0-2.99'],
						[ 'value' =>3, 'range' => '3.0up'],
						];

			$diamondRange ;

			foreach ($weights as $w => $weight) {
			// dd(floatval($diamond->weight));
				if ( floatval(request()->query('weight')) >= $weight['value']) {
					$diamondRange = $weight['range'];
						// dd($diamond->weight);
				}
			}
			$tags['weight'] = $diamondRange;
						// dd($tags);

		}

		foreach ($tags as $key => $tag) {

			// dd($type);

			$upperId = Tag::where('type',$type)->where('content', $key)
							->first();
			// dd($upperId->id);

			
			$tagData = Tag::where('content', $tag)
							->first();	

			if ($upperId && $tagData) {

				$tagData = Tag::where('content', $tag)
							->where('upper_id',$upperId->id)
							->first();
							// dd($tagData->toArray());
			}

			if ($tagData) {							
				$this->selectedTags[] = $tagData->toArray();
			}
		}
		// dd($this->selectedTags);
	} 
	public function tagsCount(){
		
		$tags = Tag::all();
		$upperIdList = [];

		foreach ($tags as $tag) {
			if (!in_array($tag->upper_id,$upperIdList)) {
						 $upperIdList[] = $tag->upper_id;
				}
		}
		// dd(array_reverse($upperIdList));

		$count = [];

		foreach ($tags as $tag) {
			if (!in_array($tag->id,$upperIdList)) {

					$invoicePosts = Page::where('paginable_type', 'App\Models\InvoicePost')
					->whereHas('tags', function($tags)use($tag){
						$tags->where('id', $tag->id);
					})->count();
					$tag->update(['count' => $invoicePosts]);
					// dd($invoicePosts);
			}
		}	

		foreach (array_reverse($upperIdList) as $upperId) {

				$tagsCount = Tag::where('upper_id',$upperId)->select('count')->get();

				$count = 0;
				foreach ($tagsCount as $t) {
					$count += $t->count;
				}

				$upperIdUpdated = Tag::where('id',$upperId)->update(['count' => $count]);

		}	



	}
	public function setUpperId($upperId, $content, $count, $type){
			// dd($this->checkSameType($type));

		if (!$this->checkSameType($type)) {
			// dd($this->checkSameType($type));
			$this->selectedTags = [];
		}
		$this->upperId[] = ['id' => $upperId, 'content' => $content, 'count' => $count, 'type' => $type];

	}
	public function checkSameType($type){

		$types = ['Diamond' => 1, 'Engagement Ring' => 1 , 'Wedding Ring' => 2, 'Jewellery' => 3];
		$boolean =  true;

		foreach ($this->selectedTags as $key => $tag) {
			// dd($type);
			if ( $types[$tag['type']] !=  $types[$type] ) {
				// dd($type);
				return $boolean = false;
			}
			
		}
		return $boolean;
	} 

	public function popLastArray(){

		if (count($this->tags) == 0) {

			$this->selectedTags[] = $this->upperId[count($this->upperId)-1];
			$this->resetUpperId();
	    	$this->getTags();
			return;

		}

		array_pop($this->upperId);

	}
	public function deleteSelectedTags($index){
		array_splice($this->selectedTags, $index ,1);
	} 
	// public function resetAll(){
	// 	$this->selectedTags = [];
	// 	$this->resetUpperId();
 //    	$this->getTags();

	// }
	public function resetUpperId(){
		// dd('hi');
		$this->upperId = [];
		$this->upperId[] = ['id'=>0, 'content' => '', 'type'=> 'Diamond'];
	} 
}
