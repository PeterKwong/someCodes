<template>

	<div>  
	
      <button href="" class="btn btn-primary is-large" :disabled="clickable==0" type="submit" @click.prevent="buy">
      	<center>
	      	<i class="fab fa-cc-mastercard"></i><i class="fab fa-cc-visa"></i>
	      	VISA / Master
      	</center>
      </button>  
 
		<form action="/purchases" method="POST">
			<input type="hidden" name="stripeToken" v-model="formData.stripeToken">
			<input type="hidden" name="stripeEmail" v-model="formData.stripeEmail">        
		</form>
	</div>
</template>



<script>


export default {
	props:['clickable', 'deposit', 'paymentmodalactive', 'user', 'title' , 'billformdata'],
	data(){
		return {
			formData:{ stripeEmail:'',
					stripeToken:'',
				},
			mutualVar,
			stripe:'',
			error:'',

		}
	},
	created(){
	},
	methods:{
		buy(){
			this.StripeConFigure()
			this.stripe.open({
				name:'Ting Diamond Limited',
				description: this.title,
				zipCode: true,
				amount: this.deposit * 100,
				currency: 'hkd',
			});
		},
		StripeConFigure(){
			this.stripe = StripeCheckout.configure({
			key: StripeVariables.stripeKey,
			image: '/images/front-end/logo/logo_2019_grey.png',
			locale:'auto',
			email: this.user.email,
			token: (token)=>{

					this.formData.stripeToken = token.id;
					this.formData.stripeEmail = token.email

					console.log(this.billformdata)
					this.billformdata.depositPaymentMethod = 'VISA'
					this.billformdata.stripeToken = token.id
					mutualVar.status.isProcessing = true

					post('/api/place-order', this.billformdata)
					.then( (res) => { 
						if (res.data.saved) {
		                    this.receivedPayment(res.data.message)
							mutualVar.status.isProcessing = false
		                }
	                })
					.catch((error)=>{
						this.$emit('paymentModalActive',null)
						mutualVar.notification.state.error = error.response.data.message
					})

				}
			})
		},
        receivedPayment(mes){
                // var message = mutualVar.notification.contactMessage
                // message.title = 'message'
                // message.type = 'is-danger'
                // message.data.push(mes)
                // message.next = { nextUrl: mutualVar.langs.locale + '/account/pending', nextText: 'check your pending order'} 
                // message.active = true
                mutualVar.cookiesInfo.shoppingCart.items = []
             	mutualVar.cookiesInfo.shoppingCart.selectingIndex = 0
                this.$parent.sendCookies()
                this.$parent.updateCartItems()
                window.open( mutualVar.langs.locale + '/thank-you','_self') 
        },
	}


}
</script>



