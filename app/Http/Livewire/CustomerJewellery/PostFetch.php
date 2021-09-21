<?php

namespace App\Http\Livewire\CustomerJewellery;

use App\Models\InvoicePost;
use App\Models\Tag;
use App\Models\Page;
use Livewire\Component;

class PostFetch extends Component
{	

	protected $listeners = ['addPage'];
	public $per_page = 10;


	public $posts;
	public $tags;
	public $upperId;
	public $selectedTags = [];
	public $search_conditions;


    public function render()
    {

    	$this->getTags();
    	$this->getPosts();

    	cache()->remember('tagsCount', config('global.cache.day'), function () {
		    return  $this->tagsCount();
		});

        return view('livewire.customer-jewellery.post-fetch');
    }
    public function mount(){

    	$this->resetUpperId();
    } 
    public function queryConditionDiamond()
    {
    	$search_conditions = ['shape'=>[
										'round' => ['clicked'=>false,
													  'value' => ['round']],
										'pear' => ['clicked'=>false,
													  'value' => ['pear']],
										'emerald' => ['clicked'=>false,
													  'value' => ['emerald']],
										'princess' => ['clicked'=>false,
													  'value' => ['princess']],
										'marquise' => ['clicked'=>false,
													  'value' => ['marquise']],
										'cushion' => ['clicked'=>false,
													  'value' => ['cushion']],
										'asscher' => ['clicked'=>false,
													  'value' => ['asscher']],
										'oval' => ['clicked'=>false,
													  'value' => ['oval']],
										'heart' => ['clicked'=>false,
													  'value' => ['heart']],
										'radiant' => ['clicked'=>false,
													  'value' => ['radiant']]
										],
									'color'=>[
										'D' => ['clicked'=>false,
													  'value' => ['D']],
										'E' => ['clicked'=>false,
													  'value' => ['E']],
										'F' => ['clicked'=>false,
													  'value' => ['F']],
										'G' => ['clicked'=>false,
													  'value' => ['G']],
										'H' => ['clicked'=>false,
													  'value' => ['H']],
										'I' => ['clicked'=>false,
													  'value' => ['I']],
										'J' => ['clicked'=>false,
													  'value' => ['J']],
										'K' => ['clicked'=>false,
													  'value' => ['K']],
										'L' => ['clicked'=>false,
													  'value' => ['L']],
										'M' => ['clicked'=>false,
													  'value' => ['M']],
										'N' => ['clicked'=>false,
													  'value' => ['N']],
										'Fancy' => ['clicked'=>false,
													  'value' => ['Fancy']],
										],
									'cut'=>[
										'Excellent' => ['clicked'=>false,
													  'value' => ['Excellent']
													],
										'Very Good' => ['clicked'=>false,
													  'value' => ['Very Good']
													],
										'Good' => ['clicked'=>false,
													  'value' => ['Good']
													] 
										],
									'clarity'=>[
										'FL' => ['clicked'=>false,
													  'value' => ['FL']],
										'IF' => ['clicked'=>false,
													  'value' => ['IF']],
										'VVS1' => ['clicked'=>false,
													  'value' => ['VVS1']],
										'VVS2' => ['clicked'=>false,
													  'value' => ['VVS2']],
										'VS1' => ['clicked'=>false,
													  'value' => ['VS1']],
										'VS2' => ['clicked'=>false,
													  'value' => ['VS2']],
										'SI1' => ['clicked'=>false,
													  'value' => ['SI1']],
										'SI2' => ['clicked'=>false,
													  'value' => ['SI2']],
										'I1' => ['clicked'=>false,
													  'value' => ['I1']]
										],
									'polish'=>[
										'Excellent' => ['clicked'=>false,
													  'value' => ['Excellent']
													],
										'Very Good' => ['clicked'=>false,
													  'value' => ['Very Good']
													],
										'Good' => ['clicked'=>false,
													  'value' => ['Good']
													] 
										],
									'fluorescence'=>[
										'None' => ['clicked'=>false,
													  'value' => ['None']
													],
										'Faint' => ['clicked'=>false,
													  'value' => ['Faint']
													],
										'Medium' => ['clicked'=>false,
													  'value' => ['Medium']
													],
										'Strong' => ['clicked'=>false,
													  'value' => ['Strong']
													],
										'Very Strong' => ['clicked'=>false,
													  'value' => ['Very Strong']
													]
										],
									'symmetry'=>[
										'Excellent' => ['clicked'=>false,
													  'value' => ['Excellent']
													],
										'Very Good' => ['clicked'=>false,
													  'value' => ['Very Good']
													],
										'Good' => ['clicked'=>false,
													  'value' => ['Good']
													] 
										],
									'location'=>[
										'1Hong Kong' => ['clicked'=>false,
													  'value' => ['1Hong Kong']],
										],
									];
    }
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
		$tags = request()->except(['type']);
		$type = '';
		if (request()->has('type')) {
			$type = request()->query('type');
			// dd($type);
		}

		$selectedTags;

		// if (request()->input()) {
		// 	$tags = explode(',', request()->query('tag'));
		// }


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
	public function resetAll(){
		$this->selectedTags = [];
		$this->resetUpperId();
    	$this->getTags();

	}
	public function resetUpperId(){
		// dd('hi');
		$this->upperId = [];
		$this->upperId[] = ['id'=>0, 'content' => '', 'type'=> 'Diamond'];
	} 
}
