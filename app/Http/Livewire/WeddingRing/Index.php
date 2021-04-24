<?php

namespace App\Http\Livewire\WeddingRing;

use App\Models\WeddingRingPair;
use Livewire\Component;

class Index extends Component
{	
    protected $listeners = ['addPage'];

	public $model;
	public $fetchData;
	public $search_conditions = [
									'shape'=>[
										'straight' => ['clicked'=>false,
													  'value' => ['straight']],
                                        'wave' => ['clicked'=>false,
                                                      'value' => ['wave']],
										'v-shape' => ['clicked'=>false,
													  'value' => ['v-shape']],
										'cross' => ['clicked'=>false,
													  'value' => ['cross']],
										],
                                    'finish'=>[
                                        'high polish' => ['clicked'=>false,
                                                      'value' => ['high polish']],
                                        'matte' => ['clicked'=>false,
                                                      'value' => ['matte']],
                                        'brushed' => ['clicked'=>false,
                                                      'value' => ['brushed']],
                                        'hammered' => ['clicked'=>false,
                                                      'value' => ['hammered']],
                                        ],
									'metal'=>[
										'18KW' => ['clicked'=>false,
													  'value' => ['18KW']],
										'18KR' => ['clicked'=>false,
													  'value' => ['18KR']],
										'PT' => ['clicked'=>false,
													  'value' => ['PT']],
										'Mixed' => ['clicked'=>false,
													  'value' => ['Mixed']],
										],
                                    'style'=>[
                                        'all' => ['clicked'=>false,
                                                      'value' => ['']],
                                        'milgrain' => ['clicked'=>false,
                                                      'value' => ['milgrain']],
                                        'puzzle' => ['clicked'=>false,
                                                      'value' => ['puzzle']],
                                        'forge' => ['clicked'=>false,
                                                      'value' => ['forge']],
                                        ],

                                    'origin'=>[
                                        'all' => ['clicked'=>false,
                                                      'value' => ['']],
                                        'japan' => ['clicked'=>false,
                                                      'value' => ['japan']],
                                        'local' => ['clicked'=>false,
                                                      'value' => ['local']],
                                        ],

									'brand'=>[
                                        'all' => ['clicked'=>false,
                                                      'value' => ['']],
                                        'angerosa' => ['clicked'=>false,
                                                      'value' => ['angerosa']],
                                        'feerie porte' => ['clicked'=>false,
                                                      'value' => ['feerie porte']],
                                        'timeless ones' => ['clicked'=>false,
                                                      'value' => ['timeless ones']],
										],																		
								];

    public function render()
    {   
        if ( isset($_COOKIE['weddingRing']) ) {

            $same = true ;
            $columns = ['shape','finish','metal','origin','style','brand'];

            
            $cookie = (array)json_decode($_COOKIE['weddingRing']) ;

            foreach ($columns as $column) {
                if ($same && $this->fetchData[$column] != $cookie[$column]) {
                    $same = false;
                }
            }

            $this->setcookie();

            // dd($this->fetchData );

        }
        $this->index();
        // dd($this->fetchData);
        return view('livewire.wedding-ring.index');
    }
    public function mount(){
        $this->resetSettings();

            // dd($this->fetchData );
        if (!isset($_COOKIE['weddingRing'])) {
            $this->setCookie();
        }
        if (isset($_COOKIE['weddingRing'])) {
            $this->getCookie();

        }
        $this->extraUrls();
        $this->setClickedSearchConditions();

    }    
    public function setCookie(){

        $time = time() + (60 * config('global.cookie.time') );

        setcookie('weddingRing', json_encode($this->fetchData), $time , "/");

    }
    public function getCookie(){
        $this->fetchData = (array)json_decode($_COOKIE['weddingRing']);
        // dd($this->fetchData);
    } 
    public function resetCookies(){

        $time = time() * 0 ;

        setcookie('weddingRing', '', $time , "/");


    }
    public function extraUrls(){
        
        // $this->resetCookies();

        $listUrls = [
                    '/feerie-porte' => ['brand'=>['feerie porte']],
                    '/timeless-ones' => ['brand'=>['timeless ones']],
                    '/angerosa' => ['brand'=>['angerosa']],
                    '/forge' => ['style'=>['forge']],
                    '/japanese' => ['origin'=>['japan']],
                    ];

        foreach ($listUrls as $key => $value) {

            if (strpos( url()->current(), $key )) {
                $this->fetchData[key($value)] = $value[key($value)] ;  
                // request()->merge([ key($value) => $value['weight'] ]);
                    // dd( request()->all() );
            }
            
        }
        $this->setCookie();

    } 
    public function setClickedSearchConditions(){

                    // dd($this->search_conditions['color']);
        foreach ($this->search_conditions as $iKey => $iValue) {
            foreach ($this->fetchData[$iKey] as $key => $value) {

                if (isset($this->search_conditions[$iKey][$value])) {
                    $this->search_conditions[$iKey][$value]['clicked'] = true ;
                }
            }
        }

        // dd($this->fancy_color);
    } 
    public function index()
    {	
        // dd($this->fetchData);

	 	$requests = ['shape','finish','metal','origin','style','brand'];

        $query = WeddingRingPair::orderBy('unit_price', 'asc');

 		foreach ($requests as $req) {
 			if (count((array)$this->fetchData[$req]) && !in_array('', (array)$this->fetchData[$req]) ) {
 				$query = $query->whereHas('weddingRings',function($q)use($req){
                    // dd($this->fetchData[$req]);
	              $q->whereIn( $req , (array)$this->fetchData[$req] );
	            });
 			}

 		}

	     $this->model = $query->where('published',1)
                        ->with('weddingRings.images')
			            ->paginate($this->fetchData['per_page']);

        $data =  $this->model->toArray();

        foreach ($this->model as $k => $da) {
            foreach ($da->weddingRings as $key => $d) {

                $data['data'][$k]['wedding_rings'][$key]['title'] = $d->title();
            }
        }

        $this->model = $data ;

    }
    public function toggleValue($condition, $data)
    {   
        // dd($condition, $data);


        if ( in_array($data,$this->fetchData[$condition]) ) {
        // dd($condition, $data);

            foreach ($this->search_conditions[$condition][$data]['value'] as $key => $value) {

                unset($this->fetchData[$condition][array_search($value,$this->fetchData[$condition])]);
                
                // dd($this->fetchData );

            }


        }else{

            foreach ($this->search_conditions[$condition][$data]['value'] as $key => $value) {


                array_push($this->fetchData[$condition],$value);

            }

        }

        $this->search_conditions[$condition][$data]['clicked'] = !$this->search_conditions[$condition][$data]['clicked'];

        $this->setCookie();

    }
    public function resetAll(){

        $this->resetCookies();
        $this->resetSettings();
        // dd('hi');
        redirect(app()->getLocale() . '/wedding-rings');


    }
    public function resetSettings(){

        $this->resetFetchData();
    } 

    public function resetPartial(){
        
        $this->fetchData['per_page'] = 10;

    }
    public function addPage(){

        $this->fetchData['per_page'] +=10;
        // dd($this->fetchData['per_page']);

    }
    public function resetFetchData(){

            $this->fetchData = ['page' =>1,  'column' => 'price','direction' => 'asc',
                         'per_page' => 15,
                         'shape' => [], 'finish' => [], 'metal' => [], 'origin' => [],'style' => [], 'brand' => [], 
                    ];
            $this->preset = $this->fetchData;
    } 

}
