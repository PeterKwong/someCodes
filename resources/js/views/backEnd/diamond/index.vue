<template>
	<data-viewer :source = "source" :thead="thead" :filter="filter" :create="create" :title="title">
		<template slot-scope="props">
			<tr @click="clickRow(props.item)">
				<td>{{props.item.id}}</td>
				<td>{{props.item.price}}</td>
				<td>{{props.item.stock}}</td>
				<td>{{props.item.weight}}</td>
				<td>{{props.item.certificate}}</td>
				<td>{{props.item.color}}</td>
				<td>{{props.item.clarity}}</td>
				<td>{{props.item.cut}}</td>
				<td>{{props.item.polish}}</td>
				<td>{{props.item.symmetry}}</td>
				<td>{{props.item.fluorescence}}</td>
				<td>{{props.item.milky}}</td>
				<td>{{props.item.lab}}</td>
				<td>{{props.item.location}}</td>
				<td>{{props.item.has_video}}</td>
				<td @click="setDue(props.item)" ><a class="button is-primary">{{props.item.available}}</a></td>
				<td>{{props.item.updated_at}}</td>
				<td>{{props.item.created_at}}</td>
			</tr>
		</template>
	</data-viewer>

</template>

<script>
	import {toMulipartedForm} from '../../../helpers/form'
	import DataViewer from '../../../components/DataViewer.vue'
	import {readDiamond} from '../../../helpers/downDiamond'
	import { get, rapPost } from '../../../helpers/api'



	export default {
		name: 'JewellryIndex',
		data(){
			return {
				title: 'Diamond Check',
				source: '/api/diamondsInd',
				form:{
					
				},
				data:'',
				create:'/adm/jewellries/create',
				thead: [
				{ title: 'ID', key: 'id', sort: true},
				{ title: 'price', key: 'price', sort: true},
				{ title: 'Stock', key: 'stock', sort: true},
				{ title: 'Weight', key: 'weight', sort: true},
				{ title: 'certificate', key: 'certificate', sort: true},
				{ title: 'color', key: 'color', sort: true},
				{ title: 'clarity', key: 'clarity', sort: true},
				{ title: 'cut', key: 'cut', sort: true},
				{ title: 'polish', key: 'polish', sort: true},
				{ title: 'symmetry', key: 'symmetry', sort: true},
				{ title: 'fluorescence', key: 'fluorescence', sort: true},
				{ title: 'milky', key: 'milky', sort: true},
				{ title: 'lab', key: 'lab', sort: true},
				{ title: 'location', key: 'location', sort: true},
				{ title: 'video', key: 'video', sort: true},
				{ title: 'available', key: 'available', sort: true},
				{ title: 'Updated At', key: 'updated_at', sort: true},
				{ title: 'Created At', key: 'created_at', sort: true},
				],
				filter: [
				'certificate','id',
				]
			}
		},
		methods:{
			save(){
					rapPost(this.storeURL, this.form)
					.then((response)=>{
						Vue.set(this.$data, 'form', response.data.form)

					})
					.catch(function(error){
						Vue.set(this.$data, 'errors', error.response.data)
						this.isProcessing = false
					})
			},
			clickRow(row){
				window.open('/hk/gia-loose-diamonds/'+ row.id )
			 },
			setDue(row){
				// alert('hi')
				get('/api/diamonds-toggle-available/'+row.id)
					.then((response)=>{
						window.open('/adm/diamonds/', '_self')
					})
					.catch(function(error){
						Vue.set(this.$data, 'errors', error.response.data)
						this.isProcessing = false
					})
			},
		},

		created(){
			this.save()
		},
		components: {
			DataViewer 
				}
	}
</script>

