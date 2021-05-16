<?php

namespace App\Http\Support;

use Validator;

trait WeddingRingFilter{


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

	public function scopeSearchPaginateAndOrder($query)
	{
		// request() = app()->make(request()');
		// dd(request());
		$v = Validator::make(request()->only([
			'column', 'direction', 'per_page', 
			'search_column', 'search_operator', 'search_input'
			]), [
			'column' => 'required | alpha_dash | in:' . implode(',' , $this->filter),
			'direction' => 'required | in:asc,desc',
			'per_page' => 'integer | min:1',
			'search_column' =>'required | alpha_dash | in:' . implode(',' , $this->filter),
			'search_operator' => 'required | alpha_dash | in:' . implode(',' , array_keys($this->operators)),
			'search_input' => 'max:255'
			]);

		if($v->fails()){
			dd($v->messages());
		}


		// dd(request()->customized);

		return  $query
			->orderBy(request()->column, request()->direction)
			->where(function($query){
				$this->hasSearchInput($query);
			})
			->whereIn('customized', explode(',',request()->customized))
			->whereIn('sideStone', explode(',',request()->sideStone))
			->whereIn('gender', explode(',',request()->gender))
			->whereIn('style', explode(',', request()->style))
			->whereIn('metal', explode(',', request()->metal))
			->paginate(request()->per_page);
		

	}

	public function scopeWeddingRingPairsFilter($query){

		$v = Validator::make(request()->only([
			'column', 'direction', 'per_page', 
			'search_column', 'search_operator', 'search_input'
			]), [
			'column' => 'required | alpha_dash | in:' . implode(',' , $this->filter),
			'direction' => 'required | in:asc,desc',
			'per_page' => 'integer | min:1',
			'search_column' =>'required | alpha_dash | in:' . implode(',' , $this->filter),
			'search_operator' => 'required | alpha_dash | in:' . implode(',' , array_keys($this->operators)),
			'search_input' => 'max:255'
			]);

		if($v->fails()){
			dd($v->messages());
		}


		// dd(request()->sideStone);

		$weddingRing = $query
			->orderBy('unit_price', 'desc')
	            ->whereIn('customized', explode(',',request()->customized))
	            ->whereIn('sideStone', explode(',',request()->sideStone))
	            ->whereIn('gender', explode(',',request()->gender))
	            ->whereIn('style', explode(',', request()->style))
	            ->whereIn('metal', explode(',', request()->metal));

	    $weddingRingIds = $weddingRing->pluck('wedding_ring_pair_id')->toArray();
        $weddingRingIds = array_unique($weddingRingIds);

        return $weddingRingIds;
		
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
	public function scopeFilterPaginateOrder($query)
	{
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
				->with('texts','images')
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


}