<?php

namespace App\Http\Livewire;

use App\InvoicePost;
use App\Tag;
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
    	$this->getPosts();
    	$this->getTags();

        return view('livewire.post-fetch');
    }
    public function mount(){

    	$this->resetUpperId();
    } 

    public function getPosts(){
    	
    	$this->posts = InvoicePost::where('published',1)->orderBy('date', 'desc');

        if (count($this->selectedTags)>0) {

        	$tags = [];
        	foreach ($this->selectedTags as $key => $value) {
        		$tags[] = $value['id'];
        	}
        	// dd($tags);

        	$this->posts = $this->posts->whereHas('pages.tags', function($query)use($tags){ 
        												$query->whereIn('tag_id',$tags);
        										});
        	// dd($this->posts->get());

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

	}
	
	public function setUpperId($upperId, $content){

		$this->upperId[] = ['id' => $upperId, 'content' => $content];

	}

	public function popLastArray(){

		if (count($this->tags) == 0) {

			$this->selectedTags[] = $this->upperId[count($this->upperId)-1];
			$this->resetUpperId();
			return;

		}

		array_pop($this->upperId);

	}
	public function deleteSelectedTags($index){
		array_splice($this->selectedTags, $index ,1);
	} 

	public function resetUpperId(){
		$this->upperId = [];
		$this->upperId[] = ['id'=>0, 'content' => ''];
	} 
}
