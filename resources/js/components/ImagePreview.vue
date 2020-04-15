<template>
	<div class="image__preview" v-if="image">
		<img width="100%" :src="image">
		<p class="button is-small" @click="$emit('close')">&times;</p>
	</div>
</template>

<script type="text/javascript">
	import mutualVar from '../helpers/mutualVar'

	export default{
		props: {
			preview: {
				type: [String, File],
				default: null
			}
		},
		data(){
			return {
				image: null,
				mutualVar,

			}
		},
		created(){
			this.setPreview()
		},
		watch: {
			'preview' : 'setPreview'
		},
		methods: {
			setPreview(){
				if (this.preview instanceof File) {
					const fileReader = new FileReader()
					fileReader.onload = (event) =>{
						this.image = event.target.result
					}
					fileReader.readAsDataURL(this.preview)
				}else if (typeof this.preview == 'string'){
					this.image = mutualVar.storage[mutualVar.storage.live] + 'public'+ `/images/${this.preview}`
				}else{
					this.image = null
				}
			}
		}
	}
</script>