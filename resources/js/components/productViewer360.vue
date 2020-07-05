<style type="text/css">
/*	canvas {
	  background-color:#fff;
	  margin:50px;
	},*/
	#productViewer {
	  height: auto;
	  width: 100%;
	}
</style>

<template>
         <div class="row text-center">
         	<div class="col-12" >
         		<div class="progress" v-if="loading">
    				  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
    				  :aria-valuenow="viewer.progress" aria-valuemin="0" :aria-valuemax="viewer.size" 
    				  :style=" 'width:' +  viewer.progress * 100/viewer.size + '%'"></div>
    				</div>
            <div v-if="loading && viewer.progress>0">
              <img :src="viewer.source + viewer.progress + viewer.filename"  width="100%">
            </div>
            <div v-if="loading && viewer.progress == 0">
              <img :src="viewer.source + 1 + viewer.filename"  width="100%">
            </div>
			  	  <canvas id="productViewer" :width="width" :height="height"></canvas>
			  
         	</div>         		
		</div>
</template>

<script type="text/javascript">

import productViewer from '../helpers/productViewer'

	export default {
		props: ['folder', 'filename'],
		data(){
			return {
				width:800,
				height:800,
				viewer:mutualVar.productViewer,
				}
		},
		methods:{
			init(){
				this.viewer.source = this.folder
				this.viewer.filename = this.filename

			},
		},
		computed:{
			loading(){
          		return this.viewer.progress * 100/this.viewer.size < 100
			},
		},
		components: {
		},
		created(){
      this.init()

		},
		mounted(){
      productViewer
		}
	
	}




</script>



