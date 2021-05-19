<?php

namespace App\Http\Livewire\CustomerJewellery;

use App\Models\InvoicePost;
use App\Models\Tag;
use Livewire\Component;

class PostFetchRow extends Component
{
	public $readyToLoad = true;
    public $type;
    public $upperType;
    public $query;
    public $draggableId;

    public $per_page = 8;
    public $posts;
    public $upperId;
    public $tagId = [];

    public function loadPosts()
    {
        $this->readyToLoad = true;
        // dd('hi');

    }

    public function render()
    {
        // dd('hi');
        return view('livewire.customer-jewellery.post-fetch-row', [
            'posts' => $this->readyToLoad
                ? $this->delayLoad()
                : [],
        ]);
    }
    public function delayLoad(){
        // dd('loadded');
        $this->getTagId();
        $this->getPosts();
    }

    public function getPosts(){
        
        $tag = $this->tagId;

        if (isset($tag->id)) {

            $this->posts = InvoicePost::where('published',1)
                    ->whereDate('date','<', now())
                    ->orderBy('date', 'desc');


            $this->posts = $this->posts
            ->whereHas('page.tags', function($query)use($tag){ 
                    $query = $query->where('tag_id',$tag->id);
            
            });

            
            $this->posts = $this->posts

                            ->with(['images' => function($query){ 
                                            $query->where('type','cover');
                                            }, 
                                    // 'texts',
                            ])->paginate($this->per_page);
                            // dd($this->posts);
            $invoicePosts = [];
            
            foreach ($this->posts as $key => $post ) {

                    $post->texts->content = $post->title($post->id);
                    $invoicePosts[] = $post;
                    
            }

            $this->posts = $invoicePosts;

        }        



    }
    public function getTagId(){



        if ($this->upperType == 'weight') {
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
                if ( floatval($this->query) >= $weight['value']) {
                    $diamondRange = $weight['range'];
                        // dd($diamond->weight);
                }
            }
            $this->query = $diamondRange;
                        // dd($tags);

        }

        $this->upperId = Tag::where('type',$this->type)->where('content', $this->upperType)
                        ->first();
        // dd($this->upperId);

        if (isset($this->upperId->id)) {

            $tagData = Tag::where('content', $this->query)
            ->where('upper_id',$this->upperId->id)
            ->first();


            $this->tagId = $tagData;
        }



    }

}
