
import DataViewer from '../../../components/DataViewer.vue'
import Auth from '../../../store/auth'

export default {
	el:'#invoiceIndex',
	name: 'InvoiceIndex',
	data(){
		return {
			globeVar,
			title: 'Invoices',
			source: '/api/invoices',
			url:'/adm/invoices',
			create:'/adm/invoices/create',
			userRole: Auth.state.user_role,
			thead: [
			{ title: 'ID', key: 'id', sort: true},
			{ title: 'Invoice No', key: 'invoice_no', sort: true},
			{ title: 'Date', key: 'date', sort: true},
			{ title: 'Customer', key: 'customer', sort: false},
			{ title: 'title', key: 'title', sort: true},
			{ title: 'deposit', key: 'deposit', sort: true},
			{ title: 'balance', key: 'balance', sort: true},
			{ title: 'Amount' , key: 'total', sort: true},
			{ title: 'Due Status', key: 'due_date', sort: true},
			{ title: 'image', key: 'image', sort: true},
			{ title: 'Created At', key: 'created_at', sort: true},
			{ title: 'Account', key: 'count', sort: true},
			],
			filter: [
			      	'invDiamonds.certificate', 'customer.phone', 'id','customer.name', 
        			'customer_id', 'title', 'date', 'due_date', 'discount',
    				'sub_total', 'deposit', 'balance','total',
    				
			]
		}
	},
	components: {
		DataViewer 
			},
	methods: {
		clickRow(row){
			window.open('/adm/invoices/'+ row.id, )
		},
		setDue(row){
			window.open('/api/invoices-update-due-date/'+ row.id,)
			window.open('/adm/invoices', '_self')
			},
	}
}
