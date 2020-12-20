<?php

namespace App\Http\Livewire;

use App\InvoicePost;
use App\Tag;
use App\Page;
use Livewire\Component;

class PostFetch extends Component
{	

	protected $listeners = ['addPage'];
	public $per_page = 10;


	public $posts;
	public $tags;
	public $upperId;
	public $selectedTags = [];

    public function render()
    {

    	$this->getTags();
    	$this->getPosts();

    	cache()->remember('tagsCount', 36000, function () {
		    return  $this->tagsCount();
		});

        return view('livewire.post-fetch');
    }
    public function mount(){

    	$this->resetUpperId();
    } 

    public function getPosts(){
    	
    	$this->posts = InvoicePost::where('published',1)->orderBy('date', 'desc');

        if (count($this->selectedTags)>0) {
        	// dd($this->selectedTags);

        	// $tags = [];
        	foreach ($this->selectedTags as $key => $value) {
        		$tag = $value['id'];
        		
	        	$this->posts = $this->posts
				->whereHas('pages.tags', function($query)use($tag){ 
						$query = $query->where('tag_id',$tag);
				
				});
        	}
        	// dd($tags);

        	// $this->posts = $this->posts->whereHas('pages.tags', function($query)use($tags){ 

        	// 											$query->whereIn('tag_id',$tags);
        	// 									});


       //  	$this->posts = $this->posts
       //  					->whereHas('pages.tags', function($query)use($tags){ 
       //  							$query = $query->where('tag_id',33);
        					
							// });
        	// dd($this->posts);

        }
        
        $this->posts = $this->posts

        				->with(['images' => function($query){ 
	                                    $query->where('type','cover');
	                                    }, 
	                        	'texts',
	                        	// 'pages.tags',
	                    ])->paginate($this->per_page)->toArray();


    }

    public function addPage(){

		$this->per_page +=20;

	}
	public function getTags(){

		$this->tags = Tag::where('upper_id', $this->upperId[count($this->upperId)-1]['id'])
							// ->where('locale', app()->getLocale())
							->get();

		if (count($this->tags) == 0) {
			$this->popLastArray();
		}

		// dd($this->tags);
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

					$invoicePosts = Page::where('paginable_type', 'App\InvoicePost')
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
				// dd($upperIdUpdated);

				// $invoicePosts = Page::where('paginable_type', 'App\InvoicePost')
				// ->whereHas('tags', function($tags)use($tag){
				// 	$tags->where('id', $tag->id);
				// })->count();
				// $tag->update(['count' => $invoicePosts]);

				// dd($count);
		}	

		// dd($invoicePosts);

		// $invoicePosts = Page::where('paginable_type', 'App\InvoicePost')
		// 				->whereHas('tags', function($tags){
		// 					$tags->where('type', 'wedding ring');
		// 				})
		// 				->with('tags')->count();

		// dd($this->tags);

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

		$types = ['Diamond' => 1, 'Engagement Ring' => 1 , 'Wedding Ring' => 2, 'Jewelleries' => 3];
		$boolean =  true;

		foreach ($this->selectedTags as $key => $tag) {
			// dd($types[$tag['type']]);
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

	public function resetUpperId(){
		$this->upperId = [];
		$this->upperId[] = ['id'=>0, 'content' => '', 'type'=>1];
	} 
}
