<script >
	var StripeVariables = {
		stripeKey: "{{ config('global.stripe.key' . config('global.paymentMode') ) }}"
	}
</script>