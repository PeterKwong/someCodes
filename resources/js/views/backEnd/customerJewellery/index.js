
import DataViewer from '../../../components/DataViewer.vue'

export default {
	el:'#customerJewelleryIndex',
	name: 'JewellryIndex',
	data(){
		return {
			title: 'Invoice Posts',
			source: '/api/invPostsInd',
			url:'/adm/customer-jewelleries',
			create:'/adm/invPosts/create',
			thead: [
			{ title: 'ID', key: 'id', sort: true},
			{ title: 'invoice_id', key: 'invoice_id', sort: true},
			{ title: 'texts', key: 'texts', sort: true},
			{ title: 'published', key: 'published', sort: true},
			{ title: 'Created At', key: 'created_at', sort: true}
			],
			filter: [
			'id','texts' , 'invoice_id' , 'published',
			]
		}
	},
	components: {
		DataViewer 
			},
	methods: {
		clickRow(row){
			window.open('/adm/customer-jewelleries/'+ row.id )
		 },
	 }
}
