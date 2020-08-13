
import {toMulipartedForm} from '../../../helpers/form'
import DataViewer from '../../../components/DataViewer.vue'
import {readDiamond} from '../../../helpers/downDiamond'
import { get, rapPost } from '../../../helpers/api'


export default {
	el:'#diamondIndex',
	name: 'DiamondIndex',
	data(){
		return {
			title: 'Diamond Check',
			url: '/adm/diamonds',
			source: '/api/diamondsInd',
			form:{
			},
			data:'',
			create:'/adm/jewellries/create',
			thead: [
			{ title: 'ID', key: 'id', sort: true},
			{ title: 'Create', key: 'Create', sort: false},
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
			{ title: 'brown', key: 'brown', sort: true},
			{ title: 'green', key: 'green', sort: true},
			{ title: 'location', key: 'location', sort: true},
			{ title: 'available', key: 'available', sort: true},
			{ title: 'starred', key: 'starred', sort: true},
			{ title: 'heart_image', key: 'heart_image', sort: true},
			{ title: 'arrow_image', key: 'arrow_image', sort: true},
			{ title: 'asset_image', key: 'asset_image', sort: true},
			{ title: 'video', key: 'video', sort: true},
			{ title: 'lab', key: 'lab', sort: true},
			{ title: 'Updated At', key: 'updated_at', sort: true},
			{ title: 'Created At', key: 'created_at', sort: true},
			],
			filter: [
			'certificate','id','supplier_id',
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
		editDiamond(row){
			window.open('/adm/diamonds/'+ row.id +'/edit')

		},
		setDue(row){
			// alert('hi')
			get('/api/diamonds-toggle-available/'+row.id)
				.then((response)=>{
					window.open('/adm/diamonds', '_self')
				})
				.catch(function(error){
					Vue.set(this.$data, 'errors', error.response.data)
					this.isProcessing = false
				})
		},
		saveToInvDiamond(row){
			window.open('/adm/invoice-diamonds/create-from-diamond/'+ row.id )
		},
		toggleStarredDiamond(row){
			window.open('/adm/diamonds/toggle-starred-diamond/'+ row.id )
			window.open('/adm/diamonds', '_self')

		},
	},

	created(){
		this.save()
	},
	components: {
		DataViewer 
			}
}

