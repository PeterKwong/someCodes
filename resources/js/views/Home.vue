<template>
  <div>

  </div>
</template>


<script type="text/javascript">

  import Vue from 'vue'
  import {get} from '../helpers/api'

	export default {
		data(){
			return {
				posts: [],
				trans: {},
        items: []
			}
		},
     watch: {
      // '$route': 'fetchData'
    },
		created(){
		},
    methods: {

    }
	}
</script>