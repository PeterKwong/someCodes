@extends('backEnd.app')

	@section('content')

	<div id="orderToInvoice">
		
		<br>

		<div class="card-box">	
			<h1 class="title is-3">@{{title}}</h1>
			<form @submit.prevent="save">
				<div class="field" >
					<div class="row">

						<div class="col-4">
								<label class="label">Customer</label>
								<div class="control">
									<typehead :options="option.customers" v-model="form.customer_id"></typehead>
									
									<small class="is-danger" v-if="errors.customer_id">@{{errors.customer_id[0]}}</small>
								</div>
						</div>	
						<div class="col-4">
							<div class="control has-icon-left">
								<div class="control">
									<label class="label">Title</label>
										<input type="text" class="form-control" v-model="form.title" placeholder="item name" required>
										<small class="is-danger" v-if="errors.title">@{{errors.title[0]}}</small>
								</div>
								<div class="control">
									<label class="label">Invoice No</label>
										<input type="text" class="form-control" v-model="form.invoice_no" placeholder="item name" required>
										<small class="is-danger" v-if="errors.title">@{{errors.invoice_no[0]}}</small>
								</div>
							</div>
						</div>
						<div class="col-4">
							<div class="control ">
								<div class="control">
									<label class="label">Date</label>
										<input type="date" class="form-control" v-model="form.date">
										<small class="is-danger" v-if="errors.date">@{{errors.date[0]}}</small>
								</div>
							</div>
							<div class="control ">
								<div class="control">
									<label class="label">Due Date</label>
										<input type="date" class="form-control" v-model="form.due_date">
										<small class="is-danger" v-if="errors.due_date">@{{errors.due_date[0]}}</small>
								</div>
							</div>
					</div>
					

				</div>

				<div class="box">
					<div class="row">
						<div class="col-4">
								<button class="btn btn-primary " href="/adm/inv-diamonds/create">Add diamond</button>
						</div>
						
					</div>

					<div class="row">
						<div class="col-4">
								<label>Diamond</label>
								<typehead :options = "option.invoice_diamonds" v-model="selectedDia" ></typehead>
						</div>
						
					</div>

					<h3>Diamonds</h3>
					<div class="box" v-for="(diamond,index) in form.invoice_diamonds">
						<div class="row" v-for="optDia in option.invoice_diamonds" v-if="optDia.id==diamond.id">
							<a class="delete" @click="form.invoice_diamonds.splice(index,1)"></a>

									<div class="col-1">
										<label>ID</label>
										<p class="subtitle is-5">@{{optDia.id}}</p>
									</div>

									<div class="col-2">
										<label>Price</label>
										<input class="form-control" type="text" name="unit_price" v-model="form.invoice_diamonds[index].price">
		<!-- 								<p class="subtitle is-5">@{{optDia.unit_price}}</p>
		 -->							</div>

									<div class="col-1">
										<label>weight</label>
										<p class="subtitle is-5">@{{optDia.weight}}</p>
									</div>

									<div class="col-3">
										<label>stock</label>
		<!-- 								<p class="subtitle is-5">@{{optDia.stock}}</p>
		 -->								<input class="form-control" type="text" name="stock" v-model="form.invoice_diamonds[index].stock">
									</div>

									<div class="col-2">
										<label>Certificate</label>
										<p class="subtitle is-5">@{{optDia.text}}</p>
									</div>

									<div class="col-1">
										<label>color</label>
										<p class="subtitle is-5">@{{optDia.color}}</p>
									</div>

									<div class="col-1">
										<label>clarity</label>
										<p class="subtitle is-5">@{{optDia.clarity}}</p>
									</div>

									<div class="col-1" v-if="userRole == 'admin' ">
										<label>Random</label>
										<p class="subtitle is-5">@{{optDia.stock | regExp('-C[0-9]*' , optDia.price) }}</p>
									</div>

								
						</div>
					</div>
				</div>


				<div class="box" >
					<div class="row">
						<div class="col-4">
								<label>Jewelleries</label>
								<typehead :options = "option.jewelleries" v-model="selectedJew" ></typehead>
						</div>
						
					</div>

				<h3>Jewelleries</h3>
				<div class="box" v-for="(jewellery,index) in form.jewelleries">
					<div class="row" v-for="optJew in option.jewelleries" v-if="optJew.id==jewellery.id">
						<a class="delete" @click="form.jewelleries.splice(index,1)"></a>

								<div class="col-1">
									<label>ID</label>
									<p class="subtitle is-5">@{{optJew.id}}</p>
								</div>

								<div class="col-2">
									<label>Unit Price</label>
									<p class="subtitle is-5">@{{optJew.unit_price}}</p>
								</div>

								<div class="col-2">
									<label>Name</label>
									<p class="subtitle is-5">@{{optJew.text}}</p>
								</div>

								<div class="col-4">
									<label>Title</label>
									<p class="subtitle is-5">@{{optJew.texts[0].content}}</p>
								</div>
								<div class="col-3">
									<label>Image</label>
									<img :src="mutualVar.storage.s3Cache + 'public' +'/images/' + optJew.images[0].image" v-if="optJew.images[0]">
								</div>

							
						</div>
					</div>
				</div>

				<div class="box" >
					<div class="row">
						<div class="col-4">
								<label>engagementRing</label>
								<typehead :options = "option.engagement_rings" v-model="selectedEng" ></typehead>
						</div>
						
					</div>
				

				<h3>engagementRing</h3>
				<div class="box" v-for="(engagementRing,index) in form.engagement_rings">
					<div class="row" v-for="optEng in option.engagement_rings" v-if="optEng.id==engagementRing.id">
						<a class="delete" @click="form.engagement_rings.splice(index,1)"></a>

								<div class="col-1">
									<label>ID</label>
									<p class="subtitle is-5">@{{optEng.id}}</p>
								</div>

								<div class="col-2">
									<label>Unit Price</label>
									<p class="subtitle is-5">@{{optEng.unit_price}}</p>
								</div>

								<div class="col-2">
									<label>Name</label>
									<p class="subtitle is-5">@{{optEng.text}}</p>
								</div>

								<div class="col-4">
									<label>Title</label>
									<p class="subtitle is-5">@{{optEng.texts[0].content}}</p>
								</div>
								<div class="col-3">
									<label>Image</label>
									<img :src="mutualVar.storage.s3Cache + 'public' +'/images/' + optEng.images[0].image" v-if="optEng.images[0]">
								</div>
							
						</div>
					</div>
				</div>

				<div class="box" >
					<div class="row">
						<div class="col-4">
								<label>weddingRing</label>
								<typehead :options = "option.wedding_rings" v-model="selectedWed" ></typehead>
						</div>
						
					</div>
				

				<h3>weddingRing</h3>
				<div class="box" v-for="(weddingRing,index) in form.wedding_rings">
					<div class="row" v-for="optWed in option.wedding_rings" v-if="optWed.id==weddingRing.id">
						<a class="delete" @click="form.wedding_rings.splice(index,1)"></a>

								<div class="col-1">
									<label>ID</label>
									<p class="subtitle is-5">@{{optWed.id}}</p>
								</div>

								<div class="col-2">
									<label>Unit Price</label>
									<p class="subtitle is-5">@{{optWed.unit_price}}</p>
								</div>

								<div class="col-2">
									<label>Name</label>
									<p class="subtitle is-5">@{{optWed.text}}</p>
								</div>

								<div class="col-4">
									<label>Title</label>
									<p class="subtitle is-5">@{{optWed.texts[0].content}}</p>
								</div>
								<div class="col-3">
									<label>Image</label>
									<img :src="mutualVar.storage.s3Cache + 'public' +'/images/' + optWed.images[0].image" v-if="optWed.images[0]">
								</div>
							
						</div>
					</div>
				</div>


					<table class="table is-fullwidth">
						
						<tfoot>
								<tr>
									<td colspan="4"></td>
									<td>Sub Total</td>
									<td>@{{subTotal}}</td>
								</tr>
								<tr>
									<td colspan="4">
									</td>
									<td>Discount</td>
									<td>
										<input type="number" class="form-control" v-model="form.discount" required>
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
											<option value="alipay">Alipay</option>
											<option value="wechat">Wechat</option>
											<option value="unionpay">Unionpay</option>
										</select>
									</td>

									<td>
										<input type="number" class="form-control" v-model="form.deposit" required>
									</td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td><strong>Extra</strong></td>
									<td>
										<input type="number" class="form-control" v-model="form.extra" required>
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
											<option value="alipay">Alipay</option>
											<option value="wechat">Wechat</option>
											<option value="unionpay">Unionpay</option>
										</select>
									</td>

									<td>
										@{{balance}}
									</td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td><strong>Total</strong></td>
									<td>@{{total}}</td>
								</tr>
								<tr>
									<td colspan="4"></td>
									<td><strong>notes</strong></td>
									<td><textarea class="form-control" v-model="form.notes" class="textarea">@{{form.notes}}</textarea></td>
								</tr>
						</tfoot>
					</table>

					<div class="row">
						<div class="col-8">
							<button class="button" @click="form.count=!form.count">Count: @{{form.count}}</button>
						</div>

									
						
						<div class="col">
							<button class="btn btn-primary" :disabled="isLoading" type="submit" @submit.stop="save">Save</button>
						</div>
					</div>
				</div>
			</form>	
		</div>


	</div>



	@endSection