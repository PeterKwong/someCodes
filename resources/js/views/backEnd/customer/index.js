import DataViewer from '../../../components/DataViewer.vue'

export default {
	el:'#customerIndex',
	name: 'CustomerIndex',
	data(){
		return {
			title: 'Customers',
			source: '/api/customers',
			url:'/adm/customers',
			create:'/adm/customers/create',
			thead: [
			{ title: 'ID', key: 'id', sort: true},
			{ title: 'Name', key: 'name', sort: true},
			{ title: 'Phone', key: 'phone', sort: true},
			{ title: 'Email Address', key: 'email', sort: true},
			{ title: 'Created At', key: 'created_at', sort: true}
			],
			filter: [
			'id', 'name', 'email', 'phone'
			]
		}
	},
	components: {
		DataViewer 
			},
	methods: {
		clickRow(row){
			window.open('/adm/customers/'+ row.id, )
		},}
}
