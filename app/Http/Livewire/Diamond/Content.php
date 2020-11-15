<?php

namespace App\Http\Livewire\Diamond;

use App\Diamond;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Content extends Component
{

	protected $listeners = ['addPage'];

	public $search_conditions = [
									'shape'=>[
										'round' => ['clicked'=>false],
										'pear' => ['clicked'=>false],
										'emerald' => ['clicked'=>false],
										'princess' => ['clicked'=>false],
										'marquise' => ['clicked'=>false],
										'cushion' => ['clicked'=>false],
										'asscher' => ['clicked'=>false],
										'oval' => ['clicked'=>false],
										'heart' => ['clicked'=>false],
										'radiant' => ['clicked'=>false]
										],
									'color'=>[
										'D' => ['clicked'=>false],
										'E' => ['clicked'=>false],
										'F' => ['clicked'=>false],
										'G' => ['clicked'=>false],
										'H' => ['clicked'=>false],
										'I' => ['clicked'=>false],
										'J' => ['clicked'=>false],
										'K' => ['clicked'=>false],
										'L' => ['clicked'=>false],
										'M' => ['clicked'=>false],
										'N' => ['clicked'=>false]
										],
									'cut'=>[
										'Excellent' => ['clicked'=>false],
										'Very Good' => ['clicked'=>false],
										'Good' => ['clicked'=>false] 
										],
									'clarity'=>[
										'FL' => ['clicked'=>false],
										'IF' => ['clicked'=>false],
										'VVS1' => ['clicked'=>false],
										'VVS2' => ['clicked'=>false],
										'VS1' => ['clicked'=>false],
										'VS2' => ['clicked'=>false],
										'SI1' => ['clicked'=>false],
										'SI2' => ['clicked'=>false],
										'I1' => ['clicked'=>false]
										],
									'polish'=>[
										'Excellent' => ['clicked'=>false],
										'Very Good' => ['clicked'=>false],
										'Good' => ['clicked'=>false]
										],
									'fluorescence'=>[
										'None' => ['clicked'=>false],
										'Faint' => ['clicked'=>false],
										'Medium' => ['clicked'=>false],
										'Strong' => ['clicked'=>false],
										'Very Strong' => ['clicked'=>false]
										],
									'symmetry'=>[
										'Excellent' => ['clicked'=>false],
										'Very Good' => ['clicked'=>false],
										'Good' => ['clicked'=>false]
										],
									'location'=>[
										'1Hong Kong' => ['clicked'=>false],
										],

								];
	public $columns = [ 'has_image','shape','price','weight','color','clarity','cut','polish',
						'symmetry','fluorescence','location','certificate','lab','starred' 
		        	];

	public $fetchData = '';
	public $preset = '';
	public $diamonds = [];
	
	public $clickedRows = [];
	public $displayColumn = '';

	public $showAdvance = false ;
	public $showInGrid = false ;

	public $fetchAdvance = ['crown_angle'=>'Crown Angle', 'parvilion_angle'=>'Parvilion Angle', 
							'table_percent'=>'Table Percent', 'depth_percent'=>'Depth Percent', 
							'length'=>'Length', 'width'=>'Width', 'depth'=>'Depth'];
	
	public $readyToLoad = false;

	public $firstTimeFetch = true;

    public function render()
    {	 

        return view('livewire.diamond.content', [
            'diamonds' => $this->readyToLoad
                ? $this->deferLoading()
                : $this->diamonds
        ]);
    }
    public function loadDiamonds()
    {
        $this->readyToLoad = true;
        // dd('done');
    }
    public function isDiamondQuery(){

      	if ( isset($_COOKIE['diamondSearch']) ) {

    		$same = true ;
    		$columns = ['page','column','direction','per_page','shape','color','clarity','cut','polish','symmetry','fluorescence','price','weight','table_percent','depth_percent','crown_angle','parvilion_angle','length','width','depth','location'];

    		
    		$cookie = (array)json_decode($_COOKIE['diamondSearch']) ;

    		foreach ($columns as $column) {
    			if ($same && $this->fetchData[$column] != $cookie[$column]) {
    				$same = false;
    			}
    		}

			$this->setcookie();

    		// dd('skip' );

    	}

    	return $same ;

    }  
    public function deferLoading(){
    	 

		$same = $this->isDiamondQuery();

		// dd($cookie['price'] );

		if ( $this->firstTimeFetch || !$same ) {

			$this->firstTimeFetch = false;

    		return $this->checkCache();

		}


    }

    public function mount(){

    	$this->resetSettings();

    	if (!isset($_COOKIE['diamondSearch'])) {
			$this->setCookie();
    	}
    	if (isset($_COOKIE['diamondSearch'])) {
    		$this->getCookie();
    	}    	
		    	// dd( $this->fetchData );
	    $this->extraUrls();
    	$this->setRequest();
    	$this->resetPartial();
		// dd( $this->fetchData );
	    $this->setClickedSearchConditions();
	    // $this->checkCache();
    }
    public function setClickedSearchConditions(){

    	foreach ($this->search_conditions as $iKey => $iValue) {
    		foreach ($this->fetchData[$iKey] as $key => $value) {
    			$this->search_conditions[$iKey][$value]['clicked'] = true ;
    		}
    	}
    	// dd($this->search_conditions);
    } 
    public function setRequest(){
		    	// dd( request()->all() );

		foreach (request()->all() as $key => $value) {
			if (is_string( $value ) || is_int($value)) {
    			$this->fetchData[$key] = explode(',',$value );
			}
			if(count($value)){
    			$this->fetchData[$key] = $value ;    				
			}
 		}
		    	// dd( $this->fetchData );
		$this->setCookie();

    }
    public function extraUrls(){
    	
    	// $this->resetCookies();

    	$listUrls = [
    				'/0-30-0-49-carat-weight' => ['weight'=>[0.3,0.49]],
    				'/0-50-0-79-carat-weight' => ['weight'=>[0.5,0.79]],
    				'/0-80-0-99-carat-weight' => ['weight'=>[0.8,0.99]],
    				'/1-00-1-19-carat-weight' => ['weight'=>[1,1.19]],
    				'/1-20-1-49-carat-weight' => ['weight'=>[1.2,1.49]],
    				'/1-50-1-99-carat-weight' => ['weight'=>[1.5,1.99]],
    				'/2-00-2-99-carat-weight' => ['weight'=>[2,2.99]],
    				'/3-00-up-carat-weight' => ['weight'=>[3,20]],
    				'/fancy-cut-diamond' => ['shape'=>
    											['heart','princess','emerald','asscher','cushion',
    											'oval','marquise','radiant','pear']],
    				'/fancy-cut-diamond/heart-shaped' => ['shape'=>['heart']],
    				'/fancy-cut-diamond/princess-cut' => ['shape'=>['princess']],
    				'/fancy-cut-diamond/emerald-cut' => ['shape'=>['emerald']],
    				'/fancy-cut-diamond/asscher-cut' => ['shape'=>['asscher']],
    				'/fancy-cut-diamond/cushion-cut' => ['shape'=>['cushion']],
    				'/fancy-cut-diamond/oval-cut' => ['shape'=>['oval']],
    				'/fancy-cut-diamond/marquise-cut' => ['shape'=>['marquise']],
    				'/fancy-cut-diamond/radiant-cut' => ['shape'=>['radiant']],
    				'/fancy-cut-diamond/pear-shaped' => ['shape'=>['pear']],
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
    public function toggleShowAdvance()
    {	

		$this->showAdvance = !$this->showAdvance;

	}	
	public function setAdvanceToZero($column){

		$this->fetchData[$column] = [0, 0];

	} 
	public function addAdvanceSearch($column){
		
	    if( $this->fetchData[$column][1] == 0 ){
        	$this->fetchData[$column] = [0.1, 89.9];
    	}

	}
    public function toggleValue($condition, $data)
    {	
    	// dd($condition, $data);

    	$fetchData = $this->fetchData[$condition];

		if ( in_array($data,$fetchData) ) {

			unset($fetchData[array_search($data,$fetchData)]);

		}else{
			array_push($fetchData,$data);

		}

		$this->fetchData[$condition] = $fetchData;
	    

	}
	public function toggleOrder($column){

		if ($column == $this->fetchData['column']) {
			if ($this->fetchData['direction'] == 'desc') {
				$this->fetchData['direction'] = 'asc';
			}else{
				$this->fetchData['direction'] = 'desc';
			}
		}else{
			$this->fetchData['column'] = $column ;
			$this->fetchData['direction'] = 'asc' ;

		}
	}
	public function toggleShowGrid(){

		$this->showInGrid = !$this->showInGrid;

	}
	public function goto($id){

		$url = '/' . app()->getLocale() . '/gia-loose-diamonds/'. $id ;
		$this->dispatchBrowserEvent('new-tab', ['link' => $url]);

		$this->clickedRows[] = $id;
		$this->setCookie();



	}
	public function selectDisplayColumn($column){
		if ($this->displayColumn != $column) {
			$this->displayColumn = $column ;
		}else{
			$this->displayColumn = '' ;			
		}
	} 

	public function checkCache(){

		$same = true;

	    foreach ($this->preset as $key => $column) {
			if ($same && $column != $this->fetchData[$key]) {
				// dd($column, $this->fetchData[$key]);

				$same = false;
			}
		}
		
		// dd($same);

		if ($same) {

			// if (Cache::has('queryPreset')) {
			    // dd('hihi');
			// }

			$queryPreset = Cache::remember('queryPreset',300, function(){
				// dd($this->preset);
				return $this->queryDiamonds();

			});

			// dd($queryPreset);
			$this->diamonds = $queryPreset;

			return $queryPreset;

		}else{


			return $this->queryDiamonds();

		}
	}

	public function queryDiamonds() {

	 		$requests = ['color','clarity','cut','polish','symmetry','fluorescence','shape','location',];

	 		$query = Diamond::orderBy('available','desc')->where(function($q){
			        $q->whereNotNull('available');
			      });

	 			// dd($this->fetchData);

	 		foreach ($requests as $req) {
	 			if ($this->fetchData[$req]) {
	 				$query = $query->where(function($q)use($req){
		              $q->whereIn( $req , (array)$this->fetchData[$req] );
		            });
	 			}

	 		}

		      $query = $query->where(function($q){
		              $q->whereBetween('weight', $this->fetchData['weight'] );
		            });

		      $query = $query->where(function($q){
		              $q->whereBetween('price', $this->fetchData['price'] );
		            });

		      if ($this->fetchData['table_percent'][0]) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('table_percent', $this->fetchData['table_percent']);
		            });
		      }
		      if ($this->fetchData['depth_percent'][0]) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('depth_percent', $this->fetchData['depth_percent']);
		            });
		      }
		      if ($this->fetchData['parvilion_angle'][0]) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('parvilion_angle', $this->fetchData['parvilion_angle']);
		            });
		      }
		      if ($this->fetchData['crown_angle'][0]) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('crown_angle', $this->fetchData['crown_angle']);
		            });
		      }
		      if ($this->fetchData['length'][0]) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('length', $this->fetchData['length']);
		            });
		      }

		      if ($this->fetchData['width'][0]) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('width', $this->fetchData['width']);
		            });
		      }

		      if ($this->fetchData['depth'][0]) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('depth', $this->fetchData['depth']);
		            });
		      }
		      


		      $query = $query->orderBy($this->fetchData['column'], $this->fetchData['direction'])
		      ->paginate($this->fetchData['per_page'])->withPath('')->toArray();

		      

		      return $this->diamonds = $query;


		      // dd($this->diamonds);

	}
	public function addPage(){
		$this->fetchData['per_page'] +=20;
	}
	public function setLocationToHK(){

		if ( !count($this->fetchData['location']) ) {
			$this->fetchData['location'] = ['1Hong Kong'];
		}else{
			$this->fetchData['location'] = [];	

		}
	}
	public function setCookie(){

		$time = time() + (60 * config('global.cookie.time') );

		setcookie('diamondSearch', json_encode($this->fetchData), $time , "/");
		setcookie('diamondSearchShowAdvance', json_encode($this->showAdvance), $time , "/");
		setcookie('clickedRows', json_encode($this->clickedRows), $time , "/");

	}
	public function getCookie(){
   		$this->fetchData = (array)json_decode($_COOKIE['diamondSearch']);
   		$this->showAdvance = json_decode($_COOKIE['diamondSearchShowAdvance']);
   		$this->clickedRows = json_decode($_COOKIE['clickedRows']);			
	} 
	public function resetCookies(){

		$time = time() * 0 ;

		setcookie('diamondSearch', '', $time , "/");
		setcookie('diamondSearchShowAdvance', '', $time , "/");
		setcookie('clickedRows', '', $time , "/");


	}
	public function resetAll(){

		$this->resetCookies();
		$this->resetSettings();
		// dd('hi');
		redirect(app()->getLocale() . '/gia-loose-diamonds');


	}
	public function resetSettings(){

		$this->resetFetchData();

		$this->readyToLoad = false;

		$this->firstTimeFetch = true;
	} 

	public function resetPartial(){
		
	 	$this->fetchData['per_page'] = 20;

	}
	public function resetFetchData(){

	 		$this->fetchData = ['page' =>1,  'column' => 'price','direction' => 'asc',
						 'per_page' => 20,
						 'shape' => [], 'color' => [], 'clarity' => [], 'cut' => [], 'polish' => [], 
						 'symmetry' => [], 'fluorescence' => [], 'price' => [1000, 50000000], 
						 'weight' => [0.30,20], 'table_percent' => [0,0], 'depth_percent' => [0,0], 
						 'crown_angle' => [0,0], 'parvilion_angle' => [0,0], 'length' => [0,0], 
						 'width' => [0,0], 'depth' => [0,0], 'location' => []
					];
			$this->preset = $this->fetchData;
	} 
	public function clickRow($id){
			
	} 


}
