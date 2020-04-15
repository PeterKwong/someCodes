
import DataViewer from '../../../components/DataViewer.vue'

export default {
	el:'#customerMomentIndex',
	name: 'customerMoments',
	data(){
		return {
			title: 'Customer Moments',
			source: '/api/customerMomentsInd',
			url:'/adm/customer-moments',
			create:'/adm/customerMoments/create',
			thead: [
			{ title: 'ID', key: 'id', sort: true},
			{ title: 'texts', key: 'texts', sort: true},
			{ title: 'published', key: 'published', sort: true},
			{ title: 'Created At', key: 'created_at', sort: true}
			],
			filter: [
			'id','texts' , 'published',
			]
		}
	},
	components: {
		DataViewer 
			},
	methods: {
		clickRow(row){
			window.open('/adm/customer-moments/'+ row.id )
			},
		}
}
