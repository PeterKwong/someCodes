<?php

namespace App\Http\Livewire\Diamond;

use App\Models\Diamond;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Content extends Component
{

	protected $listeners = ['addPage'];

	public $search_conditions = [
									'shape'=>[
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
													  'value' => ['EX','Excellent']
													],
										'Very Good' => ['clicked'=>false,
													  'value' => ['VG','Very Good']
													],
										'Good' => ['clicked'=>false,
													  'value' => ['GD','Good']
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
													  'value' => ['EX','Excellent']
													],
										'Very Good' => ['clicked'=>false,
													  'value' => ['VG','Very Good']
													],
										'Good' => ['clicked'=>false,
													  'value' => ['GD','Good']
													] 
										],
									'fluorescence'=>[
										'None' => ['clicked'=>false,
													  'value' => ['Non','None']
													],
										'Faint' => ['clicked'=>false,
													  'value' => ['FNT','Faint']
													],
										'Medium' => ['clicked'=>false,
													  'value' => ['MED','Medium']
													],
										'Strong' => ['clicked'=>false,
													  'value' => ['STG','Strong']
													],
										'Very Strong' => ['clicked'=>false,
													  'value' => ['VST','Very Strong']
													]
										],
									'symmetry'=>[
										'Excellent' => ['clicked'=>false,
													  'value' => ['EX','Excellent']
													],
										'Very Good' => ['clicked'=>false,
													  'value' => ['VG','Very Good']
													],
										'Good' => ['clicked'=>false,
													  'value' => ['GD','Good']
													] 
										],
									'location'=>[
										'1Hong Kong' => ['clicked'=>false,
													  'value' => ['1Hong Kong']],
										],

								];
	public $advance_search_conditions = [
									'table_percent'=>['clicked'=>false],
									'depth_percent'=>['clicked'=>false],
									'crown_angle'=>['clicked'=>false],
									'parvilion_angle'=>['clicked'=>false],
									'length'=>['clicked'=>false],
									'width'=>['clicked'=>false],
									'depth'=>['clicked'=>false],
									'starred'=>['clicked'=>false],
								];

	public $fancy_color = [		'fancy_color'=>[
										'Yellow' => ['clicked'=>false,
													  'value' => ['Yellow']],
										'Pink' => ['clicked'=>false,
													  'value' => ['Pink']],
										'Orange' => ['clicked'=>false,
													  'value' => ['Orange']],
										'Purple' => ['clicked'=>false,
													  'value' => ['Purple']],
										'Brown' => ['clicked'=>false,
													  'value' => ['Brown']],
										'Green' => ['clicked'=>false,
													  'value' => ['Green']],
										'Gray' => ['clicked'=>false,
													  'value' => ['Gray']],
										'Blue' => ['clicked'=>false,
													  'value' => ['Blue']],
										'Black' => ['clicked'=>false,
													  'value' => ['Black']],
										],
									'fancy_intensity'=>[
										'Faint' => ['clicked'=>false,
													  'value' => ['Faint']],
										'Very Light' => ['clicked'=>false,
													  'value' => ['Very Light']],
										'Light' => ['clicked'=>false,
													  'value' => ['Light']],
										'Fancy Light' => ['clicked'=>false,
													  'value' => ['Fancy Light']],
										'Fancy' => ['clicked'=>false,
													  'value' => ['Fancy']],
										'Fancy Dark' => ['clicked'=>false,
													  'value' => ['Fancy Dark']],
										'Fancy Intense' => ['clicked'=>false,
													  'value' => ['Fancy Intense']],
										'Fancy Vivid' => ['clicked'=>false,
													  'value' => ['Fancy Vivid']],
										'Fancy Deep' => ['clicked'=>false,
													  'value' => ['Fancy Deep']],
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

	public $selectedColor = 'yellow';

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
    		$columns = ['page','column','direction','per_page','shape','color','clarity','cut','polish','symmetry','fluorescence','price','weight','table_percent','depth_percent','crown_angle','parvilion_angle','length','width','depth','location','starred'];

    		
    		$cookie = (array)json_decode($_COOKIE['diamondSearch']) ;

    		foreach ($columns as $column) {
    			if ($same && $this->fetchData[$column] != $cookie[$column]) {
    				$same = false;
    			}
    		}

    		if (array_search('Fancy',$this->fetchData['color']) > -1) {
    			$columns = ['fancy_color','fancy_intensity'];
    			foreach ($columns as $column) {
	    			if ($same && $this->fetchData[$column] != $cookie[$column]) {
	    				$same = false;
	    			}
	    		}
    		}


			$this->setcookie();

    		// dd($this->fetchData );

    	}

    	return $same ;

    }  
    public function deferLoading(){
    	 

		$same = $this->isDiamondQuery();

		// dd($same );

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

	    if ($this->search_conditions['color']['Fancy']['clicked']) {
	    	$this->setFancyColumns();
	    }
	    // $this->checkCache();
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

    	foreach ($this->advance_search_conditions as $key=>$value) {

    		if ($key != 'starred') {
    			if ($this->fetchData[$key][1] != 0 ) {
	    			$this->advance_search_conditions[$key]['clicked'] = true ;
	    		}
    		}
	    	if(!isset($this->fetchData['fancy_intensity'])){
	    		$this->resetAll();
	    	}
    		if (count($this->fetchData['starred'])) {
    			 $this->advance_search_conditions[$key]['clicked'] = true ;
    		}
    	}

    	foreach ($this->fancy_color as $iKey => $iValue) {
    		foreach ($this->fetchData[$iKey] as $key => $value) {

    			if (isset($this->fancy_color[$iKey][$value])) {
    				// dd($this->fancy_color[$iKey][$value]);
    				$this->fancy_color[$iKey][$value]['clicked'] = true ;
    			}
    		}
    	}

    	// dd($this->fancy_color);
    } 
    public function setFancyColumns(){

	    array_splice($this->columns,4,3,['fancy_intensity','fancy_color','clarity']);

    }
    public function setRequest(){
		    	// dd( request()->all() );
	      $trans = [
            '0'=>'',
            'EX'=>'EX,Excellent',
            'VG'=>'VG,Very Good',
            'GD'=>'GD,Good',
            'Non'=>'Non,None',
            'FNT'=>'FNT,Faint',
            'MED'=>'MED,Medium',
            'STG'=>'STG,Strong',
            'VST'=>'VST,Very Strong',
          ];

          $checkKeys = ['cut','symmetry','polsh','fluorescence'];

		foreach (request()->all() as $key => $value) {
			if (is_string( $value ) || is_int($value)) {
				if (in_array($key, $checkKeys)) {
					$value = array_key_exists($value, $trans)?$trans[$value]:$value;

				}
    			$this->fetchData[$key] = explode(',',$value );
		    	// dd( $this->fetchData[$key] );

			}
			// if(count($value)){
   			// $this->fetchData[$key] = $value ;    				
			// }
 		}
		    	// dd( $this->fetchData );
		$this->setCookie();
		// $this->setClickedSearchConditions();
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
    				'/round-cut' => ['shape'=>['round']],
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
    				'/fancy-color' => ['color'=>['Fancy']],
    				'/fancy-color/black' => ['fancy_color'=>['Black']],
    				'/fancy-color/blue' => ['fancy_color'=>['Blue']],
    				'/fancy-color/brown' => ['fancy_color'=>['Brown']],
    				'/fancy-color/green' => ['fancy_color'=>['Green']],
    				'/fancy-color/grey' => ['fancy_color'=>['Gray']],
    				'/fancy-color/orange' => ['fancy_color'=>['Orange']],
    				'/fancy-color/pink' => ['fancy_color'=>['Pink']],
    				'/fancy-color/purple' => ['fancy_color'=>['Purple']],
    				'/fancy-color/yellow' => ['fancy_color'=>['Yellow']],
    				'/on-stock' => ['location'=>['1Hong Kong']],
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

    	// $this->fetchData[$condition] = $this->fetchData[$condition];

		if ( in_array($data,$this->fetchData[$condition]) ) {

			if ($data == 'Fancy') {
				
		    	$this->unsetFancyData();
				$this->fetchData['color'][] = 'Fancy';
				array_splice($this->columns,4,3,['color','clarity','cut']);

		    }
			foreach ($this->search_conditions[$condition][$data]['value'] as $key => $value) {

				unset($this->fetchData[$condition][array_search($value,$this->fetchData[$condition])]);
						// dd($this->search_conditions['color']['Fancy']);

			}


		}else{

			if ($data == 'Fancy') {
				
		    	$this->unsetFancyData();
		    	$this->setFancyColumns();
					// dd($this->fetchData['color']);

		    }

			foreach ($this->search_conditions[$condition][$data]['value'] as $key => $value) {


				array_push($this->fetchData[$condition],$value);

			}



		}

		// $this->fetchData[$condition] = $this->fetchData[$condition];
		// dd($this->search_conditions['color']);

	}
	public function unsetFancyData(){

			$this->fetchData['color'] = [];
			$this->fetchData['cut'] = [];
			$this->fetchData['fancy_color'] = [];
	 		$this->fetchData['fancy_intensity'] = [];

		// dd($this->search_conditions['color']);
	}
    public function toggleFancyValue($condition, $data)
    {	
    	// dd($condition, $data);

    	$fetchData = $this->fetchData[$condition];

    	if ($condition == 'fancy_color') {
			unset($fetchData);
			$fetchData[] = $data;
    	}else{

    		if ( in_array($data,$fetchData) ) {

				foreach ($this->fancy_color[$condition][$data]['value'] as $key => $value) {
					unset($fetchData[array_search($value,$fetchData)]);

				}

			}else{
				foreach ($this->fancy_color[$condition][$data]['value'] as $key => $value) {
						array_push($fetchData,$value);

				}

			}

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

		$this->clickedRows[] = $id;
		$this->setCookie();
		return ;
		// dd('hi');


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

	 		$requests = ['color','clarity','cut','polish','symmetry','fluorescence','shape','location'];

			if( array_search('Fancy',$this->fetchData['color']) > -1) {

				$requests[] = 'fancy_color';
		 		$requests[] = 'fancy_intensity';		 		
	 			// dd($requests);

	    	}
	 			// dd($requests);
	 	
	 		$query = Diamond::orderBy('available','desc')->where(function($q){
			        $q->whereNotNull('available');
			      });

	 			// dd($this->fetchData);

	      	if (count($this->fetchData['starred'])) {
	      		$query = $query->where(function($q){
	              $q->whereNotNull('starred');
	            });
	      	}


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

		      
		      // dd($query);
		      // dd($this->fetchData['fancy_color']);
			// dd($this->search_conditions['color']);

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
	public function selectStarred(){

		if ( !count($this->fetchData['starred']) ) {
			$this->fetchData['starred'] = [true];
		}else{
			$this->fetchData['starred'] = [];	

		}
		// dd($this->fetchData['starred']);
	}
	public function setCookie(){

		$time = time() + (60 * config('global.cookie.time') );

		setcookie('diamondSearch', json_encode($this->fetchData), $time , "/");
		setcookie('diamondSearchShowAdvance', json_encode($this->showAdvance), $time , "/");
		setcookie('clickedRows', json_encode($this->clickedRows), $time , "/");

	}
	public function getCookie(){
   		$this->fetchData = (array)json_decode($_COOKIE['diamondSearch']);
   		// dd($this->fetchData);
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
						 'shape' => [], 'color' => [],'fancy_color' => [],'fancy_intensity' => [], 'clarity' => [], 'cut' => [], 'polish' => [], 
						 'symmetry' => [], 'fluorescence' => [], 'price' => [1000, 50000000], 
						 'weight' => [0.30,20], 'table_percent' => [0,0], 'depth_percent' => [0,0], 
						 'crown_angle' => [0,0], 'parvilion_angle' => [0,0], 'length' => [0,0], 
						 'width' => [0,0], 'depth' => [0,0], 'location' => [],'starred'=>[]
					];
			$this->preset = $this->fetchData;
	} 


}
