
import DataViewer from '../../../components/DataViewer.vue'

export default {
	el:'#engagementRingIndex',
	name: 'JewellryIndex',
	data(){
		return {
			globeVar,
			title: 'Engagement Rings',
			source: '/api/engagementRingsInd',
			url: '/adm/engagement-rings',
			create:'/adm/engagement-rings/create',
			thead: [
			{ title: 'ID', key: 'id', sort: true},
			{ title: 'Stock', key: 'stock', sort: true},
			{ title: 'prong', key: 'prong', sort: true},
			{ title: 'shoulder', key: 'shoulder', sort: true},
			{ title: 'style', key: 'style', sort: true},
			{ title: 'side stone', key: 'ct', sort: true},
			{ title: 'Unit Price', key: 'unit_price', sort: true},
			{ title: 'texts', key: 'texts', sort: true},
			{ title: 'image', key: 'image', sort: true},
			{ title: 'published', key: 'published', sort: true},
			{ title: 'Created At', key: 'created_at', sort: true}
			],
			filter: [
			'stock' ,'id','texts' , 'prong','style' ,'ct' , 'published','unit_price',
			]
		}
	},
	components: {
		DataViewer 
			},
	methods: {
		clickRow(row){
			window.open('/adm/engagement-rings/'+ row.id )
		 },
	 }
}
