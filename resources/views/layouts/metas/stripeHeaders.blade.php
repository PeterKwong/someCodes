<script >
	var StripeVariables = {
		stripeKey: "{{ config('services.stripe.key' . config('services.paymentMode') ) }}"
	}
</script>