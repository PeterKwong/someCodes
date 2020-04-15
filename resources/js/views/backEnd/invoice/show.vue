<template>
	<div class="container">
	<nav class="level">
		
	</nav>
	<div v-if="fullpath">
		<div class="columns">
			<div class="column is-left">
				<a :href="'/adm/invoices/pdf/' + model.id" class="button is-primary">Print</a>
				<router-link :to="'/adm/customer-jewelleries/' +model.id + '/create'" class="button is-primary">Create Post</router-link>
			</div>
			<div class="column is-right">
			
			<router-link :to="'/adm/invoices/create'" class="button is-primary">Create</router-link>
			<router-link :to="'/adm/invoices/' + model.id + '/edit'" class="button is-primary">Edit</router-link>
			<button class="button is-primary" @click="remove">Delete</button>
			</div>
		</div>

	</div>

	<div :class="{'box': fullpath}">
		<div class="columns">
			<div class="column">
				
			      <img src="/front_end/company/logo_PNG_sq_60x60_1.png" alt="Bulma: a modern CSS framework based on Flexbox" width="60" height="200">
			   
			</div>
			<div class="column is-4">
				<h1 class="title is-3" >Invoice</h1>			
				<h1 class="subtitle is-5">{{company.info.name}}</h1>			
				<small><small><p >{{company.info.address}}</p></small></small>
				<small><small><p >Tel: {{company.info.contact}}</p></small></small>
				<a href="/">{{company.info.website}}</a>
			</div>
		</div>
		<hr>
		<div class="columns">
			<div class="column">
				<p class="title is-6">&nbsp; BILL TO</p>
				<p class="subtitle is-5"><small><small>&nbsp; {{model.customer.name}}</small></small></p>
				<p ><small><small>&nbsp; Phone: {{model.customer.phone}}</small></small></p>
			</div>
			<div class="column is-3">
				<p v-if="model.invoice_no"><small><small>Invoice Number: </small></small></p>			
				<p ><small><small> Invoice Date: </small></small></p>			
				<p v-if="model.due_date"><small><small> Payment Due: </small></small></p>
				<p ><small><small> Amount Due (HKD): </small></small></p>
			</div>
			<div class="column is-2">
				<p v-if="model.invoice_no"><small><small>{{model.invoice_no}}</small></small></p>			
				<p ><small><small>{{model.date}}</small></small></p>			
				<p ><small><small>{{model.due_date}}</small></small></p>
				<p ><small><small>${{model.total}}</small></small></p>
			</div>
		</div>

    <div class="tile">
   
<!--         <article class="tile notification is-primary">
 -->    
        </article>
       </div>
		<table class="table is-fullwidth">
				<thead>
					<tr class="is-selected">
						<th><small>Items</small></th>
						<th><small>Desciption</small></th>
						<th><small>Quantity</small></th>
						<th><small>Price</small></th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="diamond in model.inv_diamonds" v-if="model.inv_diamonds">
						<td><small><small><small>{{diamond.lab}}:{{diamond.certificate}}</small></small></small></td>
						<td><small><small><small>{{diamond.weight}}ct,{{diamond.color}} Color,{{diamond.clarity}} Clarity,{{diamond.cut}} Cut,{{diamond.polish}} Polish,{{diamond.symmetry}} Symmetry,{{diamond.fluorescence}}</small></small></small></td>
						<td><small><small><small>1</small></small></small></td>
						<td><small><small><small>{{diamond.price}}</small></small></small></td>
					</tr>
					<tr v-for="jewellery in model.jewelleries" v-if="model.jewelleries">
						<td><small><small><small>{{jewellery.stock}}</small></small></small></td>
						<td v-if="jewellery.texts[0]"><small><small><small>{{jewellery.texts[0].content}}</small></small></small></td>
						<td><small><small><small>1</small></small></small></td>
						<td><small><small><small>{{jewellery.unit_price}}</small></small></small></td>						
					</tr>
					<tr v-for="engagementRing in model.engagement_rings" v-if="model.engagement_rings">
						<td><small><small><small>{{engagementRing.stock}}</small></small></small></td>
						<td v-if="engagementRing.texts[0]"><small><small><small>{{engagementRing.texts[0].content}}</small></small></small></td>
						<td><small><small><small>1</small></small></small></td>
						<td><small><small><small>{{engagementRing.unit_price}}</small></small></small></td>						
					</tr>
					<tr v-for="weddingRing in model.wedding_rings" v-if="model.wedding_rings">
						<td><small><small><small>{{weddingRing.stock}}</small></small></small></td>
						<td><small><small><small>{{weddingRing.texts[0].content}}</small></small></small></td>
						<td><small><small><small>1</small></small></small></td>
						<td><small><small><small>{{weddingRing.unit_price}}</small></small></small></td>						
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="2"></td>
						<td><p class="subtitle is-6"><small><small>Discount:</small></small></p></td>
						<td><small><small>${{model.discount}}</small></small></td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td><p class="subtitle is-6"><small><small>Extra:</small></small></p></td>
						<td><small><small>${{model.extra}}</small></small></td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td><p class="subtitle is-6"><small><small>Deposit:</small></small></p></td>
						<td><small><small>${{model.deposit}}</small></small></td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td><p class="subtitle is-6"><small><small>Balance:</small></small></p></td>
						<td><small><small>${{model.balance}}</small></small></td>
					</tr>
					<tr>
						<td colspan="2"></td>
						<td><small>Total:</small></td>
						<td><small>${{model.total}}</small></td>
					</tr>
				</tfoot>
			</table>
			<hr>
			<div class="columns is-centered">
				<div class="column is-11 ">
					<small><small>
						<p class="">Notes:
							<br>
						{{model.notes}}
						</p>
					</small></small>
				</div>
			</div>

		</div>
	</div>
</template>

<script>

	import Vue from 'vue'
	import Images from '../../../helpers/images'
	import {get, del} from '../../../helpers/api'

	export default {
		name: 'invoiceShow',
		
		data(){
			return {
				model: {
					customer: {},
					items: []
				},
				company: [],
				images: Images,
				resource: 'invoices',
				redirect: '/adm/invoices'
			}
		},
		beforeMount(){
			this.fetchData()
		},
		watch: {
			'$route' : 'fetchData'
		},
		computed:{
				fullpath(){
					return !this.$route.fullPath.includes('pdf')
					
				}
		},
		methods: {
			fetchData(){

				get(`/api/${this.resource}/${this.$route.params.id}`)
				.then((res)=>{
					Vue.set(this.$data, 'model', res.data.model)
					Vue.set(this.$data, 'company', res.data.company)
				})
				.catch(function(error){
					console.log(error)
				})
			},
			remove(){

				del(`/api/${this.resource}/${this.$route.params.id}`)
					.then((res)=>{
						if (res.data.deleted) {
							this.$router.push(this.redirect)
						}
					})
					.catch(function(error){
						console.log(error)
					})
						
			}
		}
	}
</script>