<?php

namespace App\Http\Livewire\Jewellery;

use App\Models\Jewellery;
use Livewire\Component;

class Index extends Component
{

    protected $listeners = ['addPage'];

	public $model;
	public $fetchData;
    public $tags;
	public $search_conditions = [
									'type'=>[
										'ring' => ['clicked'=>false,
													  'value' => ['ring']],
                                        'necklace' => ['clicked'=>false,
                                                      'value' => ['necklace']],
										'earring' => ['clicked'=>false,
													  'value' => ['earring']],
										'pendant' => ['clicked'=>false,
													  'value' => ['pendant']],
										'bracelet' => ['clicked'=>false,
													  'value' => ['bracelet']],
										],
                                    'metal'=>[
                                        '18KW' => ['clicked'=>false,
                                                      'value' => ['18KW']],
                                        '18KR' => ['clicked'=>false,
                                                      'value' => ['18KR']],
                                        '18KY' => ['clicked'=>false,
                                                      'value' => ['18KY']],
                                        'PT' => ['clicked'=>false,
                                                      'value' => ['PT']],
                                        'mixed' => ['clicked'=>false,
                                                      'value' => ['mixed']],
                                        ],
									'gemstone'=>[
										'0' => ['clicked'=>false,
													  'value' => ['0']],
										'diamond' => ['clicked'=>false,
													  'value' => ['diamond']],
										'pearl' => ['clicked'=>false,
													  'value' => ['pearl']],
										'fancy diamond' => ['clicked'=>false,
													  'value' => ['fancy diamond']],
										],
                                    'setting'=>[
                                        '1' => ['clicked'=>false,
                                                      'value' => ['1']],
                                        '0' => ['clicked'=>false,
                                                      'value' => ['0']],
										],                                   																
								];

    public function render()
    {   
        if ( isset($_COOKIE['jewellery']) ) {

            $same = true ;
            $columns = ['type','metal','gemstone','setting'];

            
            $cookie = (array)json_decode($_COOKIE['jewellery']) ;

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
        return view('livewire.jewellery.index');
    }
    public function mount(){
        $this->resetSettings();

        if (!isset($_COOKIE['jewellery'])) {
            $this->setCookie();
        }
        if (isset($_COOKIE['jewellery'])) {
            $this->getCookie();

        }
        $this->extraUrls();
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
    public function upOrDown($direction)
    {
        $this->fetchData['direction'] = $direction; 
        // dd($this->fetchData);
    }  
    public function setCookie(){

        $time = time() + (60 * config('global.cookie.time') );

        setcookie('jewellery', json_encode($this->fetchData), $time , "/");

    }
    public function getCookie(){
        $this->fetchData = (array)json_decode($_COOKIE['jewellery']);
        // dd($this->fetchData);
    } 
    public function resetCookies(){

        $time = time() * 0 ;

        setcookie('jewellery', '', $time , "/");


    }
    public function extraUrls(){
        
        // $this->resetCookies();

        $listUrls = [
                    '/rings' => ['type'=>['ring']],
                    '/diamond-rings' => ['gemstone'=>['diamond']],
                    '/fancy-diamond-rings' => ['gemstone'=>['fancy diamond']],
                    '/necklaces' => ['type'=>['necklace']],
                    '/bracelets' => ['type'=>['bracelet']],
                    '/earrings' => ['type'=>['earring']],
                    '/pendants' => ['type'=>['pendant']],
                    ];

        foreach ($listUrls as $key => $value) {

            if (strpos( url()->current(), $key )) {

            	$this->fetchData[key($value)] = $value[key($value)] ;  

            	if (strpos( url()->current(), 'diamond-rings'  )) {
            		$this->fetchData['type'] = ['ring'] ;  
	            }
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

	 	$requests = ['type','metal','gemstone','setting'];

        $query = Jewellery::where('published',1);

 		foreach ($requests as $req) {
 			if (count((array)$this->fetchData[$req]) && !in_array('', (array)$this->fetchData[$req]) ) {
 				$query = $query->whereIn( $req , (array)$this->fetchData[$req] );
 			}

 		}

        $query = $query->with(['images'])
                        ->withCount('invoices'); 

        if ($this->fetchData['column'] == 'price') {
             $this->fetchData['column'] ='unit_price' ;
        }
        if ($this->fetchData['column'] == 'popular') {
             $query = $query->orderBy('invoices_count', $this->fetchData['direction']);
        }
        else{
             $query = $query->orderBy($this->fetchData['column'], $this->fetchData['direction']);            
        }

        $this->model = $query                        
                        ->paginate($this->fetchData['per_page']);

                        
        $data =  $this->model->toArray();

        foreach ($this->model as $key => $d) {
            $data['data'][$key]['title'] = $d->title();
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
        redirect(app()->getLocale() . '/jewellery');


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
                         'type' => [], 'metal' => [], 'gemstone' => [],'setting' => [],  
                    ];
            $this->preset = $this->fetchData;
    } 
}
