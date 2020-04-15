<template>

<div class="container">	
	<h1 class="title is-3">{{title}}</h1>
	<form @submit.prevent="save">
		<div class="field" >
			<div class="columns">

				<div class="column is-4">
						<label class="label">Customer</label>
						<div class="control">
							<typehead :options="option.customers" v-model="form.customer_id"></typehead>
							
							<small class="is-danger" v-if="errors.customer_id">{{errors.customer_id[0]}}</small>
						</div>
				</div>	
				<div class="column is-4">
					<div class="control has-icon-left">
						<div class="control">
							<label class="label">Title</label>
								<input type="text" class="input" v-model="form.title" placeholder="item name" required>
								<small class="is-danger" v-if="errors.title">{{errors.title[0]}}</small>
						</div>
						<div class="control">
							<label class="label">Invoice No</label>
								<input type="text" class="input" v-model="form.invoice_no" placeholder="item name" required>
								<small class="is-danger" v-if="errors.title">{{errors.invoice_no[0]}}</small>
						</div>
					</div>
				</div>
				<div class="column is-4">
					<div class="control ">
						<div class="control">
							<label class="label">Date</label>
								<input type="date" class="input" v-model="form.date">
								<small class="is-danger" v-if="errors.date">{{errors.date[0]}}</small>
						</div>
					</div>
					<div class="control ">
						<div class="control">
							<label class="label">Due Date</label>
								<input type="date" class="input" v-model="form.due_date">
								<small class="is-danger" v-if="errors.due_date">{{errors.due_date[0]}}</small>
						</div>
					</div>
			</div>
			

		</div>

		<div class="box">
			<div class="columns">
				<div class="column is-4">
						<a class="button " href="/adm/inv-diamonds/create">Add diamond</a>
				</div>
				
			</div>

			<div class="columns">
				<div class="column is-4">
						<label>Diamond</label>
						<typehead :options = "option.inv_diamonds" v-model="selectedDia" ></typehead>
				</div>
				
			</div>

			<h1>Diamonds</h1>
			<div class="box" v-for="(diamond,index) in form.inv_diamonds">
				<div class="columns" v-for="optDia in option.inv_diamonds" v-if="optDia.id==diamond.id">
					<a class="delete" @click="form.inv_diamonds.splice(index,1)"></a>

							<div class="column is-1">
								<label>ID</label>
								<p class="subtitle is-5">{{optDia.id}}</p>
							</div>

							<div class="column is-2">
								<label>Price</label>
								<input class="input" type="text" name="unit_price" v-model="form.inv_diamonds[index].price">
<!-- 								<p class="subtitle is-5">{{optDia.unit_price}}</p>
 -->							</div>

							<div class="column is-1">
								<label>weight</label>
								<p class="subtitle is-5">{{optDia.weight}}</p>
							</div>

							<div class="column is-3">
								<label>stock</label>
<!-- 								<p class="subtitle is-5">{{optDia.stock}}</p>
 -->								<input class="input" type="text" name="stock" v-model="form.inv_diamonds[index].stock">
							</div>

							<div class="column is-2">
								<label>Certificate</label>
								<p class="subtitle is-5">{{optDia.text}}</p>
							</div>

							<div class="column is-1">
								<label>color</label>
								<p class="subtitle is-5">{{optDia.color}}</p>
							</div>

							<div class="column is-1">
								<label>clarity</label>
								<p class="subtitle is-5">{{optDia.clarity}}</p>
							</div>

							<div class="column is-1" v-if="userRole == 'admin' ">
								<label>Random</label>
								<p class="subtitle is-5">{{optDia.stock | regExp('-C[0-9]*' , optDia.price) }}</p>
							</div>

						
				</div>
			</div>
		</div>

<!-- 
		<hr>
		<button class="button" @click="addDiamond">Add Diamond</button>
		<div class="box" v-for="(diamond,index) in form.inv_diamonds" >
			<a class="delete is-medium" @click="form.inv_diamonds.splice(index,1)"></a>


		<div class="columns">
				<div class="column is-4">
						<div class="control">
							<label class="label">Price</label>
								<input type="text" class="input" v-model="diamond.price" placeholder="price" required>
								<small class="is-danger" v-if="errors.price">{{errors.price[0]}}</small>
						</div>
				</div>	
				<div class="column is-2">
						<div class="control">
							<label class="label">Weight</label>
								<input type="text" class="input" v-model="diamond.weight" placeholder="weight" required>
								<small class="is-danger" v-if="errors.weight">{{errors.weight[0]}}</small>
						</div>
				</div>	
				<div class="column is-2">
						<div class="control">
							<label class="label">Color</label>
								<input type="text" class="input" v-model="diamond.color" placeholder="color" required>
								<small class="is-danger" v-if="errors.color">{{errors.color[0]}}</small>
						</div>
				</div>	
				<div class="column is-2">
						<div class="control">
							<label class="label">Clarity</label>
								<input type="text" class="input" v-model="diamond.clarity" placeholder="clarity" required>
								<small class="is-danger" v-if="errors.clarity">{{errors.clarity[0]}}</small>
						</div>
				</div>
				<div class="column is-2">
						<div class="control">
							<label class="label">fluorescence</label>
								<input type="text" class="input" v-model="diamond.fluorescence" placeholder="fluorescence" required>
								<small class="is-danger" v-if="errors.fluorescence">{{errors.fluorescence[0]}}</small>
						</div>
				</div>	
					

		</div>
		<div class="columns" >
				<div class="column is-4">
						<div class="control">
							<label class="label">Certificate</label>
								<input type="text" class="input" v-model="diamond.certificate" placeholder="certificate" required>
								<small class="is-danger" v-if="errors.certificate">{{errors.certificate[0]}}</small>
						</div>
				</div>	
				<div class="column is-2">
						<div class="control">
							<label class="label">stock</label>
								<input type="text" class="input" v-model="diamond.stock" placeholder="stock" required>
								<small class="is-danger" v-if="errors.stock">{{errors.stock[0]}}</small>
						</div>
				</div>
				<div class="column is-1">
						<div class="control">
							<label class="label">cut</label>
								<input type="text" class="input" v-model="diamond.cut" placeholder="cut" required>
								<small class="is-danger" v-if="errors.cut">{{errors.cut[0]}}</small>
						</div>
				</div>	
				<div class="column is-1">
						<div class="control">
							<label class="label">Polish</label>
								<input type="text" class="input" v-model="diamond.polish" placeholder="polish" required>
								<small class="is-danger" v-if="errors.polish">{{errors.polish[0]}}</small>
						</div>
				</div>	
				<div class="column is-2">
						<div class="control">
							<label class="label">Symmetry</label>
								<input type="text" class="input" v-model="diamond.symmetry" placeholder="symmetry" required>
								<small class="is-danger" v-if="errors.symmetry">{{errors.symmetry[0]}}</small>
						</div>
				</div>	
				<div class="column is-1">
						<div class="control">
							<label class="label">shape</label>
								<input type="text" class="input" v-model="diamond.shape" placeholder="shape" required>
								<small class="is-danger" v-if="errors.shape">{{errors.shape[0]}}</small>
						</div>
				</div>
				<div class="column is-1">
						<div class="control">
							<label class="label">lab</label>
								<input type="text" class="input" v-model="diamond.lab" placeholder="lab" required>
								<small class="is-danger" v-if="errors.lab">{{errors.lab[0]}}</small>
						</div>
				</div>
				
					

			</div>

		</div> -->


		<div class="box" >
			<div class="columns">
				<div class="column is-4">
						<label>Jewelleries</label>
						<typehead :options = "option.jewelleries" v-model="selectedJew" ></typehead>
				</div>
				
			</div>

		<h1>Jewelleries</h1>
		<div class="box" v-for="(jewellery,index) in form.jewelleries">
			<div class="columns" v-for="optJew in option.jewelleries" v-if="optJew.id==jewellery.id">
				<a class="delete" @click="form.jewelleries.splice(index,1)"></a>

						<div class="column is-1">
							<label>ID</label>
							<p class="subtitle is-5">{{optJew.id}}</p>
						</div>

						<div class="column is-2">
							<label>Unit Price</label>
							<p class="subtitle is-5">{{optJew.unit_price}}</p>
						</div>

						<div class="column is-2">
							<label>Name</label>
							<p class="subtitle is-5">{{optJew.text}}</p>
						</div>

						<div class="column is-4">
							<label>Title</label>
							<p class="subtitle is-5">{{optJew.texts[0].content}}</p>
						</div>
						<div class="column is-3">
							<label>Image</label>
							<img :src="mutualVar.storage[mutualVar.storage.live] + 'public' +'/images/' + optJew.images[0].image" v-if="optJew.images[0]">
						</div>

					
				</div>
			</div>
		</div>

		<div class="box" >
			<div class="columns">
				<div class="column is-4">
						<label>engagementRing</label>
						<typehead :options = "option.engagement_rings" v-model="selectedEng" ></typehead>
				</div>
				
			</div>
		

		<h1>engagementRing</h1>
		<div class="box" v-for="(engagementRing,index) in form.engagement_rings">
			<div class="columns" v-for="optEng in option.engagement_rings" v-if="optEng.id==engagementRing.id">
				<a class="delete" @click="form.engagement_rings.splice(index,1)"></a>

						<div class="column is-1">
							<label>ID</label>
							<p class="subtitle is-5">{{optEng.id}}</p>
						</div>

						<div class="column is-2">
							<label>Unit Price</label>
							<p class="subtitle is-5">{{optEng.unit_price}}</p>
						</div>

						<div class="column is-2">
							<label>Name</label>
							<p class="subtitle is-5">{{optEng.text}}</p>
						</div>

						<div class="column is-4">
							<label>Title</label>
							<p class="subtitle is-5">{{optEng.texts[0].content}}</p>
						</div>
						<div class="column is-3">
							<label>Image</label>
							<img :src="mutualVar.storage[mutualVar.storage.live] + 'public' +'/images/' + optEng.images[0].image" v-if="optEng.images[0]">
						</div>
					
				</div>
			</div>
		</div>

		<div class="box" >
			<div class="columns">
				<div class="column is-4">
						<label>weddingRing</label>
						<typehead :options = "option.wedding_rings" v-model="selectedWed" ></typehead>
				</div>
				
			</div>
		

		<h1>weddingRing</h1>
		<div class="box" v-for="(weddingRing,index) in form.wedding_rings">
			<div class="columns" v-for="optWed in option.wedding_rings" v-if="optWed.id==weddingRing.id">
				<a class="delete" @click="form.wedding_rings.splice(index,1)"></a>

						<div class="column is-1">
							<label>ID</label>
							<p class="subtitle is-5">{{optWed.id}}</p>
						</div>

						<div class="column is-2">
							<label>Unit Price</label>
							<p class="subtitle is-5">{{optWed.unit_price}}</p>
						</div>

						<div class="column is-2">
							<label>Name</label>
							<p class="subtitle is-5">{{optWed.text}}</p>
						</div>

						<div class="column is-4">
							<label>Title</label>
							<p class="subtitle is-5">{{optWed.texts[0].content}}</p>
						</div>
						<div class="column is-3">
							<label>Image</label>
							<img :src="mutualVar.storage[mutualVar.storage.live] + 'public' +'/images/' + optWed.images[0].image" v-if="optWed.images[0]">
						</div>
					
				</div>
			</div>
		</div>


			<table class="table is-fullwidth">
				
				<tfoot>
						<tr>
							<td colspan="4"></td>
							<td>Sub Total</td>
							<td>{{subTotal}}</td>
						</tr>
						<tr>
							<td colspan="4">
							</td>
							<td>Discount</td>
							<td>
								<input type="number" class="input" v-model="form.discount" required>
							</td>
						</tr>
						<tr>
							<td colspan="4">
							</td>
							<td><strong>Deposit</strong> 						
								<select v-model="form.deposit_method">
									<option value="cash">Cash</option>
									<option value="eps">EPS</option>
									<option value="visa">Visa</option>
									<option value="aliypay">Aliypay</option>
									<option value="wechat">Wechat</option>
									<option value="unionpay">Unionpay</option>
								</select>
							</td>

							<td>
								<input type="number" class="input" v-model="form.deposit" required>
							</td>
						</tr>
						<tr>
							<td colspan="4"></td>
							<td><strong>Extra</strong></td>
							<td>
								<input type="number" class="input" v-model="form.extra" required>
							</td>
						</tr>
						<tr>
							<td colspan="4">
							</td>
							<td>Balance
								<select v-model="form.balance_method">
									<option value="cash">Cash</option>
									<option value="eps">EPS</option>
									<option value="visa">Visa</option>
									<option value="aliypay">Aliypay</option>
									<option value="wechat">Wechat</option>
									<option value="unionpay">Unionpay</option>
								</select>
							</td>

							<td>
								{{balance}}
							</td>
						</tr>
						<tr>
							<td colspan="4"></td>
							<td><strong>Total</strong></td>
							<td>{{total}}</td>
						</tr>
						<tr>
							<td colspan="4"></td>
							<td><strong>notes</strong></td>
							<td><textarea v-model="form.notes" class="textarea">{{form.notes}}</textarea></td>
						</tr>
				</tfoot>
			</table>

			<div class="columns is-centered">
				<div class="column is-8">
					<button class="button" @click="form.count=!form.count">Count: {{form.count}}</button>
				</div>

							
				
				<div class="column ">
					<button class="button is-primary" :disabled="isLoading" type="submit" @submit.stop="save">Save</button>
				</div>
			</div>
		</div>
	</form>	
</div>
	
</template>

<script>
	import Vue from 'vue'
	import {get, post, put} from '../../../helpers/api'
	import Typehead from '../../../components/typehead.vue'
	import mutualVar from '../../../helpers/mutualVar'
	import Auth from '../../../store/auth'

	export default {
		name: 'InvoiceForm',
		components:{Typehead},
		data(){
			return {
				mutualVar,
				userRole: Auth.state.user_role,
				form: {
					ind_diamonds:[],
					jewelleries:[{id:''}],
					sub_total: 0
				},
				selectedJew:[],
				selectedEng:[],
				selectedWed:[],
				selectedDia:[],
				errors: {},
				option: {
					customers: []
				},
				title: 'Create',
				initialize: '/api/invoices/create',
				redirect: '/adm/invoices',
				store: '/api/invoices',
				method: 'post',
				isLoading:false,
			}
		},
		beforeMount(){
			if (this.$route.meta.mode === 'edit') {
				this.title = 'Edit'
				this.initialize = '/api/invoices/' + this.$route.params.id + '/edit'
				this.store = '/api/invoices/' + this.$route.params.id
				this.method = 'put'
			}
			this.fetchData()
		},
		watch: {
			'$route' : 'fetchData',
			'selectedJew': 'addSelectedJew' ,
			'selectedEng': 'addSelectedEng' ,
			'selectedWed': 'addSelectedWed' ,
			'selectedDia': 'addSelectedDia' ,
		},
		computed: {
			subTotal(){
				
				var price = 0


				price +=  this.form.jewelleries.reduce((carry, item)=>{
							return carry += parseInt(item.unit_price)
						},0)


				price +=  this.form.engagement_rings.reduce((carry, item)=>{
							return carry += parseInt(item.unit_price)
						},0)


				price +=  this.form.wedding_rings.reduce((carry, item)=>{
							return carry += parseInt(item.unit_price)
						},0)


				price +=  this.form.inv_diamonds.reduce((carry, item)=>{
							return carry += parseInt(item.price)
						},0)

	

				return this.form.sub_total = price
			},
			total(){
				return this.form.total = parseInt(this.form.sub_total) - parseInt(this.form.discount) + parseInt(this.form.extra)
			},
			balance(){
				return this.form.balance = parseInt(this.total) - parseInt(this.form.deposit) 
			},
		
		},		
		filters:{
			regExp(source, str, price){
				var pattern = new RegExp(str,'i')
				var result = pattern.exec(source)

					console.log(result)

				if(result != null){
					var oriPrice = result.toString().slice(2).split("").reverse().join("") * 7.85 *10
					var profit = Math.round( ( ( price  - oriPrice) / oriPrice) * 100 )
					return profit
				}

			}
		},
		methods: {
			addSelectedJew(){
				this.form.jewelleries.push(this.option.jewelleries
					.filter((item)=>{
						return item.id == this.selectedJew
					})[0] )
			},
			addSelectedEng(){
				this.form.engagement_rings.push(this.option.engagement_rings
					.filter((item)=>{
						return item.id == this.selectedEng
					})[0] )
			},
			addSelectedWed(){
				this.form.wedding_rings.push(this.option.wedding_rings
					.filter((item)=>{
						return item.id == this.selectedWed
					})[0] )
			},
			addSelectedDia(){
				this.form.inv_diamonds.push(this.option.inv_diamonds
					.filter((item)=>{
						return item.id == this.selectedDia
					})[0] )
			},
			addDiamond(){
				this.form.inv_diamonds.push({
					certificate: '',
					clarity: '',
					color:'',
					cut:'EX',
					fluorescence:'NON',
					lab:'GIA',
					polish:'EX',
					shape:'RD',
					stock:'',
					symmetry:'EX',
					price:0,
					weight:''
				})
			},
			fetchData(){
				get(this.initialize)
					.then((res)=>{
						Vue.set(this.$data, 'form', res.data.form)
						Vue.set(this.$data, 'option', res.data.option)
					})
					.catch(function(error){
						console.log(error)
					})
			},
			save(){
				this.isLoading = true
				if (this.method === 'put') {
					put(this.store, this.form)
						.then((res)=>{
						if(res.data.saved){
							this.$router.push(this.redirect)
						}
						this.isLoading = false
					})
					.catch((error)=>{
						this.$data.errors = error.res.data
						this.isLoading = false						
					})

				}else{post(this.store, this.form)
					.then((res)=>{
						if(res.data.saved){
							this.$router.push(this.redirect)
						}
						this.isLoading = false
					})
					.catch((error)=>{
						this.$data.errors = error.res.data
						this.isLoading = false						
					})}
			}
		}
	}
</script>