<template>
	<div class="">
		<div class="row">
		  <!-- Left side -->
			  <div class="col">
			      <h2>
			        <strong>{{title}}</strong>
			      </h2>
			  </div>

		  <!-- Right side -->
			  <div class="col">
			  	<div class="row">
			  		<div class="col-8"></div>
			  		<div class="col">
			  			<a :href="create" class="btn btn-primary">Create</a>
					   <button class="btn btn-primary" @click="showFilter = !showFilter">Filter</button>
					</div>
			  	</div>
			  </div>
		</div>

		<div class="row" v-if="showFilter">
			<div class="col">
				<div class="row">
					<div class="col">
							  <select v-model="params.search_column" class="form-control">
							    <option v-for="column in filter" :value="column">{{column}}</option>
							  </select>
					</div>
					<div class="col">
							  <select v-model="params.search_operator" class="form-control">
							    <option v-for="(value, key) in operators" :value="key">{{value}}</option>
							  </select>
					</div>
					<div class="col">
			    		<select class="form-control" v-model="params.per_page" @change="fetchData">
							<option>10</option>
							<option>25</option>
							<option>50</option>
						</select>
					</div>
				</div>
			</div>

			<div class="col">
				<div class="row">
					<div class="col"></div>
					<div class="col-6">
						  <input type="text" class="form-control" v-model="params.search_query_1" 
							@keyup.enter="fetchData" placeholder="Search">
					</div>
					<div class="col">
						  <input type="text" class="form-control" v-model="params.search_query_2" 
								@keyup.enter="fetchData" placeholder="Search" v-if="params.search_operator === 'between' ">
						<button class="btn btn-primary" @click="fetchData">Filter</button>
					</div>
				</div>
			</div>

		</div>

		<nav>
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title"></h4>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="thead-light">
                            <tr>
                                <th v-for="item in thead">
									<div  @click="sort(item.key)" v-if="item.sort">
										<span>{{item.title}}</span>
										<span v-if="params.column === item.key">
											<span v-if="params.direction === 'asc' ">&#x25B2;</span>
											<span v-else>&#x25BC;</span>
										</span>
									</div>
										<div v-else>
											<span>{{item.title}}</span>
										</div>							
								</th>
                            </tr>
                            </thead>
                            <tbody>
								
								<slot v-for="item in model.data" :item="item"></slot>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    	</nav>

        <nav aria-label="...">
		  <ul class="pagination justify-content-center">
		  	<li class="page-item">
	    		<select class="form-control" v-model="params.per_page" @change="fetchData">
					<option>10</option>
					<option>25</option>
					<option>50</option>
				</select>
		    </li>
		    <li class="page-item " :class=" {' disabled': params.page-1 > 0 }">
		      <span class="page-link" @click="moveTo(-1)">Previous</span>
		    </li>
		    <li class="page-item">
		    	<a class="page-link"  @click="moveTo(-5)" :disabled="params.page<5">{{params.page<5 ? 0: params.page-5}}</a>
		    </li>
		    <li class="page-item">
		    	<p href="" class="page-link">. . . </p>
		    </li>
		    <li class="page-item">
		    	<a class="page-link" :diable="params.page" @click="moveTo(-1)">{{params.page-1}}</a>
		    </li>
		    <li class="page-item active" aria-current="page">
		    	<a class="page-link" >{{params.page}}</a>
		    </li>
		    <li class="page-item">
		    	<a class="page-link" @click="moveTo(+1)">{{params.page+1}}</a>
		    </li>	
		    <li class="page-item">
		    	<p href="" class="page-link">. . . </p>
		    </li>	        	    
		    <li class="page-item">
		    	<a class="page-link" @click="moveTo(5)">{{5+params.page}}</a>
		    </li>
		    <li class="page-item">
		      <a class="page-link"  @click="moveTo(+1)">Next</a>
		    </li>
		  </ul>
		</nav>


			
	</div>
</template>

<script>

	import { get } from '../helpers/api'

	export default {
		props: { 'source': String, 'thead': Array, 'filter': Array, 'create': String, 'title': String , 
					'url': String , 
					'column' : { type: String,
								default:'id'},
					'per_page': { type: Number ,
								default: 10 },
				} ,
		// components: { Pagination},
		data(){
			return {
				adminVar,
				showFilter: true,
				model: {
					data:[]
				},
				params: {
					column: this.column,
					direction: 'desc',
					per_page: this.per_page,
					page: adminVar.queryString.page?adminVar.queryString.page:1,
					search_column: this.filter[0],
					search_operator: 'like',
					search_query_1: adminVar.queryString.searchQuery?adminVar.queryString.searchQuery:'',
					search_query_2: '',
				},
				operators: {
					like: 'LIKE',
					equal_to: '=',
					not_equal: '<>',
					less_than:'<',
					greater_than: '>',
					less_than_or_equal_to: '<=',
					greater_than_or_equal_to: '>=',
					in: 'IN',
					not_in: 'NOT IN',
					between: 'BETWEEN',
				}
			}
		},
		beforeMount(){
			this.fetchData()
		},
		methods: {
			moveTo(page){
					if (this.params.page + page >0 ) {
					this.params.page += page
					window.open( this.url + '?p=' + this.params.page + '&sq1=' + this.params.search_query_1,'_self' )
					this.params.page = this.params.page + page
					this.fetchData()
				}				
			},
			sort(column){
				if (column === this.params.column) {
					if (this.params.direction === 'desc') {
						this.params.direction = 'asc'
					}else{
						this.params.direction = 'desc'
					}
				}else{
					this.params.column = column
					this.params.direction ='asc'
				}
				this.fetchData()
			},
			fetchData(){

					get(this.buildURL())
					.then((res)=>{
						this.model = res.data.model
					})
					.catch(function(error){
						console.log(error)
					})
			},
			buildURL(){
				var p = this.params
				return `${this.source}?column=${p.column}&direction=${p.direction}&per_page=${p.per_page}&page=${p.page}&search_column=${p.search_column}&search_operator=${p.search_operator}&search_query_1=${p.search_query_1}&search_query_2=${p.search_query_2}`
			}
		}
	}
</script>