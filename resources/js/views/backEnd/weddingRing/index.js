
import DataViewer from '../../../components/DataViewer.vue'

export default {
	el:'#weddingRingIndex',
	name: 'WeddingRingIndex',
	data(){
		return {
			adminVar,
			title: 'wedding Rings',
			source: '/api/weddingRingsInd',
			url:'/adm/wedding-rings',
			create:'/adm/wedding-rings/create',
			thead: [
			{ title: 'ID', key: 'id', sort: true},
			{ title: 'Stock', key: 'stock', sort: true},
			{ title: 'metal', key: 'metal', sort: true},
			{ title: 'style', key: 'style', sort: true},
			{ title: 'side stone', key: 'ct', sort: true},
			{ title: 'metal weight', key: 'metal_weight', sort: true},
			{ title: 'Unit Price', key: 'unit_price', sort: true},
			{ title: 'texts', key: 'texts', sort: true},
			{ title: 'image', key: 'image', sort: true},
			{ title: 'published', key: 'published', sort: true},
			{ title: 'Created At', key: 'created_at', sort: true}
			],
			filter: [
			'stock','id','metal','style' ,'ct' ,'unit_price','texts', 'published',
			]
		}
	},
	components: {
		DataViewer 
			},
	methods: {
		clickRow(row){
			window.open('/adm/wedding-rings/'+ row.wedding_ring_pair_id )
			},
		}
}
