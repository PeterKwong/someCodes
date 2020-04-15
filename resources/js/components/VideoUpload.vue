<template>
	<div class="image">
		<p v-if="value">{{value}}</p>
		<div class="" >
			<input class="form-control" type="file" accept="videos/*" @change="upload">
		</div>
	</div>
</template>

<script type="text/javascript">
	export default {
		props: {
			value: {
			
				default: null
			}
		},
		methods: {
			upload(e){
				const file = e.target.files
				if (file && file.length > 0) {
					this.$emit('input', file[0])
				}
			}
		}
	}
</script>