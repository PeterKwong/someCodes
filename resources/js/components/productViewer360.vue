<template>
          <div
             class="cloudimage-360"
             :data-folder="folder"
             :data-filename="filename"
             data-amount="60"
             data-spin-reverse="true"
             :data-keys=autoPlay
             :style = " { 'cursor' : status } "
             @mouseover=" status= 'grabbing' "
             > 
          </div>
</template>

<script type="text/javascript">

	export default {
		props: ['folder', 'filename'],
		data(){
			return {
				autoPlay:true,
				status: 'grab',			
				}
		},
		components: {
		},
		methods: {
			autoPlayToTrue(){
				console.log('true')
				this.autoPlay = true
			},

		}
	}
</script>

