<?php

namespace App\Http\Livewire\EngagementRing;

use App\Models\EngagementRing;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['addPage'];

	public $model;
	public $fetchData;
    public $tags;
	public $search_conditions = [
									'style'=>[
										'solitaire' => ['clicked'=>false,
													  'value' => ['solitaire']],
                                        'side-stone' => ['clicked'=>false,
                                                      'value' => ['side-stone']],
										'halo' => ['clicked'=>false,
													  'value' => ['halo']],
										],
                                    'shoulder'=>[
                                        'tapering' => ['clicked'=>false,
                                                      'value' => ['tapering']],
                                        'parallel' => ['clicked'=>false,
                                                      'value' => ['parallel']],
                                        'twisted' => ['clicked'=>false,
                                                      'value' => ['twisted']],
                                        ],
									'prong'=>[
										'4-prong' => ['clicked'=>false,
													  'value' => ['4-prong']],
										'6-prong' => ['clicked'=>false,
													  'value' => ['6-prong']],
										],
                                    'shape'=>[
                                        'round' => ['clicked'=>false,
                                                      'value' => ['round']],
                                        'heart' => ['clicked'=>false,
                                                      'value' => ['heart']],
                                        'princess' => ['clicked'=>false,
                                                      'value' => ['princess']],
                                        'emerald' => ['clicked'=>false,
                                                      'value' => ['emerald']],
                                        'asscher' => ['clicked'=>false,
                                                      'value' => ['asscher']],
                                        'oval' => ['clicked'=>false,
                                                      'value' => ['oval']],
                                        'cushion' => ['clicked'=>false,
                                                      'value' => ['cushion']],
                                        'marquise' => ['clicked'=>false,
                                                      'value' => ['marquise']],
                                        'radiant' => ['clicked'=>false,
                                                      'value' => ['radiant']],
                                        'pear' => ['clicked'=>false,
                                                      'value' => ['pear']],
                                        ],
									'other'=>[
                                        'all' => ['clicked'=>false,
                                                      'value' => ['']],
										'enlarge' => ['clicked'=>false,
													  'value' => ['enlarge']],
										'hand-engraving' => ['clicked'=>false,
													  'value' => ['hand-engraving']],
										],                                   																
								];

    public function render()
    {   
        if ( isset($_COOKIE['engagementRing']) ) {

            $same = true ;
            $columns = ['style','shoulder','prong','shape','other','column','direction'];

            
            $cookie = (array)json_decode($_COOKIE['engagementRing']) ;

            foreach ($columns as $column) {
                if ($same && $this->fetchData[$column] != $cookie[$column]) {
                    $same = false;
                }
            }

            $this->setcookie();

            // dd($this->fetchData );

        }
        $this->index();
        $this->setTags();
        // dd($this->model);
        // dd($this->fetchData);
        return view('livewire.engagement-ring.index');
    }
    public function mount(){

        $this->resetSettings();

        if (!isset($_COOKIE['engagementRing'])) {
            $this->setCookie();
        }
        if (isset($_COOKIE['engagementRing'])) {
            $this->getCookie();

        }
        $this->extraUrls();
        $this->setRequest();
        $this->setClickedSearchConditions();

    }
    public function setTags(){
        $columns = ['page','column','direction','per_page'];
        $ori = $this->fetchData;

        foreach ($columns as $key => $query) {
            unset($this->fetchData[$query]);
        }
        // dd($this->fetchData);
        $this->tags = $this->fetchData;
        $this->fetchData = $ori;

    }
    public function setRequest(){
                // dd( request()->all() );
          $trans = [
          ];

          $checkKeys = ['cut','symmetry','polsh','fluorescence'];

        foreach (request()->all() as $key => $value) {
            if (is_string( $value ) || is_int($value)) {
                if (in_array($key, $checkKeys)) {
                    $value = array_key_exists($value, $trans)?$trans[$value]:$value;

                }
                $this->fetchData[$key] = explode(',',$value );

            }

        }
        $this->setCookie();
    }     
    public function setCookie(){

        $time = time() + (60 * config('global.cookie.time') );

        setcookie('engagementRing', json_encode($this->fetchData), $time , "/");

    }
    public function getCookie(){
        $this->fetchData = (array)json_decode($_COOKIE['engagementRing']);
        // dd($this->fetchData);
    } 
    public function resetCookies(){

        $time = time() * 0 ;

        setcookie('engagementRing', '', $time , "/");


    }
    public function extraUrls(){
        
        // $this->resetCookies();

        $listUrls = [
                    '/solitaire-ring-setting' => ['style'=>['solitaire']],
                    '/side-stones-setting' => ['style'=>['side-stone']],
                    '/halo-setting' => ['style'=>['halo']],
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

	 	$requests = ['style','shoulder','prong','shape','other'];

        $query = EngagementRing::where('published',1);

 		foreach ($requests as $req) {
 			if (count((array)$this->fetchData[$req]) && !in_array('', (array)$this->fetchData[$req]) ) {
 				$query = $query->whereIn( $req , (array)$this->fetchData[$req] );
 			}

 		}

        $this->model = $query->with(['images'])
                        ->withCount('invoices'); 

        // if ($this->fetchData['column'] == 'price') {
        //      $this->fetchData['column'] ='popular' ;
        // }
        if ($this->fetchData['column'] == 'popular') {
             $this->model = $query->orderBy('invoices_count', $this->fetchData['direction']);
        }
        else{
             $this->model = $query->orderBy($this->fetchData['column'], $this->fetchData['direction']);            
        }

        $this->model = $query                        
			            ->paginate($this->fetchData['per_page']);
                        // dd($this->model->sortBy('invoices')->toArray());
        $data =  $this->model->toArray();
        // $data['data'] =  $this->model->sortBy(function($query){ return count($query['invoices']) ;})->toArray();
        // dd($data);
        foreach ($this->model as $key => $d) {
            $data['data'][$key]['title'] = $d->title();
        }

        $this->model = $data ;
        // dd($data);


    }
    public function upOrDown($direction)
    {
        $this->fetchData['direction'] = $direction; 
        // dd($this->fetchData);
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
        redirect(app()->getLocale() . '/engagement-rings');


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

            $this->fetchData = ['page' =>1,  'column' => 'popular','direction' => 'desc',
                         'per_page' => 12,
                         'style' => [], 'shoulder' => [], 'prong' => [],'shape' => [], 'other' => [], 
                    ];
            $this->preset = $this->fetchData;
    } 
}
