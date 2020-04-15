<template>
	<div class="section" id="customerMoments">
                <div class="level">
                    <div class="level-item">
                    <a href="" class="title is-5"> Customer Moments</a>
                    </div>
                </div>

                <div class="tile is-ancestor is-hidden-mobile" >
                    
                        <div class="tile is-3">
                            <center>
                               <a href=""><img class="crop" :src=" mutualVar.storage.s3Cache + 'public' + '/images/' " width="90%">
                                <br></a>
                            </center>
                        </div>

                        <div class="tile is-3">
                            <center>
                              <a href=""><img class="crop" :src=" mutualVar.storage.s3Cache + 'public' + '/images/' " width="90%">
                                <br></a>
                            </center>
                        </div>

                        <div class="tile is-3">
                            <center>
                              <a href=""><img class="crop" :src=" mutualVar.storage.s3Cache + 'public' + '/images/' " width="90%">
                                <br></a>
                            </center>
                        </div>

                        <div class="tile is-3">
                            <center>
                              <a href=""><img class="crop" :src=" mutualVar.storage.s3Cache + 'public' + '/images/' " width="90%">
                                <br></a>
                            </center>
                        </div>
                        
                 </div>

                 <div class="tabs is-ancestor is-hidden-desktop is-hidden-tablet is-centered">
                        
                    <ul>
                        <li>
                            <center>
                               <a href=""><img class="crop" :src=" mutualVar.storage.s3Cache + 'public' + '/images/' " width="200">
                                <br></a>
                            </center>
                        </li>

                        <li>
                            <center>
                              <a href=""><img class="crop" :src=" mutualVar.storage.s3Cache + 'public' + '/images/' " width="200">
                                <br></a>
                            </center>
                        </li>

                        <li>
                            <center>
                              <a href=""><img class="crop" :src=" mutualVar.storage.s3Cache + 'public' + '/images/' " width="200">
                                <br></a>
                            </center>
                        </li>

                        <li>
                            <center>
                              <a href=""><img class="crop" :src=" mutualVar.storage.s3Cache + 'public' + '/images/' " width="200">
                                <br></a>
                            </center>
                        </li>
                    </ul>

                 </div>
            </div>
</template>

<script type="text/javascript">

import { get } from '../helpers/api'
import mutualVar from '../helpers/mutualVar'
	
export default {
	data(){
		return {
            mutualVar,
			posts: []
		}
	},
	watch:{
		'$route': 'fetchData'
	},
	beforeMount(){
		this.fetchData()
	},
	methods:{
		fetchData(){
			get(`/api/customerMoments`, this.$route.fullPath.slice(1,3))
			.then((res)=>{
				this.posts = res.data.posts
			})
		}
	}
}
</script>