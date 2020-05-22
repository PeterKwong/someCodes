
import DataViewer from '../../../components/DataViewer.vue'

export default {
	el:'#jewelleryIndex',
	name: 'JewelleryIndex',
	data(){
		return {
			adminVar,
			title: 'Jewellery',
			source: '/api/jewelleryInd',
			url:'/adm/jewellery',
			create:'/adm/jewellery/create',
			thead: [
			{ title: 'ID', key: 'id', sort: true},
			{ title: 'Stock', key: 'stock', sort: true},
			{ title: 'type', key: 'type', sort: true},
			{ title: 'gemstone', key: 'gemstone', sort: true},
			{ title: 'setting', key: 'setting', sort: true},
			{ title: 'side stone', key: 'ct', sort: true},
			{ title: 'metal weight', key: 'metal_weight', sort: true},
			{ title: 'Unit Price', key: 'unit_price', sort: true},
			{ title: 'texts', key: 'texts', sort: true},
			{ title: 'image', key: 'image', sort: true},
			{ title: 'published', key: 'published', sort: true},
			{ title: 'Created At', key: 'created_at', sort: true}
			],
			filter: [
			'stock' ,'id','type' ,'ct' , 'published','unit_price',
			]
		}
	},
	components: {
		DataViewer 
			},
	methods: {
		clickRow(row){
			window.open('/adm/jewellery/'+ row.id )
		 },
	 }
}
