<template>
  <div class="container is-fluid">
    <nav class="level">
      <!-- Left side -->
      <div class="level-left">
        <div class="level-item">
          <p class="subtitle is-5">
            <strong>{{title}}</strong>
          </p>
        </div>
      </div>

      <!-- Right side -->
      <div class="level-right">
      <router-link :to="create" class="button is-primary">Create</router-link>
        <p class="control">
         <button @click="showFilter = !showFilter">Filter</button>
        </p>
      </div>
    </nav>

    </div>
  
  
    
  </div>
</template>

<script>

  import { curlGet } from '../helpers/api'

  export default {
    props: [''],
    // components: { Pagination},
    data(){
      return {
        showFilter: true,
        model: {
          data:[]
        },
        keywords:['tingdiamond', 'ting diamond'],
        params: {
          column: 'id',
          direction: 'desc',
          per_page: 10,
          page: 1,
          search_operator: 'like',
          search_query_1: '',
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
      next(){
        if (this.model.next_page_url) {
          this.params.page++
          this.fetchData()
        }
      },
      prev(){
        if (this.model.prev_page_url) {
          this.params.page--
          this.fetchData()
        }
      },
      moveTo(page){
          if (this.params.page + page >0 ) {
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

        var data = ''

            curlGet('/api/xiaohungshu')

            .then((res)=>{
              // console.log(res.data.model)
              this.model = res.data.model
            })
            .catch(function(error){
              console.log(error)
            })

          
      },

    }
  }
</script>