<template>
	 	<sup v-if="mutualVar.cookiesInfo.shoppingCart.items.length != 0"> {{mutualVar.cookiesInfo.shoppingCart.items.length }}
	    </sup>
		    
</template>

<script type="text/javascript">

	export default{
		data(){
			return{
				mutualVar,
			}
		},
	}

</script>