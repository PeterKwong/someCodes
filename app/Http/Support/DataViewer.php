<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;
use Validator;

trait DataViewer{


	protected $operators = [
		'equal' =>'=',
		'not_equal' => '<>',
		'less_than' => '<',
		'greater_than' => '>',
		'less_than_or_equal_to' => '<=',
		'greater_than_or_equal_to' =>'>=',
		'in' =>'IN',
		'like' => 'LIKE'
		];

	protected $search_conditions=[
		'color' => [''],
		];

	protected $preset =[
      "column" => "price",
      "direction" => "asc",
      "page" => "1",
      "per_page" => "10",
      "search_column" => "id",
      "search_operator" => "like",
      "search_input" => null,
      "color" => "",
      "clarity" => "",
      "cut" => "",
      "polish" => "",
      "symmetry" => "",
      "fluorescence" => "",
      "shape" => "",
      "location" => "",
      "price" => "1000,50000000",
      "weight" => "0.3,20",
      "crown_angle" => "0.1,89.9",
      "parvilion_angle" => "0.1,89.9",
      "table_percent" => "0.1,89.9",
      "depth_percent" => "0.1,89.9",
    ];

	public function scopeSearchPaginateAndOrder($query)
	{
		// request() = app()->make(request()');
		// dd(request()->query());

		$presetMatch = true;

		foreach (request()->query() as $key => $value) {
			if ($value != $this->preset[$key]) {
				// return $value;
				$presetMatch = false;
			}
		}

		// return $presetMatch;

		$v = Validator::make(request()->only([
			'column', 'direction', 'per_page', 
			'search_column', 'search_operator', 'search_input'
			]), [
			'column' => 'required | alpha_dash | in:' . implode(',' , self::$columns),
			'direction' => 'required | in:asc,desc',
			'per_page' => 'integer | min:1',
			'search_column' =>'required | alpha_dash | in:' . implode(',' , self::$columns),
			'search_operator' => 'required | alpha_dash | in:' . implode(',' , array_keys($this->operators)),
			'search_input' => 'max:255'
			]);

		if($v->fails()){
			dd($v->messages());
		}

		// dd($query);

		if ($presetMatch) {

			$queryPreset = Cache::remember('queryPreset', 1, function() use ($query){
	
				return $this->queryDiamonds($query);

			});

			return $queryPreset;

		}else{


			return $this->queryDiamonds($query);

		}


	}

	public function queryDiamonds($query) {
	 		
	 		$requests = ['color','clarity','cut','polish','symmetry','fluorescence','shape','location',];

	 		$query = $query->orderBy('available','desc')->where(function($q){
			        $q->whereNotNull('available');
			      });

	 		foreach ($requests as $req) {
	 			// dd(request()->{$req});
	 			if (request()->{$req}) {
	 				$query = $query->where(function($q)use($req){
		              $q->whereIn( $req , explode(',', request()->{$req}));
		            });
	 			}

	 		}

		      if (request()->table_percent) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('table_percent', explode(',', request()->table_percent));
		            });
		      }
		      if (request()->depth_percent) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('depth_percent', explode(',', request()->depth_percent));
		            });
		      }
		      if (request()->parvilion_angle) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('parvilion_angle', explode(',', request()->parvilion_angle));
		            });
		      }
		      if (request()->crown_angle) {
		      		$query = $query->where(function($q){
		              $q->whereBetween('crown_angle', explode(',', request()->crown_angle));
		            });
		      }


		      $query = $query->where(function($q){
		              $q->whereBetween('weight', explode(',', request()->weight));
		            });

		      $query = $query->where(function($q){
		              $q->whereBetween('price', explode(',', request()->price));
		            })


		      ->orderBy(request()->column, request()->direction)
		      ->paginate(request()->per_page);

			return  $query;
	}

	public function scopeAdmSearchPaginateAndOrder($query)
	{
		// request() = app()->make(request()');
		// dd(request());
		$request = request();
		$v = Validator::make($request->all(),[
			'column' => 'required | in:'.implode(',', $this->filter),
			'direction' => 'required | in:asc,desc', 
			'per_page' => 'required | integer | min:1',
			'search_operator' => 'required | in:' . implode(',' , array_keys($this->operators)),
			'search_column' => 'required | in:' . implode(',', $this->filter),
			'search_query_1' => 'max:255',
			'search_query_2' => 'max:255'
			]);

		if ($v->fails()) {
			dd($v->messages());
		}


		return $query->orderBy($request->column, $request->direction)
				->where(function($query) use ($request) {
					if (!$request->search_query_1 == '') {
						
						if ($this->isRelatedColumn($request)) {
							list($relation, $relatedColumn) = explode('.', $request->search_column);
							// dd($relatedColumn);
								return $query->whereHas($relation, function($query) use ($relatedColumn, $request){
										return $this->buildQuery(
										$relatedColumn,
										$request->search_operator,
										$request,
										$query
										);

								});
						}else{
							return $this->buildQuery(
								$request->search_column,
								$request->search_operator,
								$request,
								$query
								);
						}
					}
				})
				->paginate($request->per_page);
		
		
		

	}
	public function isRelatedColumn($request)
	{
		return strpos($request->search_column, '.') !== false;
	}

	public function buildQuery($column, $operator, $request, $query)
	{
		switch ($operator) {
			case 'equal_to':
			case 'not_equal':
			case 'less_than':
			case 'greater_than':
			case 'less_than_or_equal_to':
			case 'greater_than_or_equal_to':
				$query->where($column, $this->operators[$operator], $request->search_query_1);
				break;
			case 'in':
				$query->whereIn($column, explode(',', $request->search_query_1));
				break;
			case 'not_in':
				$query->whereNotIn($column, explode(',', $request->search_query_1));
				break;
			case 'like':
				$query->where($column, 'like', '%'.$request->search_query_1.'%');
				break;
			case 'between':
				$query->wehereBetween($column, [
					$request->search_query_1, 
					$request->search_query_2
					]);
				break;
			default:
				throw new Exception('invalid search operator', 1);
				
				break;
		}

		return $query;
	}
	

	protected function hasSearchInput($query)
	{
		if(request()->has('search_input')) {
					if (request()->search_operator == 'in') {
						$query->whereIn(request()->search_column, explode(',', request()->search_input));
					}else if (request()->search_operator == 'like') {
						$query->where(request()->search_column, 'LIKE', '%'.request()->search_input.'%');
					}else
					{ $query->where(request()->search_column, $this->operators[request()->search_operator], request()->search_input);}
				};

		if (request()->has(request('search_conditions'))) {
			
			
		}
	}


}